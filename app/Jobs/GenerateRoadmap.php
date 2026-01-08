<?php

namespace App\Jobs;

use App\Models\Prompt;
use App\Models\Roadmap;
use App\Models\RoadmapResource;
use App\Models\RoadmapStep;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GenerateRoadmap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $prompt;

    /**
     * Create a new job instance.
     */
    public function __construct(Prompt $prompt)
    {
        $this->prompt = $prompt;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $promptText = $this->prompt->prompt_text;

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
            // Here we should handle the error, maybe by updating the prompt status
            return;
        }

        $resultText = str_replace(["```json", "```"], "", $resultText);

        $json = json_decode($resultText, true);

        if (!$json || !isset($json['roadmap']['steps'])) {
            // Here we should handle the error
            return;
        }

        $roadmap = Roadmap::create([
            'prompt_id' => $this->prompt->id,
            'title' => $json['roadmap']['title'] ?? 'Roadmap Baru',
            'estimasi' => $json['roadmap']['estimasi'] ?? null
        ]);

        foreach ($json['roadmap']['steps'] as $index => $step) {

            $roadmapStep = RoadmapStep::create([
                'roadmap_id'   => $roadmap->id,
                'order_number' => $step['order'] ?? $index + 1,
                'description'  => $step['description'] ?? '-',
                'title'        => $step['title'] ?? 'Langkah',
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
    }
}
