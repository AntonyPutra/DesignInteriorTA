<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIPortfolioController extends Controller
{
    public function index(Request $request)
    {
        $categories = PortfolioCategory::active()->get();

        $query = Portfolio::published()->with('category')->latest();

        $activeCategory = $request->get('category', 'all');
        $aiPrompt = $request->get('ai_search');

        if ($aiPrompt) {
            set_time_limit(120); // Tambahkan batas waktu
            // AI Smart Search
            $apiKey = config('services.gemini.api_key');
            if ($apiKey) {
                $portfoliosData = Portfolio::published()->get(['id', 'title', 'project_type', 'room_type', 'design_style', 'description'])->map(function($p) {
                    return "ID: {$p->id} | Judul: {$p->title} | Ruang: {$p->room_type} | Gaya: {$p->design_style} | Deskripsi: " . substr(strip_tags($p->description), 0, 150);
                })->implode("\n");

                $systemPrompt = "Kamu adalah AI Portfolio Matcher Pratama Design Studio.
Tugasmu: Diberikan daftar portofolio, carikan portofolio yang paling relevan secara semantik dengan impian atau pencarian klien.
PERATURAN MUTLAK:
HANYA kembalikan array JSON berisi ID integer yang cocok (maksimal 6 ID). Dilarang memberikan teks apapun selain JSON array.
Contoh valid: [1, 5, 12] atau [] jika tidak ada.

Daftar Portofolio:
" . $portfoliosData;

                $url = "https://generativelanguage.googleapis.com/v1beta/models/gemma-4-26b-a4b-it:generateContent?key=" . $apiKey;

                try {
                    $response = Http::withoutVerifying()->timeout(30)->post($url, [
                        'contents' => [
                            ['role' => 'user', 'parts' => [['text' => "Instruksi Sistem:\n" . $systemPrompt . "\n\nPencarian Klien: " . $aiPrompt]]]
                        ],
                        'generationConfig' => ['temperature' => 0.1, 'maxOutputTokens' => 100]
                    ]);

                    if ($response->successful()) {
                        $data = $response->json();
                        $rawText = '';
                        if (isset($data['candidates'][0]['content']['parts'])) {
                            foreach ($data['candidates'][0]['content']['parts'] as $part) {
                                if (empty($part['thought']) || $part['thought'] !== true) {
                                    $rawText .= $part['text'] ?? '';
                                }
                            }
                        }
                        $reply = trim($rawText);
                        if (preg_match('/\[[\d\s,]*\]/', $reply, $matches)) {
                            $ids = json_decode($matches[0], true);
                            if (is_array($ids) && count($ids) > 0) {
                                // Jaga urutan relevansi AI jika memungkinkan dengan orderByRaw field
                                $idsString = implode(',', $ids);
                                $query->whereIn('id', $ids)->orderByRaw("FIELD(id, {$idsString})");
                            } else {
                                $query->where('id', -1); // Tidak ada yang cocok
                            }
                        } else {
                            $query->where('id', -1);
                        }
                    }
                } catch (\Exception $e) {
                    Log::error("AI Search Error: " . $e->getMessage());
                }
            }
        } elseif ($activeCategory !== 'all') {
            // Filter biasa berdasarkan category slug
            $query->whereHas('category', function ($q) use ($activeCategory) {
                $q->where('slug', $activeCategory);
            });
        }

        $portfolios = $query->paginate(9)->withQueryString();

        return view('ai-portfolio', compact('categories', 'portfolios', 'activeCategory', 'aiPrompt'));
    }
}
