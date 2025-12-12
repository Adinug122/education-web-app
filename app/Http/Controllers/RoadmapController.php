<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Models\Report;
use App\Models\Roadmap;
use App\Models\RoadmapResource;
use App\Models\RoadmapStep;
use App\Models\RoadmapStepProgres;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class RoadmapController extends Controller
{

    private function cleanUrl($url)
{
    if (!$url || trim($url) === "" || $url === "#") {
        return null;
    }

    // Jika tidak mengandung http atau https → otomatis tambahkan https://
    if (!preg_match('/^https?:\/\//i', $url)) {
        return "https://" . ltrim($url, '/');
    }

    return $url;
}

public function dashboard()
{
    $roadmaps = Roadmap::count();
    $totalUser = User::count();
    $totalMateri = RoadmapResource::count();
    $laporan = Report::count();

   $roadmapPerMonth = Roadmap::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
    ->groupBy('month')
    ->orderBy('month')
    ->get();
    $laporanStatus = Report::selectRaw('status,COUNT(*) as total')->groupBy('status')->get();
    $resourceType = RoadmapResource::selectRaw('type, COUNT(*) as total')
    ->groupBy('type')
    ->get();

    $progress = RoadmapStepProgres::selectRaw('is_completed, COUNT(*) as total')
    ->groupBy('is_completed')
    ->get();

    return view('dashboard',
    compact('laporan',
    'roadmaps',
    'totalMateri',
    'totalUser',
    'roadmapPerMonth',
    'laporanStatus',
    'resourceType',
    'progress'
    ));
}

    public function index()
    {
        $roadmaps = Roadmap::whereHas('prompt', function ($q) {
            $q->where('user_id', Auth::id());
        })->get();

        return view('welcome', compact('roadmaps'));
    }

    public function detail($id)
    {
        $roadmap = Roadmap::with('steps.resources')->findOrFail($id);
        $user = Auth::user();
        $totalSteps = $roadmap->steps->count();
        $completedCount = $user->completedSteps()
        ->whereIn('roadmap_steps_id', $roadmap->steps->pluck('id'))
        ->count();

        if ($totalSteps > 0 && $completedCount >= $totalSteps) {
      
        return view('finish', compact('roadmap','totalSteps'));
    }

        return view('roadmap', compact('roadmap','completedCount'));
    }

 

    public function generate(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string',
        ]);

        $promptText = $request->prompt;

        // Simpan prompt
        $prompt = Prompt::create([
            'prompt_text' => $promptText,
            'user_id' => Auth::id(),
        ]);

        $response = Http::post(
            'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key='.env('GEMINI_API_KEY'),
            [
                'contents' => [[
                    'parts' => [[
                        'text' => 'Posisikan sebagai mentor programmer yang profesional Buatkan roadmap belajar dalam format JSON murni (TANPA MARKDOWN) dengan struktur FIX seperti berikut:

{
  "roadmap": {
    "title": "",
    "estimasi": "", 
    "steps": [
      {
        "order": 1,
        "title": "",
        "description": "",
        "estimasi": "",
        "resources": [
          {"title": "", "url": "", "type": "link"}
        ]
      }
    ]
  }
}

ATURAN WAJIB:
- Gunakan tepat struktur di atas, jangan menambah atau menghapus field.
- Isi semua field dengan teks yang sesuai.
- Jika tidak yakin tentang URL, kosongkan string: "".
- pastikan urlnya valid saja 
- Pastikan JSON valid 100%.
- Jangan gunakan backtick seperti ``` dalam output.

Prompt user: '.$promptText,

                    ]],
                ]],
            ]
        );

        $resultText = $response->json('candidates.0.content.parts.0.text');

        if (! $resultText) {
            return back()->with('error', 'AI tidak merespon.');
        }

        $resultText = str_replace(['```json', '```'], '', $resultText);

        $json = json_decode($resultText, true);

        if (! $json || ! isset($json['roadmap']['steps'])) {
            return back()->with('error', 'Format JSON AI tidak valid.');
        }

        $roadmap = Roadmap::create([
            'prompt_id' => $prompt->id,
            'title' => $json['roadmap']['title'] ?? 'Roadmap Baru',
            'estimasi' => $json['roadmap']['estimasi'] ?? null,
        ]);

        foreach ($json['roadmap']['steps'] as $index => $step) {

            $roadmapStep = RoadmapStep::create([
                'roadmap_id' => $roadmap->id,
                'order_number' => $index + 1,
                'description' => $step['description'] ?? '-',
                'title' => $step['title'] ?? 'Langkah',
                'estimasi' => $step['estimasi'] ?? '-',
            ]);

            if (isset($step['resources'])) {
                foreach ($step['resources'] as $res) {
                       $cleanUrl = $this->cleanUrl($res['url']);
                    RoadmapResource::create([
                        'roadmap_steps_id' => $roadmapStep->id,
                        'title' => $res['title'],
                        'url' => $cleanUrl,
                        'type' => $res['type'] ?? 'link',
                    ]);
                }
            }
        }

        return redirect()->route('roadmap.detail',$roadmap->id)
            ->with('success', 'Roadmap berhasil dibuat!');
    }

    public function delete($id)  {
        $roadmap = Roadmap::whereHas('prompt', function($q){
             $q->where('user_id', Auth::id());  // keamanan
        })->findOrFail($id);
        $roadmap->delete();

        return redirect()->route('home')->with('success','roadmap berhasil dihapus');
    }

    public function toggleStep($id)
{
    $user = Auth::user();


    $user->completedSteps()->toggle([
        $id => ['is_completed' => 1]
    ]);


    // Bukan JSON lagi, tapi Redirect kembali ke halaman roadmap
    return back()->with('success', 'Progress berhasil diperbarui!');
}
}
