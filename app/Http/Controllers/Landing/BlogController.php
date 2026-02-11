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
        // Get category filter if exists
        $categoryId = $request->get('category');
        
        // Get search query if exists
        $search = $request->get('q');

        // Query builder
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
            $query->where(function($q) use ($search) {
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

        // Get paginated news (5 per page)
        $news = $query->paginate(5);

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
        $blog = Blog::where('slug', $slug)
            ->where('status', 'publish')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('category')
            ->firstOrFail();

        // Increment view count
        $blog->increment('views');

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

        // Get popular posts (most viewed)
        $popularPosts = Blog::where('status', 'publish')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->with('category')
            ->orderBy('views', 'desc')
            ->limit(5)
            ->get();

        return view('pages.landing.blog-detail', compact(
            'blog',
            'relatedPosts',
            'popularPosts'
        ));
    }
}
