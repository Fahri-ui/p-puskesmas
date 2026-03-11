<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InovasiController extends Controller
{
    public function index()
    {
        return view('pages.landing.inovasi');
    }
}
