<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Tampilkan halaman index dengan data visi dan misi
     */
    public function index()
    {
        $visi = VisiMisi::where('type', 'visi')->first();
        $misis = VisiMisi::where('type', 'misi')->get();

        return view('pages.admin.visi-misi.index', compact('visi', 'misis'));
    }

    /**
     * Simpan data visi baru
     */
    public function storeVisi(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Hapus visi lama jika ada
        VisiMisi::where('type', 'visi')->delete();

        VisiMisi::create([
            'type' => 'visi',
            'content' => $request->content,
        ]);

        return redirect()->route('admin.visi-misi.index')
            ->with('success', 'Visi berhasil ditambahkan.');
    }

    /**
     * Simpan data misi baru
     */
    public function storeMisi(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        VisiMisi::create([
            'type' => 'misi',
            'content' => $request->content,
        ]);

        return redirect()->route('admin.visi-misi.index')
            ->with('success', 'Misi berhasil ditambahkan.');
    }

    /**
     * Update data visi
     */
    public function updateVisi(Request $request, VisiMisi $visi)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $visi->update([
            'content' => $request->content,
        ]);

        return redirect()->route('admin.visi-misi.index')
            ->with('success', 'Visi berhasil diperbarui.');
    }

    /**
     * Update data misi
     */
    public function updateMisi(Request $request, VisiMisi $misi)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $misi->update([
            'content' => $request->content,
        ]);

        return redirect()->route('admin.visi-misi.index')
            ->with('success', 'Misi berhasil diperbarui.');
    }

    /**
     * Hapus data misi
     */
    public function destroyMisi(VisiMisi $misi)
    {
        if ($misi->type !== 'misi') {
            return redirect()->route('admin.visi-misi.index')
                ->with('error', 'Data tidak valid.');
        }

        $misi->delete();

        return redirect()->route('admin.visi-misi.index')
            ->with('success', 'Misi berhasil dihapus.');
    }
}
