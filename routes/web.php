<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SuperAdmin\SADashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\StafController;
use App\Http\Controllers\Admin\KategoriBlogController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {return view('welcome');})->name('welcome');
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
        Route::get('/admin/blog',[BlogController::class,'index'])->name('admin.blog');
        Route::post('/admin/blog',[BlogController::class,'store'])->name('admin.blog.store');
        Route::get('/admin/blog/{id}/edit',[BlogController::class,'edit'])->name('admin.blog.edit');
        Route::put('/admin/blog/{id}',[BlogController::class,'update'])->name('admin.blog.update');
        Route::delete('/admin/blog/{id}',[BlogController::class,'destroy'])->name('admin.blog.destroy');
        Route::get('/admin/layanan',[LayananController::class,'index'])->name('admin.layanan');
        Route::post('/admin/layanan',[LayananController::class,'store'])->name('admin.layanan.store');
        Route::put('/admin/layanan/{id}',[LayananController::class,'update'])->name('admin.layanan.update');
        Route::delete('/admin/layanan/{id}',[LayananController::class,'destroy'])->name('admin.layanan.destroy');
        Route::patch('/admin/layanan/{id}/toggle-status',[LayananController::class,'toggleStatus'])->name('admin.layanan.toggle-status');
        Route::get('/admin/staf',[StafController::class,'index'])->name('admin.staf');
        Route::post('/admin/staf',[StafController::class,'store'])->name('admin.staf.store');
        Route::get('/admin/staf/{id}',[StafController::class,'show'])->name('admin.staf.show');
        Route::get('/admin/staf/{id}/edit',[StafController::class,'edit'])->name('admin.staf.edit');
        Route::put('/admin/staf/{id}',[StafController::class,'update'])->name('admin.staf.update');
        Route::delete('/admin/staf/{id}',[StafController::class,'destroy'])->name('admin.staf.destroy');
        Route::patch('/admin/staf/{id}/toggle-status',[StafController::class,'toggleStatus'])->name('admin.staf.toggle-status');
        Route::get('/admin/kategori-blog',[KategoriBlogController::class,'index'])->name('admin.kategori_blog');
        Route::post('/admin/kategori-blog',[KategoriBlogController::class,'store'])->name('admin.kategori_blog.store');
        Route::put('/admin/kategori-blog/{id}',[KategoriBlogController::class,'update'])->name('admin.kategori_blog.update');
        Route::delete('/admin/kategori-blog/{id}',[KategoriBlogController::class,'destroy'])->name('admin.kategori_blog.destroy');
    });
    Route::middleware('role:SUPER_ADMIN')->group(function(){
        Route::get('/super-admin/dashboard',[SADashboardController::class,'index'])->name('super_admin.dashboard');
    });
});