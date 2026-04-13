<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id')->get();

        return view('pages.admin.service.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'excerpt'    => 'nullable|string|max:500',
            'jam_buka'   => 'nullable|date_format:H:i',
            'jam_tutup'  => 'nullable|date_format:H:i',
            'open_days'  => ['nullable', 'string', 'max:255', 'regex:/^[\\p{L}0-9\\s,–-]+$/u'],
            'deskripsi'  => 'nullable|string',
            'is_active'  => 'boolean',
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

    public function update(Request $request, Service $layanan)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'excerpt'    => 'nullable|string|max:500',
            'deskripsi'  => 'nullable|string',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // BUG 4: nullable
            'jam_buka'   => 'nullable|date_format:H:i',
            'jam_tutup'  => 'nullable|date_format:H:i',
            'open_days'  => 'nullable|string|max:255',
        ]);

        // Slug hanya diupdate jika nama berubah
        if ($layanan->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // BUG 5 fix: checkbox tidak mengirim value jika tidak dicentang
        $validated['is_active'] = $request->boolean('is_active');

        // BUG 4 fix: hanya ganti gambar jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($layanan->image) {
                Storage::disk('public')->delete($layanan->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }
        // Jika tidak ada file baru, kolom 'image' tidak masuk $validated
        // sehingga gambar lama tetap tersimpan

        $layanan->update($validated);

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
