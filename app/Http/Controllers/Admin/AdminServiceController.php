<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::withTrashed()->latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:100',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'name'        => $validated['name'],
            'slug'        => Str::slug($validated['name']),
            'description' => $validated['description'],
            'icon'        => $validated['icon'],
            'image'       => $imagePath,
            'status'      => $validated['status'],
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:100',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:active,inactive',
        ]);

        $imagePath = $service->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($service->image) {
                \Storage::disk('public')->delete($service->image);
            }
            $imagePath = $request->file('image')->store('services', 'public');
        }

        $service->update([
            'name'        => $validated['name'],
            'slug'        => Str::slug($validated['name']),
            'description' => $validated['description'],
            'icon'        => $validated['icon'],
            'image'       => $imagePath,
            'status'      => $validated['status'],
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        // Soft delete
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
