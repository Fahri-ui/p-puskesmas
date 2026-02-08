<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.landing.blog');
    }

    public function show($slug)
    {
        return view('pages.landing.blog-show', compact('slug'));
    }
}
