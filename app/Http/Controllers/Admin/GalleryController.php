<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Tampilkan daftar gallery.
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);

        return view('pages.admin.gallery.index', compact('galleries'));
    }

    /**
     * Tampilkan form edit gallery.
     */
    public function edit(Gallery $gallery)
    {
        // Karena UI edit menggunakan modal pada halaman index,
        // rute ini hanya menjaga route binding tetap valid.
        return redirect()->route('admin.gallery');
    }

    /**
     * Simpan gallery baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title'       => $request->title,
            'image'       => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.gallery')
            ->with('success', 'Gambar berhasil ditambahkan.');
    }

    /**
     * Update gallery yang sudah ada.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery')
            ->with('success', 'Gambar berhasil diperbarui.');
    }

    /**
     * Hapus gallery dari database.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery')
            ->with('success', 'Gambar berhasil dihapus.');
    }
}
