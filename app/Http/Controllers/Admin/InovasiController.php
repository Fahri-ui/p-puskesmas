<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inovasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InovasiController extends Controller
{
    public function index()
    {
        $inovasis = Inovasi::latest()->paginate(10);

        return view('pages.admin.inovasi.index', compact('inovasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:ppt,pptx|max:10240',
        ]);

        $filePath = $request->file('file')->store('inovasi', 'public');

        Inovasi::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.inovasi')->with('success', 'Inovasi berhasil ditambahkan.');
    }

    public function update(Request $request, Inovasi $inovasi)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:ppt,pptx|max:10240',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('file')) {
            if ($inovasi->file_path && Storage::disk('public')->exists($inovasi->file_path)) {
                Storage::disk('public')->delete($inovasi->file_path);
            }

            $data['file_path'] = $request->file('file')->store('inovasi', 'public');
        }

        $inovasi->update($data);

        return redirect()->route('admin.inovasi')->with('success', 'Inovasi berhasil diperbarui.');
    }

    public function destroy(Inovasi $inovasi)
    {
        if ($inovasi->file_path && Storage::disk('public')->exists($inovasi->file_path)) {
            Storage::disk('public')->delete($inovasi->file_path);
        }

        $inovasi->delete();

        return redirect()->route('admin.inovasi')->with('success', 'Inovasi berhasil dihapus.');
    }
}
