<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $categories = PortfolioCategory::active()->get();

        $query = Portfolio::published()->with('category')->latest();

        // Filter berdasarkan category slug
        if ($request->has('category') && $request->category !== 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $portfolios = $query->paginate(9)->withQueryString();

        $activeCategory = $request->get('category', 'all');

        return view('public.portfolio.index', compact('categories', 'portfolios', 'activeCategory'));
    }

    public function show(string $slug)
    {
        $portfolio = Portfolio::with(['category', 'images'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Portofolio terkait (sama kategori, beda slug)
        $related = Portfolio::published()
            ->where('portfolio_category_id', $portfolio->portfolio_category_id)
            ->where('id', '!=', $portfolio->id)
            ->take(3)
            ->get();

        return view('public.portfolio.show', compact('portfolio', 'related'));
    }
}
