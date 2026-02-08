<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StafController extends Controller
{
    public function index()
    {
        return view('pages.landing.staf');
    }

    public function show($id)
    {
        return view('pages.landing.staf-show', compact('id'));
    }
}
