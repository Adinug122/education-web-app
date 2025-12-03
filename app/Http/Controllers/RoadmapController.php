<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Models\Roadmap;
use App\Models\RoadmapResource;
use App\Models\RoadmapStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class RoadmapController extends Controller
{
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

        return view('roadmap', compact('roadmap'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string'
        ]);

        $promptText = $request->prompt;

        // Simpan prompt
        $prompt = Prompt::create([
            'prompt_text' => $promptText,
            'user_id' => Auth::id()
        ]);

     
        $response = Http::post(
            "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . env('GEMINI_API_KEY'),
            [
                'contents' => [[
                    'parts' => [[
                        "text" => "Buatkan roadmap belajar format JSON murni tanpa markdown: 
                        {
                            \"roadmap\": {
                                \"title\": \"\",
                                \"estimasi\": \"\",
                                \"steps\": [
                                    {
                                        \"order\": 1,
                                        \"title\": \"\",
                                        \"description\": \"\",
                                        \"resources\": [
                                            {\"title\":\"\", \"url\":\"\",\"type\":\"link\"}
                                        ]
                                    }
                                ]
                            }
                        }
                        Prompt: " . $promptText
                    ]]
                ]]
            ]
        );

        $resultText = $response->json('candidates.0.content.parts.0.text');

        if (!$resultText) {
            return back()->with('error', 'AI tidak merespon.');
        }

     
        $resultText = str_replace(["```json", "```"], "", $resultText);

        $json = json_decode($resultText, true);

        if (!$json || !isset($json['roadmap']['steps'])) {
            return back()->with('error', 'Format JSON AI tidak valid.');
        }

    
        $roadmap = Roadmap::create([
            'prompt_id' => $prompt->id,
            'title' => $json['roadmap']['title'] ?? 'Roadmap Baru',
            'estimasi' => $json['roadmap']['estimasi'] ?? null
        ]);


        foreach ($json['roadmap']['steps'] as $index => $step) {

            $roadmapStep = RoadmapStep::create([
        'roadmap_id'   => $roadmap->id,
        'order_number' => $index + 1, 
        'description' => $step['description']?? '-',
        'title'        => $step['title'] ?? 'Langkah',
        'estimasi'     => $step['estimasi'] ?? '-'
    ]);

          
            if (isset($step['resources'])) {
                foreach ($step['resources'] as $res) {
                    RoadmapResource::create([
                        'roadmap_steps_id' => $roadmapStep->id,
                        'title' => $res['title'],
                        'url' => $res['url'],
                        'type' => $res['type'] ?? 'link'
                    ]);
                }
            }
        }

        return redirect()->route('home')
            ->with('success', 'Roadmap berhasil dibuat!');
    }
}
