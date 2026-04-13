<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Inovasi;

class InovasiController extends Controller
{
    public function index()
    {
        $inovasis = Inovasi::latest()->get();

        return view('pages.landing.inovasi.index', compact('inovasis'));
    }
}
