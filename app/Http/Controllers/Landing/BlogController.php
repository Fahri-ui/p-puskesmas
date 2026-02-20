<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->get('category');
        $search = $request->get('q');

        $query = Blog::where('status', 'publish')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('category')
            ->latest('published_at');

        // Filter by category
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Search functionality
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%');
            });
        }

        // Get featured news (first published post)
        $featuredNews = Blog::where('status', 'publish')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('category')
            ->latest('published_at')
            ->first();

        // Get paginated news (5 per page) - WITH APPENDS
        $news = $query->paginate(5)->appends(request()->query()); // ✅ Tambahkan ini

        // Get popular/latest news (4 items)
        $popularNews = Blog::where('status', 'publish')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('category')
            ->latest('published_at')
            ->limit(4)
            ->get();

        // Get all categories
        $categories = BlogCategory::all();

        return view('pages.landing.blog', compact(
            'featuredNews',
            'news',
            'popularNews',
            'categories',
            'categoryId',
            'search'
        ));
    }

    public function show($slug)
    {
        // Get the blog post by slug
        $blog = Blog::where('slug', $slug)
            ->where('status', 'publish')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('category')
            ->firstOrFail();

        // Get related posts (same category, exclude current)
        $relatedPosts = Blog::where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->where('status', 'publish')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('category')
            ->latest('published_at')
            ->limit(3)
            ->get();

        // Get recent posts (latest 5)
        $recentPosts = Blog::where('status', 'publish')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('category')
            ->latest('published_at')
            ->limit(5)
            ->get();

        // Get all categories
        $categories = BlogCategory::all();

        return view('pages.landing.blog-show', compact(
            'blog',
            'relatedPosts',
            'recentPosts',
            'categories'
        ));
    }
}
