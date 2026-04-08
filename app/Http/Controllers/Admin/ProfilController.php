<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Tampilkan data atau form create jika belum ada data
     */
    public function index()
    {
        $profil = Profil::first();

        if ($profil) {
            // Data sudah ada → tampilkan view show/edit
            return view('pages.admin.profil.show', compact('profil'));
        }

        // Belum ada data → tampilkan form create
        return view('pages.admin.profil.index');
    }

    /**
     * Simpan data baru (hanya jika belum ada data)
     */
    public function store(Request $request)
    {
        // Validasi: pastikan belum ada data
        if (Profil::exists()) {
            return redirect()->route('admin.profil')
                ->with('error', 'Data profil sudah tersedia. Silakan gunakan fitur edit.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle upload image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('profil', 'public');
        }

        Profil::create($validated);

        return redirect()->route('admin.profil')
            ->with('success', 'Data profil berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit untuk single record
     */
    public function edit()
    {
        $profil = Profil::firstOrFail();
        return view('pages.admin.profil.edit', compact('profil'));
    }

    /**
     * Update data profil
     */
    public function update(Request $request)
    {
        $profil = Profil::firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle upload image baru
        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            if ($profil->image && Storage::disk('public')->exists($profil->image)) {
                Storage::disk('public')->delete($profil->image);
            }
            $validated['image'] = $request->file('image')->store('profil', 'public');
        }

        $profil->update($validated);

        return redirect()->route('admin.profil')
            ->with('success', 'Data profil berhasil diperbarui.');
    }

    /**
     * Hapus data (opsional, tidak ditampilkan di UI)
     */
    public function destroy(Profil $profil)
    {
        if ($profil->image && Storage::disk('public')->exists($profil->image)) {
            Storage::disk('public')->delete($profil->image);
        }

        $profil->delete();

        return redirect()->route('admin.profil')
            ->with('success', 'Data profil berhasil dihapus.');
    }
}
