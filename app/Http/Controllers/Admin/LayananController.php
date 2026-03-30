<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->orderBy('id')->get();

        return view('pages.admin.service.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'excerpt'    => 'nullable|string|max:500',
            'deskripsi'  => 'nullable|string',
            'is_active'  => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $validated['slug']      = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        // Ensure unique slug
        $slug  = $validated['slug'];
        $count = 1;
        while (Service::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $slug . '-' . $count++;
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($validated);

        return redirect()->route('admin.layanan')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'excerpt'    => 'nullable|string|max:500',
            'deskripsi'  => 'nullable|string',
            'is_active'  => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        // Regenerate slug if name changed
        if ($service->name !== $validated['name']) {
            $slug    = Str::slug($validated['name']);
            $count   = 1;
            $newSlug = $slug;
            while (Service::where('slug', $newSlug)->where('id', '!=', $id)->exists()) {
                $newSlug = $slug . '-' . $count++;
            }
            $validated['slug'] = $newSlug;
        }

        $validated['is_active'] = $request->boolean('is_active');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($validated);

        return redirect()->route('admin.layanan')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Delete image if exists
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.layanan')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    public function toggleStatus($id)
    {
        $service            = Service::findOrFail($id);
        $service->is_active = !$service->is_active;
        $service->save();

        return redirect()->route('admin.layanan')
            ->with('success', 'Status layanan berhasil diubah.');
    }
}
