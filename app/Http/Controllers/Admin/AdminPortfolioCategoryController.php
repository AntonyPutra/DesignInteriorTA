<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPortfolioCategoryController extends Controller
{
    public function index()
    {
        $categories = PortfolioCategory::withCount('portfolios')->latest()->paginate(10);
        return view('admin.portfolio-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.portfolio-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:portfolio_categories,name',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
        ]);

        PortfolioCategory::create([
            'name'        => $validated['name'],
            'slug'        => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'status'      => $validated['status'],
        ]);

        return redirect()->route('admin.portfolio-categories.index')
            ->with('success', 'Kategori portofolio berhasil ditambahkan.');
    }

    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('admin.portfolio-categories.edit', compact('portfolioCategory'));
    }

    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:portfolio_categories,name,' . $portfolioCategory->id,
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
        ]);

        $portfolioCategory->update([
            'name'        => $validated['name'],
            'slug'        => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'status'      => $validated['status'],
        ]);

        return redirect()->route('admin.portfolio-categories.index')
            ->with('success', 'Kategori portofolio berhasil diperbarui.');
    }

    public function destroy(PortfolioCategory $portfolioCategory)
    {
        if ($portfolioCategory->portfolios()->count() > 0) {
            return redirect()->route('admin.portfolio-categories.index')
                ->with('error', 'Kategori tidak bisa dihapus karena masih memiliki portofolio.');
        }

        $portfolioCategory->delete();
        return redirect()->route('admin.portfolio-categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
