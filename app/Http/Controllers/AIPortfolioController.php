<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Services\AIService;
use Illuminate\Http\Request;
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

            // Grounding data nyata dari database Portfolio
            $portfoliosData = Portfolio::published()
                ->with('category')
                ->get(['id', 'title', 'project_type', 'room_type', 'design_style', 'location', 'description'])
                ->map(function ($p) {
                    $categoryName = $p->category->name ?? 'Interior';
                    $cleanDesc = substr(strip_tags((string) $p->description), 0, 160);
                    return "ID: {$p->id} | Judul: {$p->title} | Kategori: {$categoryName} | Tipe: {$p->project_type} | Ruang: {$p->room_type} | Gaya: {$p->design_style} | Lokasi: {$p->location} | Deskripsi: {$cleanDesc}";
                })
                ->implode("\n");

            $systemPrompt = "Kamu adalah Senior Interior Designer & AI Portfolio Matcher di Pratama Design Studio (Semarang, Indonesia).
Tugasmu: Diberikan katalog portofolio nyata dari database resmi kami, carikan portofolio yang paling relevan secara semantik dengan impian, kata kunci, atau kriteria pencarian klien.

KATALOG PORTOFOLIO RESMI PRATAMA DESIGN STUDIO:
{$portfoliosData}

PERATURAN MUTLAK:
1. HANYA rekomendasikan ID proyek yang BENAR-BENAR ada dalam katalog resmi di atas. DILARANG membuat ID palsu atau mengarang proyek.
2. HANYA kembalikan array JSON berisi ID integer yang cocok, diurutkan dari yang paling relevan (maksimal 6 ID).
3. Dilarang memberikan teks, penjelasan, atau formatting apapun selain array JSON murni.
Contoh format valid: [1, 5, 2] atau [] jika tidak ada portofolio yang cocok sama sekali.";

            $messages = [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => "Pencarian Klien: " . $aiPrompt],
            ];

            try {
                $reply = AIService::chatCompletion($messages, 0.3, 120);

                if ($reply && preg_match('/\[[\d\s,]*\]/', $reply, $matches)) {
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
            } catch (\Throwable $e) {
                Log::error("9Router AI Portfolio Matcher Error: " . $e->getMessage());
            }
        } elseif ($activeCategory !== 'all') {
            // Filter kategori reguler
            $query->whereHas('category', function ($q) use ($activeCategory) {
                $q->where('slug', $activeCategory);
            });
        }

        $portfolios = $query->paginate(9)->withQueryString();

        return view('ai-portfolio', compact('categories', 'portfolios', 'activeCategory', 'aiPrompt'));
    }
}
