<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PortfolioApiController extends Controller
{
    /**
     * GET /api/portfolios
     * Mengambil daftar portofolio dengan filter kategori, pencarian, dan pagination.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Portfolio::published()
            ->with(['category:id,name,slug', 'images:id,portfolio_id,image,caption'])
            ->latest();

        // Filter berdasarkan slug kategori
        if ($request->filled('category') && $request->category !== 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Pencarian berdasarkan judul, lokasi, atau gaya desain
        if ($request->filled('q')) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('location', 'like', "%{$keyword}%")
                  ->orWhere('design_style', 'like', "%{$keyword}%")
                  ->orWhere('project_type', 'like', "%{$keyword}%");
            });
        }

        $perPage = (int) $request->get('per_page', 12);
        $perPage = max(1, min($perPage, 50)); // Batasi maksimal 50 per page

        $portfolios = $query->paginate($perPage);

        return response()->json([
            'status'  => true,
            'message' => 'Daftar portofolio berhasil diambil.',
            'data'    => $portfolios->items(),
            'meta'    => [
                'current_page' => $portfolios->currentPage(),
                'last_page'    => $portfolios->lastPage(),
                'per_page'     => $portfolios->perPage(),
                'total'        => $portfolios->total(),
                'has_more'     => $portfolios->hasMorePages(),
            ],
        ]);
    }

    /**
     * GET /api/portfolios/{slug}
     * Mengambil detail portofolio lengkap beserta foto galeri dan rekomendasi proyek terkait.
     */
    public function show(string $slug): JsonResponse
    {
        $portfolio = Portfolio::published()
            ->with(['category', 'images'])
            ->where(function ($q) use ($slug) {
                $q->where('slug', $slug)
                  ->orWhere('slug', 'like', $slug . '-%');
            })
            ->first();

        if (!$portfolio) {
            return response()->json([
                'status'  => false,
                'message' => 'Portofolio tidak ditemukan.',
            ], 404);
        }

        // Ambil proyek terkait dalam kategori yang sama
        $related = Portfolio::published()
            ->with('category:id,name,slug')
            ->where('portfolio_category_id', $portfolio->portfolio_category_id)
            ->where('id', '!=', $portfolio->id)
            ->take(3)
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Detail portofolio berhasil diambil.',
            'data'    => $portfolio,
            'related' => $related,
        ]);
    }

    /**
     * GET /api/categories
     * Mengambil daftar kategori portofolio untuk tab filter di Front-End.
     */
    public function categories(): JsonResponse
    {
        $categories = PortfolioCategory::active()
            ->withCount(['portfolios' => function ($q) {
                $q->where('status', 'published');
            }])
            ->get();

        return response()->json([
            'status'  => true,
            'message' => 'Daftar kategori berhasil diambil.',
            'data'    => $categories,
        ]);
    }
}
