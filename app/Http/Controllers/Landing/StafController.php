<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StafController extends Controller
{
    public function index()
    {
        return view('landing.staf');
    }
}
