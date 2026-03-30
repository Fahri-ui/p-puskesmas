<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.landing.service.index', compact('services'));
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.landing.service.show', compact('service'));
    }
}
