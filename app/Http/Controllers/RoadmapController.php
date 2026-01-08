<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use App\Models\Roadmap;
use App\Models\RoadmapResource;
use App\Models\RoadmapStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Jobs\GenerateRoadmap;
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

        // Dispatch job
        GenerateRoadmap::dispatch($prompt);

        return redirect()->route('home')
            ->with('success', 'Roadmap sedang dibuat, silakan cek beberapa saat lagi!');
    }
}
