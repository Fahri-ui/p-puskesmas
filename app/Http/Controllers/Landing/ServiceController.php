<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('aktif', true)
            ->orderBy('urutan', 'asc')
            ->get();

        return view('landing.service', compact('services'));
    }
}
