<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $profil = Profil::first();
        $visi = VisiMisi::where('type', 'visi')->first();
        $misis = VisiMisi::where('type', 'misi')->get();

        return view('pages.landing.about.index', compact('profil', 'visi', 'misis'));
    }
}
