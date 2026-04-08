<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('category');
        $search     = $request->query('q');

        // Query dasar: hanya blog berstatus published
        $query = Blog::published()->with('category')->latest('published_at');

        // Filter berdasarkan kategori jika ada
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Filter pencarian berdasarkan judul atau excerpt
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        // Ambil berita terbaru sebagai featured (hanya jika tidak ada filter)
        $featuredNews = null;
        if (!$categoryId && !$search) {
            $featuredNews = (clone $query)->first();
        }

        // Ambil daftar berita (kecuali featured) dengan pagination
        $news = (clone $query)
            ->when($featuredNews, fn($q) => $q->where('id', '!=', $featuredNews->id))
            ->paginate(6)
            ->withQueryString();

        // Berita terbaru untuk sidebar (5 terakhir)
        $popularNews = Blog::published()
            ->with('category')
            ->latest('published_at')
            ->take(5)
            ->get();

        // Semua kategori untuk sidebar filter
        $categories = BlogCategory::orderBy('nama_kategori')->get();
// Lihat SEMUA data mentah tanpa filter apapun

        return view('pages.landing.blog.index', compact(
            'news',
            'featuredNews',
            'popularNews',
            'categories',
            'categoryId',
            'search'
        ));
    }

    public function show($slug)
    {
        // Hanya tampilkan blog yang sudah published
        $blog = Blog::published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        // Artikel terkait: kategori sama, bukan artikel ini sendiri
        $relatedPosts = Blog::published()
            ->with('category')
            ->where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(2)
            ->get();

        // Berita terkini untuk sidebar
        $recentPosts = Blog::published()
            ->with('category')
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('pages.landing.blog.show', compact('blog', 'relatedPosts', 'recentPosts'));
    }
}
