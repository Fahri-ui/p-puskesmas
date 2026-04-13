<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staf;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Exception;

class StafController extends Controller
{
    public function index()
    {
        $staf        = Staf::paginate(10);
        $totalStaf   = Staf::count();

        return view('pages.admin.staff.index', compact('staf', 'totalStaf'));
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
        try {
            $validated = $request->validate([
                'nama'                => 'required|string|max:255',
                'jabatan'             => 'required|string|max:255',
                'profesi'             => 'nullable|string|max:255',
                'nip'                 => 'nullable|string|max:100|unique:staf,nip',
                'email'               => 'nullable|email|max:255|unique:staf,email',
                'telepon'             => 'nullable|string|max:20',
                'jenis_kelamin'       => 'nullable|in:Laki-laki,Perempuan',
                'tanggal_lahir'       => 'nullable|date',
                'pendidikan_terakhir' => 'nullable|string|max:255',
                'bergabung_sejak'     => 'nullable|date',
                'alamat'              => 'nullable|string|max:1000',
                'deskripsi'           => 'nullable|string|max:2000',
                'foto'                => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'nip.unique'      => 'NIP sudah ada, harap rubah nomor NIP.',
                'email.unique'    => 'Email telah terdaftar.',
            ]);

            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $fotoPath = self::uploadFoto($request->file('foto'));
            }

            Staf::create([
                'nama'                => $validated['nama'],
                'jabatan'             => $validated['jabatan'],
                'profesi'             => $validated['profesi']             ?? null,
                'nip'                 => $validated['nip']                 ?? null,
                'email'               => $validated['email']               ?? null,
                'telepon'             => $validated['telepon']             ?? null,
                'jenis_kelamin'       => $validated['jenis_kelamin']       ?? null,
                'tanggal_lahir'       => $validated['tanggal_lahir']       ?? null,
                'pendidikan_terakhir' => $validated['pendidikan_terakhir'] ?? null,
                'bergabung_sejak'     => $validated['bergabung_sejak']     ?? null,
                'alamat'              => $validated['alamat']              ?? null,
                'deskripsi'           => $validated['deskripsi']           ?? null,
                'foto'                => $fotoPath,
            ]);

            return redirect()->route('admin.staf')->with('success', 'Staf berhasil ditambahkan.');
        } catch (ValidationException $e) {
            // Ambil pesan error pertama dari semua field
            $firstError = collect($e->errors())->flatten()->first();
            return redirect()->back()->withInput()->with('error', $firstError);
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $staf = Staf::findOrFail($id);

        try {
            $validated = $request->validate([
                'nama'                => 'required|string|max:255',
                'jabatan'             => 'required|string|max:255',
                'profesi'             => 'nullable|string|max:255',
                'nip'                 => ['nullable', 'string', 'max:100', Rule::unique('staf', 'nip')->ignore($staf->id)],
                'email'               => ['nullable', 'email', 'max:255', Rule::unique('staf', 'email')->ignore($staf->id)],
                'telepon'             => 'nullable|string|max:20',
                'jenis_kelamin'       => 'nullable|in:Laki-laki,Perempuan',
                'tanggal_lahir'       => 'nullable|date',
                'pendidikan_terakhir' => 'nullable|string|max:255',
                'bergabung_sejak'     => 'nullable|date',
                'alamat'              => 'nullable|string|max:1000',
                'deskripsi'           => 'nullable|string|max:2000',
                'foto'                => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ], [
                'nip.unique'      => 'NIP sudah ada, harap rubah nomor NIP.',
                'email.unique'    => 'Email telah terdaftar.',
            ]);

            $fotoPath = $staf->foto;
            if ($request->hasFile('foto')) {
                if ($staf->foto && file_exists(public_path($staf->foto))) {
                    @unlink(public_path($staf->foto));
                }
                $fotoPath = self::uploadFoto($request->file('foto'));
            }

            $staf->update([
                'nama'                => $validated['nama'],
                'jabatan'             => $validated['jabatan'],
                'profesi'             => $validated['profesi']             ?? null,
                'nip'                 => $validated['nip']                 ?? null,
                'email'               => $validated['email']               ?? null,
                'telepon'             => $validated['telepon']             ?? null,
                'jenis_kelamin'       => $validated['jenis_kelamin']       ?? null,
                'tanggal_lahir'       => $validated['tanggal_lahir']       ?? null,
                'pendidikan_terakhir' => $validated['pendidikan_terakhir'] ?? null,
                'bergabung_sejak'     => $validated['bergabung_sejak']     ?? null,
                'alamat'              => $validated['alamat']              ?? null,
                'deskripsi'           => $validated['deskripsi']           ?? null,
                'foto'                => $fotoPath,
            ]);

            return redirect()->route('admin.staf')->with('success', 'Staf berhasil diperbarui.');
        } catch (ValidationException $e) {
            $firstError = collect($e->errors())->flatten()->first();
            return redirect()->back()->withInput()->with('error', $firstError);
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $staf = Staf::findOrFail($id);

        try {
            if ($staf->foto && file_exists(public_path($staf->foto))) {
                @unlink(public_path($staf->foto));
            }
            $staf->delete();
            return redirect()->route('admin.staf')->with('success', 'Staf berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('admin.staf')->with('error', 'Terjadi kesalahan saat menghapus staf.');
        }
    }

    // ─── Helper ───────────────────────────────────────────────────────────────

    private static function uploadFoto($file): string
    {
        $dest = public_path('uploads/staf');
        if (!file_exists($dest)) {
            mkdir($dest, 0755, true);
        }
        $name = uniqid() . '_' . preg_replace('/[^A-Za-z0-9\-_.]/', '_', $file->getClientOriginalName());
        $file->move($dest, $name);
        return 'uploads/staf/' . $name;
    }
}
