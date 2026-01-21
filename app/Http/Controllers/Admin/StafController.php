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
        $staf = Staf::orderBy('created_at', 'desc')->paginate(10);
        $totalStaf = Staf::count();
        $stafAktif = Staf::where('status', 'Aktif')->count();
        $stafTidakAktif = Staf::where('status', 'Tidak Aktif')->count();

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
            'nip' => 'required|string|max:255|unique:staf,nip',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:staf,email',
            'no_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status' => 'required|in:Aktif,Tidak Aktif',
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
                'nip' => $validated['nip'],
                'jabatan' => $validated['jabatan'],
                'email' => $validated['email'],
                'no_telepon' => $validated['no_telepon'],
                'alamat' => $validated['alamat'],
                'foto' => $fotoPath,
                'tgl_lahir' => $validated['tgl_lahir'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'status' => $validated['status'],
            ]);

            return redirect()->route('admin.staf')->with('success', 'Staf berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('admin.staf')->with('error', 'Terjadi kesalahan saat menambahkan staf.');
        }
    }

    public function update(Request $request, $id)
    {
        $staf = Staf::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => ['required', 'string', 'max:255', Rule::unique('staf', 'nip')->ignore($staf->id)],
            'jabatan' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('staf', 'email')->ignore($staf->id)],
            'no_telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tgl_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status' => 'required|in:Aktif,Tidak Aktif',
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
                'nip' => $validated['nip'],
                'jabatan' => $validated['jabatan'],
                'email' => $validated['email'],
                'no_telepon' => $validated['no_telepon'],
                'alamat' => $validated['alamat'],
                'foto' => $fotoPath,
                'tgl_lahir' => $validated['tgl_lahir'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'status' => $validated['status'],
            ]);

            return redirect()->route('admin.staf')->with('success', 'Staf berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('admin.staf')->with('error', 'Terjadi kesalahan saat memperbarui staf.');
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
            return redirect()->route('admin.staf')->with('error', 'Terjadi kesalahan saat menghapus staf.');
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
