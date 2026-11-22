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
            set_time_limit(120);

            // Konfigurasi 9Router (OpenAI-compatible)
            $baseUrl     = rtrim(config('services.ninerouter.base_url', config('services.ai.base_url', 'http://192.168.1.3:20128/v1')), '/');
            $apiKey      = config('services.ninerouter.api_key', config('services.ai.api_key'));
            $model       = config('services.ninerouter.model', config('services.ai.model', 'pratama_ai'));
            $temperature = (float) config('services.ninerouter.temperature', config('services.ai.temperature', 0.3));

            // Database Grounding: Ambil katalog portofolio nyata dari database
            $portfoliosData = Portfolio::published()
                ->with('category')
                ->get(['id', 'title', 'project_type', 'room_type', 'design_style', 'location', 'description'])
                ->map(function ($p) {
                    $categoryName = $p->category->name ?? 'Interior';
                    $cleanDesc = substr(strip_tags((string) $p->description), 0, 160);
                    return "ID: {$p->id} | Judul: {$p->title} | Kategori: {$categoryName} | Tipe: {$p->project_type} | Ruang: {$p->room_type} | Gaya: {$p->design_style} | Lokasi: {$p->location} | Deskripsi: {$cleanDesc}";
                })
                ->implode("\n");

            $systemPrompt = "Kamu adalah Senior Interior Designer dan AI Portfolio Matcher di Pratama Design Studio (Semarang, Indonesia).
Tugasmu: Diberikan katalog portofolio nyata dari database resmi studio kami, carikan portofolio yang paling relevan secara semantik dengan impian, kebutuhan, atau kata kunci pencarian klien.

KATALOG PORTOFOLIO RESMI PRATAMA DESIGN STUDIO:
{$portfoliosData}

PERATURAN MUTLAK:
1. HANYA rekomendasikan ID proyek yang BENAR-BENAR ada dalam katalog resmi di atas. DILARANG mengarang ID atau proyek.
2. HANYA kembalikan array JSON berisi ID integer yang cocok, diurutkan dari yang paling relevan (maksimal 6 ID).
3. Dilarang memberikan teks, penjelasan, atau formatting apapun selain array JSON murni.
Contoh valid: [1, 5, 2] atau [] jika tidak ada portofolio yang cocok sama sekali.";

            $url = $baseUrl . '/chat/completions';

            try {
                $req = Http::timeout(120);
                if (!empty($apiKey)) {
                    $req = $req->withToken($apiKey);
                }

                $response = $req->post($url, [
                    'model'       => $model,
                    'messages'    => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user',   'content' => "Pencarian Klien: " . $aiPrompt],
                    ],
                    'temperature' => $temperature,
                    'max_tokens'  => 200,
                    'stream'      => false,
                ]);

                if ($response->successful()) {
                    $rawBody = $response->body();
                    // 9Router SSE cleanup: hapus trailing data: [DONE] jika ada
                    $cleanBody = preg_replace('/\s*data:\s*\[DONE\]\s*$/i', '', trim($rawBody));
                    $data = json_decode($cleanBody, true) ?: $response->json();

                    $rawText = $data['choices'][0]['message']['content'] ?? '';
                    if (empty($rawText) && !empty($data['choices'][0]['message']['reasoning_content'])) {
                        $rawText = $data['choices'][0]['message']['reasoning_content'];
                    }

                    // 1. Sanitasi reasoning tokens dari model pratama_ai
                    $reply = preg_replace('/<think>.*?<\/think>/s', '', $rawText);
                    $reply = trim($reply);

                    // 2. Ekstrak array ID
                    if (preg_match('/\[[\d\s,]*\]/', $reply, $matches)) {
                        $ids = json_decode($matches[0], true);
                        if (is_array($ids) && count($ids) > 0) {
                            $ids = array_filter(array_map('intval', $ids));
                            if (!empty($ids)) {
                                $idsString = implode(',', $ids);
                                $query->whereIn('id', $ids)->orderByRaw("FIELD(id, {$idsString})");
                            } else {
                                $query->where('id', -1);
                            }
                        } else {
                            $query->where('id', -1);
                        }
                    } else {
                        $query->where('id', -1);
                    }
                } else {
                    Log::error('9Router API Error (AIPortfolio): status ' . $response->status() . ' - ' . $response->body());
                }
            } catch (\Throwable $e) {
                Log::error("9Router AI Search Exception: " . $e->getMessage());
            }
        } elseif ($activeCategory !== 'all') {
            // Filter kategori biasa
            $query->whereHas('category', function ($q) use ($activeCategory) {
                $q->where('slug', $activeCategory);
            });
        }

        $portfolios = $query->paginate(9)->withQueryString();

        return view('ai-portfolio', compact('categories', 'portfolios', 'activeCategory', 'aiPrompt'));
    }
}
