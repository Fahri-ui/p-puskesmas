<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Validation\Rule;
use Exception;

class KategoriBlogController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::orderBy('created_at', 'desc')->get();
        return view('admin.kategori_blog', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', Rule::unique('blog_categories', 'nama_kategori')],
        ]);

        try {
            BlogCategory::create([
                'nama_kategori' => $validated['nama_kategori'],
            ]);

            return redirect()->route('admin.kategori_blog')->with('success', 'Kategori berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('admin.kategori_blog')->with('error', 'Terjadi kesalahan saat menyimpan kategori.');
        }
    }

    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', Rule::unique('blog_categories', 'nama_kategori')->ignore($category->id)],
        ]);

        try {
            $category->update([
                'nama_kategori' => $validated['nama_kategori'],
            ]);

            return redirect()->route('admin.kategori_blog')->with('success', 'Kategori berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('admin.kategori_blog')->with('error', 'Terjadi kesalahan saat memperbarui kategori.');
        }
    }

    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);

        try {
            $category->delete();
            return redirect()->route('admin.kategori_blog')->with('success', 'Kategori berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('admin.kategori_blog')->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }
    }
}
