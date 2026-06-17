<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->withTrashed()->latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $categories = PortfolioCategory::active()->get();
        return view('admin.portfolios.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'title'                 => 'required|string|max:255',
            'client_name'           => 'nullable|string|max:255',
            'location'              => 'required|string|max:255',
            'project_type'          => 'required|string|max:255',
            'room_type'             => 'nullable|string|max:255',
            'design_style'          => 'nullable|string|max:255',
            'description'           => 'nullable|string',
            'year'                  => 'nullable|integer|min:2000|max:' . (date('Y') + 1),
            'main_image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery_images.*'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'                => 'required|in:published,draft',
        ]);

        // Upload main image
        $mainImagePath = null;
        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('portfolios/main', 'public');
        }

        $portfolio = Portfolio::create([
            'portfolio_category_id' => $validated['portfolio_category_id'],
            'title'                 => $validated['title'],
            'slug'                  => Str::slug($validated['title']),
            'client_name'           => $validated['client_name'] ?? null,
            'location'              => $validated['location'],
            'project_type'          => $validated['project_type'],
            'room_type'             => $validated['room_type'] ?? null,
            'design_style'          => $validated['design_style'] ?? null,
            'description'           => $validated['description'] ?? null,
            'year'                  => $validated['year'] ?? null,
            'main_image'            => $mainImagePath,
            'status'                => $validated['status'],
        ]);

        // Upload gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('portfolios/gallery', 'public');
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image'        => $path,
                    'caption'      => null,
                ]);
            }
        }

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = PortfolioCategory::active()->get();
        $portfolio->load('images');
        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'title'                 => 'required|string|max:255',
            'client_name'           => 'nullable|string|max:255',
            'location'              => 'required|string|max:255',
            'project_type'          => 'required|string|max:255',
            'room_type'             => 'nullable|string|max:255',
            'design_style'          => 'nullable|string|max:255',
            'description'           => 'nullable|string',
            'year'                  => 'nullable|integer|min:2000|max:' . (date('Y') + 1),
            'main_image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'gallery_images.*'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'                => 'required|in:published,draft',
        ]);

        // Update main image
        $mainImagePath = $portfolio->main_image;
        if ($request->hasFile('main_image')) {
            if ($portfolio->main_image) {
                Storage::disk('public')->delete($portfolio->main_image);
            }
            $mainImagePath = $request->file('main_image')->store('portfolios/main', 'public');
        }

        $portfolio->update([
            'portfolio_category_id' => $validated['portfolio_category_id'],
            'title'                 => $validated['title'],
            'slug'                  => Str::slug($validated['title']),
            'client_name'           => $validated['client_name'] ?? null,
            'location'              => $validated['location'],
            'project_type'          => $validated['project_type'],
            'room_type'             => $validated['room_type'] ?? null,
            'design_style'          => $validated['design_style'] ?? null,
            'description'           => $validated['description'] ?? null,
            'year'                  => $validated['year'] ?? null,
            'main_image'            => $mainImagePath,
            'status'                => $validated['status'],
        ]);

        // Upload gallery images tambahan
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('portfolios/gallery', 'public');
                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image'        => $path,
                    'caption'      => null,
                ]);
            }
        }

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Hapus gambar dari storage
        if ($portfolio->main_image) {
            Storage::disk('public')->delete($portfolio->main_image);
        }
        foreach ($portfolio->images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }

        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil dihapus.');
    }

    public function destroyImage(Portfolio $portfolio, PortfolioImage $image)
    {
        Storage::disk('public')->delete($image->image);
        $image->delete();

        return redirect()->route('admin.portfolios.edit', $portfolio->id)
            ->with('success', 'Gambar berhasil dihapus.');
    }
}
