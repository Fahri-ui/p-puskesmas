<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category', 'penulis')->orderBy('created_at', 'desc')->get();
        $categories = BlogCategory::all();
        return view('admin.blog', compact('blogs', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'exists:blog_categories,id'],
            'isi' => ['required', 'string', 'min:10'],
            'status' => ['required', 'in:draft,publish,archived'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'tanggal_publish' => ['nullable', 'date'],
        ]);

        try {
            $slug = Str::slug($validated['judul']);
            $counter = 1;
            while (Blog::where('slug', $slug)->exists()) {
                $slug = Str::slug($validated['judul']) . '-' . $counter;
                $counter++;
            }

            $data = [
                'judul' => $validated['judul'],
                'slug' => $slug,
                'kategori_id' => $validated['kategori_id'],
                'isi' => $validated['isi'],
                'status' => $validated['status'],
                'penulis_id' => auth()->id(),
            ];

            if ($validated['status'] === 'publish') {
                $data['tanggal_publish'] = $validated['tanggal_publish'] ?? now();
            }

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/blogs'), $filename);
                $data['gambar'] = 'uploads/blogs/' . $filename;
            }

            Blog::create($data);

            return redirect()->route('admin.blog')->with('success', 'Blog berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog')->with('error', 'Terjadi kesalahan saat menyimpan blog.');
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori_id' => ['required', 'exists:blog_categories,id'],
            'isi' => ['required', 'string', 'min:10'],
            'status' => ['required', 'in:draft,publish,archived'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'tanggal_publish' => ['nullable', 'date'],
        ]);

        try {
            $slug = Str::slug($validated['judul']);
            $counter = 1;
            while (Blog::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = Str::slug($validated['judul']) . '-' . $counter;
                $counter++;
            }

            $data = [
                'judul' => $validated['judul'],
                'slug' => $slug,
                'kategori_id' => $validated['kategori_id'],
                'isi' => $validated['isi'],
                'status' => $validated['status'],
            ];

            if ($validated['status'] === 'publish' && !$blog->tanggal_publish) {
                $data['tanggal_publish'] = $validated['tanggal_publish'] ?? now();
            } elseif ($validated['status'] === 'publish') {
                $data['tanggal_publish'] = $validated['tanggal_publish'] ?? $blog->tanggal_publish;
            } else {
                $data['tanggal_publish'] = null;
            }

            if ($request->hasFile('gambar')) {
                if ($blog->gambar && file_exists(public_path($blog->gambar))) {
                    unlink(public_path($blog->gambar));
                }
                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/blogs'), $filename);
                $data['gambar'] = 'uploads/blogs/' . $filename;
            }

            $blog->update($data);

            return redirect()->route('admin.blog')->with('success', 'Blog berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog')->with('error', 'Terjadi kesalahan saat memperbarui blog.');
        }
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        try {
            if ($blog->gambar && file_exists(public_path($blog->gambar))) {
                unlink(public_path($blog->gambar));
            }
            $blog->delete();
            return redirect()->route('admin.blog')->with('success', 'Blog berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog')->with('error', 'Terjadi kesalahan saat menghapus blog.');
        }
    }
}
