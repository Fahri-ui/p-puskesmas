<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staf;
use Illuminate\Validation\Rule;
use Exception;

class StafController extends Controller
{
    public function index()
    {
        $staf = Staf::orderBy('urutan', 'asc')->get();
        $totalStaf = $staf->count();
        $stafAktif = $staf->where('status', 'Aktif')->count();
        $stafTidakAktif = $staf->where('status', 'Tidak Aktif')->count();

        return view('admin.staf', compact('staf', 'totalStaf', 'stafAktif', 'stafTidakAktif'));
    }

    public function show($id)
    {
        $staf = Staf::findOrFail($id);
        return response()->json($staf);
    }

    public function edit($id)
    {
        $staf = Staf::findOrFail($id);
        return response()->json($staf);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'email' => 'nullable|email|max:255|unique:staf,email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'urutan' => 'required|integer|min:0',
        ]);

        try {
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $destinationPath = public_path('uploads/staf');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $originalName = preg_replace('/[^A-Za-z0-9\-_.]/', '_', $file->getClientOriginalName());
                $fileName = uniqid() . '_' . $originalName;
                $file->move($destinationPath, $fileName);
                $fotoPath = 'uploads/staf/' . $fileName;
            }

            Staf::create([
                'name' => $validated['name'],
                'jabatan' => $validated['jabatan'],
                'bidang' => $validated['bidang'] ?? null,
                'deskripsi' => $validated['deskripsi'] ?? null,
                'email' => $validated['email'] ?? null,
                'foto' => $fotoPath,
                'status' => $validated['status'],
                'urutan' => $validated['urutan'],
            ]);

            return redirect()->route('admin.staf')->with('success', 'Staf berhasil ditambahkan.');
        } catch (Exception $e) {
            \Log::error('Error creating staf: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menambahkan staf: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $staf = Staf::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'email' => ['nullable','email','max:255', Rule::unique('staf', 'email')->ignore($staf->id)],
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Aktif,Tidak Aktif',
            'urutan' => 'required|integer|min:0',
        ]);

        try {
            $fotoPath = $staf->foto;
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada (disimpan sebagai path relatif e.g. uploads/staf/xxx)
                if ($staf->foto) {
                    $old = public_path($staf->foto);
                    if (file_exists($old)) {
                        @unlink($old);
                    }
                }

                $file = $request->file('foto');
                $destinationPath = public_path('uploads/staf');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $originalName = preg_replace('/[^A-Za-z0-9\-_.]/', '_', $file->getClientOriginalName());
                $fileName = uniqid() . '_' . $originalName;
                $file->move($destinationPath, $fileName);
                $fotoPath = 'uploads/staf/' . $fileName;
            }

            $staf->update([
                'name' => $validated['name'],
                'jabatan' => $validated['jabatan'],
                'bidang' => $validated['bidang'] ?? null,
                'deskripsi' => $validated['deskripsi'] ?? null,
                'email' => $validated['email'] ?? null,
                'foto' => $fotoPath,
                'status' => $validated['status'],
                'urutan' => $validated['urutan'],
            ]);

            return redirect()->route('admin.staf')->with('success', 'Staf berhasil diperbarui.');
        } catch (Exception $e) {
            \Log::error('Error updating staf: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui staf: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $staf = Staf::findOrFail($id);

        try {
            // Hapus foto jika ada (file berada di public/uploads/staf/...)
            if ($staf->foto) {
                $old = public_path($staf->foto);
                if (file_exists($old)) {
                    @unlink($old);
                }
            }

            $staf->delete();
            return redirect()->route('admin.staf')->with('success', 'Staf berhasil dihapus.');
        } catch (Exception $e) {
            \Log::error('Error deleting staf: ' . $e->getMessage());
            return redirect()->route('admin.staf')->with('error', 'Terjadi kesalahan saat menghapus staf: ' . $e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        $staf = Staf::findOrFail($id);

        try {
            $staf->update([
                'status' => $staf->status === 'Aktif' ? 'Tidak Aktif' : 'Aktif'
            ]);

            return redirect()->route('admin.staf')->with('success', 'Status staf berhasil diubah.');
        } catch (Exception $e) {
            return redirect()->route('admin.staf')->with('error', 'Terjadi kesalahan saat mengubah status staf.');
        }
    }
}
