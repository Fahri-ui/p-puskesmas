<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Exception;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('category')->orderBy('created_at', 'desc');

        // Filter by status via tab (opsional)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $blogs = $query->get();

        // include blog count for each category to display in the UI
        $categories = BlogCategory::withCount('blogs')->orderBy('nama_kategori')->get();

        return view('pages.admin.blog.index', compact('blogs', 'categories'));
    }

    public function storeKategory(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', Rule::unique('blog_categories', 'nama_kategori')],
        ]);

        try {
            BlogCategory::create([
                'nama_kategori' => $validated['nama_kategori'],
            ]);

            return redirect()->route('admin.blog')->with('success', 'Kategori berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog')->with('error', 'Terjadi kesalahan saat menyimpan kategori.');
        }
    }

    public function updateKategory(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', Rule::unique('blog_categories', 'nama_kategori')->ignore($category->id)],
        ]);

        try {
            $category->update([
                'nama_kategori' => $validated['nama_kategori'],
            ]);

            return redirect()->route('admin.blog')->with('success', 'Kategori berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog')->with('error', 'Terjadi kesalahan saat memperbarui kategori.');
        }
    }

    public function destroyKategory($id)
    {
        $category = BlogCategory::findOrFail($id);

        try {
            $category->delete();
            return redirect()->route('admin.blog')->with('success', 'Kategori berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog')->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'category_id'  => ['required', 'exists:blog_categories,id'],
            'content'      => ['required', 'string', 'min:10'],
            'excerpt'      => ['nullable', 'string', 'max:500'],
            'status'       => ['required', 'in:draft,publish,archived'],
            'thumbnail'    => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'image'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'published_at' => ['nullable', 'date'],
        ]);

        try {
            // Generate unique slug
            $slug = Str::slug($validated['title']);
            $counter = 1;
            while (Blog::where('slug', $slug)->exists()) {
                $slug = Str::slug($validated['title']) . '-' . $counter;
                $counter++;
            }

            $data = [
                'title'       => $validated['title'],
                'slug'        => $slug,
                'category_id' => $validated['category_id'],
                'content'     => $validated['content'],
                'excerpt'     => $validated['excerpt'] ?? null,
                'status'      => $validated['status'],
            ];

            // Handle published_at
            if ($validated['status'] === 'publish') {
                $data['published_at'] = $validated['published_at'] ?? now();
            }

            // Handle thumbnail upload
            if ($request->hasFile('thumbnail')) {
                $file     = $request->file('thumbnail');
                $filename = time() . '_thumb_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/blogs'), $filename);
                $data['thumbnail'] = 'uploads/blogs/' . $filename;
            }

            // Handle featured image upload
            if ($request->hasFile('image')) {
                $file     = $request->file('image');
                $filename = time() . '_featured_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/blogs'), $filename);
                $data['image'] = 'uploads/blogs/' . $filename;
            }

            Blog::create($data);

            return redirect()->route('admin.blog')->with('success', 'Blog berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog')->with('error', 'Terjadi kesalahan saat menyimpan blog: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $blog       = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('nama_kategori')->get();

        return view('pages.admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'category_id'  => ['required', 'exists:blog_categories,id'],
            'content'      => ['required', 'string', 'min:10'],
            'excerpt'      => ['nullable', 'string', 'max:500'],
            'status'       => ['required', 'in:draft,publish,archived'],
            'thumbnail'    => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'image'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'published_at' => ['nullable', 'date'],
        ]);

        try {
            // Generate unique slug (exclude current blog)
            $slug    = Str::slug($validated['title']);
            $counter = 1;
            while (Blog::where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = Str::slug($validated['title']) . '-' . $counter;
                $counter++;
            }

            $data = [
                'title'       => $validated['title'],
                'slug'        => $slug,
                'category_id' => $validated['category_id'],
                'content'     => $validated['content'],
                'excerpt'     => $validated['excerpt'] ?? null,
                'status'      => $validated['status'],
            ];

            // Handle published_at
            if ($validated['status'] === 'publish') {
                $data['published_at'] = $validated['published_at'] ?? $blog->published_at ?? now();
            } else {
                $data['published_at'] = null;
            }

            // Handle thumbnail upload
            if ($request->hasFile('thumbnail')) {
                // Hapus thumbnail lama
                if ($blog->thumbnail && file_exists(public_path($blog->thumbnail))) {
                    unlink(public_path($blog->thumbnail));
                }
                $file     = $request->file('thumbnail');
                $filename = time() . '_thumb_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/blogs'), $filename);
                $data['thumbnail'] = 'uploads/blogs/' . $filename;
            }

            // Handle featured image upload
            if ($request->hasFile('image')) {
                // Hapus image lama
                if ($blog->image && file_exists(public_path($blog->image))) {
                    unlink(public_path($blog->image));
                }
                $file     = $request->file('image');
                $filename = time() . '_featured_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/blogs'), $filename);
                $data['image'] = 'uploads/blogs/' . $filename;
            }

            $blog->update($data);

            return redirect()->route('admin.blog')->with('success', 'Blog berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog')->with('error', 'Terjadi kesalahan saat memperbarui blog: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        try {
            // Hapus thumbnail jika ada
            if ($blog->thumbnail && file_exists(public_path($blog->thumbnail))) {
                unlink(public_path($blog->thumbnail));
            }

            // Hapus featured image jika ada
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            $blog->delete();

            return redirect()->route('admin.blog')->with('success', 'Blog berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->route('admin.blog')->with('error', 'Terjadi kesalahan saat menghapus blog: ' . $e->getMessage());
        }
    }
}
