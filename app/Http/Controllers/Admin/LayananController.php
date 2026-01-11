<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class LayananController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('urutan', 'asc')->get();
        $totalServices = $services->count();
        $activeServices = $services->where('aktif', true)->count();
        $inactiveServices = $services->where('aktif', false)->count();

        return view('admin.layanan', compact('services', 'totalServices', 'activeServices', 'inactiveServices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string', 'max:1000'],
            'icon' => ['nullable', 'string', 'max:255'],
            'aktif' => ['boolean'],
            'urutan' => ['required', 'integer', 'min:0'],
        ]);

        try {
            $slug = Str::slug($validated['nama_layanan']);
            $counter = 1;
            while (Service::where('slug', $slug)->exists()) {
                $slug = Str::slug($validated['nama_layanan']) . '-' . $counter;
                $counter++;
            }

            Service::create([
                'nama_layanan' => $validated['nama_layanan'],
                'slug' => $slug,
                'deskripsi' => $validated['deskripsi'] ?? null,
                'icon' => $validated['icon'] ?? null,
                'aktif' => $validated['aktif'] ?? true,
                'urutan' => $validated['urutan'],
            ]);

            return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('admin.layanan')->with('error', 'Terjadi kesalahan saat menyimpan layanan.');
        }
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'nama_layanan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string', 'max:1000'],
            'icon' => ['nullable', 'string', 'max:255'],
            'aktif' => ['boolean'],
            'urutan' => ['required', 'integer', 'min:0'],
        ]);

        try {
            $slug = Str::slug($validated['nama_layanan']);
            $counter = 1;
            while (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                $slug = Str::slug($validated['nama_layanan']) . '-' . $counter;
                $counter++;
            }

            $service->update([
                'nama_layanan' => $validated['nama_layanan'],
                'slug' => $slug,
                'deskripsi' => $validated['deskripsi'] ?? null,
                'icon' => $validated['icon'] ?? null,
                'aktif' => $validated['aktif'] ?? true,
                'urutan' => $validated['urutan'],
            ]);

            return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('admin.layanan')->with('error', 'Terjadi kesalahan saat memperbarui layanan.');
        }
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        try {
            $service->delete();
            return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('admin.layanan')->with('error', 'Terjadi kesalahan saat menghapus layanan.');
        }
    }

    public function toggleStatus($id)
    {
        $service = Service::findOrFail($id);

        try {
            $service->update([
                'aktif' => !$service->aktif,
            ]);

            $status = $service->aktif ? 'diaktifkan' : 'dinonaktifkan';
            return redirect()->route('admin.layanan')->with('success', "Layanan berhasil {$status}.");
        } catch (Exception $e) {
            return redirect()->route('admin.layanan')->with('error', 'Terjadi kesalahan saat mengubah status layanan.');
        }
    }
}
