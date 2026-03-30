<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Staf;

class StafController extends Controller
{
    public function index()
    {
        $stafs = Staf::orderBy('urutan')->get();
        return view('pages.landing.staf.index', compact('stafs'));
    }

    public function show($id)
    {
        $staf = Staf::findOrFail($id);
        return view('pages.landing.staf.show', compact('staf'));
    }
}
