<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name'  => 'required|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'rating'       => 'required|integer|min:1|max:5',
            'message'      => 'required|string|max:2000',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'       => 'required|in:active,inactive',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create([
            'client_name'  => $validated['client_name'],
            'project_name' => $validated['project_name'] ?? null,
            'rating'       => $validated['rating'],
            'message'      => $validated['message'],
            'image'        => $imagePath,
            'status'       => $validated['status'],
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name'  => 'required|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'rating'       => 'required|integer|min:1|max:5',
            'message'      => 'required|string|max:2000',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'       => 'required|in:active,inactive',
        ]);

        $imagePath = $testimonial->image;
        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                \Storage::disk('public')->delete($testimonial->image);
            }
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update([
            'client_name'  => $validated['client_name'],
            'project_name' => $validated['project_name'] ?? null,
            'rating'       => $validated['rating'],
            'message'      => $validated['message'],
            'image'        => $imagePath,
            'status'       => $validated['status'],
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            \Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
