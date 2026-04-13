<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\Service;
use App\Models\Staf;

class HomeController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        $services = Service::where('is_active', true)
            ->orderBy('id')
            ->get();
        $stafs = Staf::orderBy('nama')->limit(6)->get();
        return view('pages.landing.home', compact('profil', 'services', 'stafs'));
    }
}
