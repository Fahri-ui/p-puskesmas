<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SuperAdmin\SADashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;



Route::middleware('guest')->group(function () {
    Route::get('/', function () {return view('welcome');});
    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm']);
    Route::post('/forgot-password', [ForgotPasswordController::class, 'submit'])->name('forgot-password');
    Route::get('/reset-password', [ResetPasswordController::class, 'showForm']);
    Route::post('/reset-password', [ResetPasswordController::class, 'submit'])->name('reset-password');
}); 

Route::middleware('auth')->group(function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('role:ADMIN')->group(function () {
        Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    });
    Route::middleware('role:SUPER_ADMIN')->group(function(){
        Route::get('/super-admin/dashboard',[SADashboardController::class,'index'])->name('super_admin.dashboard');
    });
});