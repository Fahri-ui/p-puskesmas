<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::middleware('auth')->group(function () {
    Route::middleware('role:ADMIN')->group(function () {
        // Admin routes here
    });
    Route::middleware('role:SUPER_ADMIN')->group(function(){
        // Super Admin routes here
    });
}); 