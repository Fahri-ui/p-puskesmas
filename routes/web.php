<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin;
use App\Http\Controllers\SuperAdmin;

Route::middleware('guest')->group(function () {
    // landing route
    Route::get('/', [Landing\HomeController::class, 'index'])->name('welcome');
    Route::get('/tentang-kami', [Landing\AboutController::class, 'index'])->name('about');
    Route::get('/layanan', [Landing\ServiceController::class, 'index'])->name('service');
    Route::get('/inovasi', [Landing\InovasiController::class, 'index'])->name('inovasi');
    Route::get('/staf', [Landing\StafController::class, 'index'])->name('staf');
    Route::get('/staf/{id}', [Landing\StafController::class, 'show'])->name('staf.show');
    Route::get('/berita', [Landing\BlogController::class, 'index'])->name('blog');
    Route::get('/berita/{slug}', [Landing\BlogController::class, 'show'])->name('blog.show');
    Route::get('/galeri', [Landing\GalleryController::class, 'index'])->name('gallery');
    Route::get('/kontak', [Landing\ContactController::class, 'index'])->name('contact');

    // authentication routes
    Route::get('/login', [Auth\LoginController::class, 'showLoginForm']);
    Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');
    Route::get('/forgot-password', [Auth\ForgotPasswordController::class, 'showForm']);
    Route::post('/forgot-password', [Auth\ForgotPasswordController::class, 'submit'])->name('forgot-password');
    Route::get('/reset-password', [Auth\ResetPasswordController::class, 'showForm']);
    Route::post('/reset-password', [Auth\ResetPasswordController::class, 'submit'])->name('reset-password');
}); 

Route::middleware('auth')->group(function () {

    Route::post('/logout', [Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('role:ADMIN')->group(function () {
        Route::get('/admin/dashboard',[Admin\DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/admin/blog',[Admin\BlogController::class,'index'])->name('admin.blog');
        Route::post('/admin/blog',[Admin\BlogController::class,'store'])->name('admin.blog.store');
        Route::get('/admin/blog/{id}/edit',[Admin\BlogController::class,'edit'])->name('admin.blog.edit');
        Route::put('/admin/blog/{id}',[Admin\BlogController::class,'update'])->name('admin.blog.update');
        Route::delete('/admin/blog/{id}',[Admin\BlogController::class,'destroy'])->name('admin.blog.destroy');
        Route::get('/admin/layanan',[Admin\LayananController::class,'index'])->name('admin.layanan');
        Route::post('/admin/layanan',[Admin\LayananController::class,'store'])->name('admin.layanan.store');
        Route::put('/admin/layanan/{id}',[Admin\LayananController::class,'update'])->name('admin.layanan.update');
        Route::delete('/admin/layanan/{id}',[Admin\LayananController::class,'destroy'])->name('admin.layanan.destroy');
        Route::patch('/admin/layanan/{id}/toggle-status',[Admin\LayananController::class,'toggleStatus'])->name('admin.layanan.toggle-status');
        Route::get('/admin/staf',[Admin\StafController::class,'index'])->name('admin.staf');
        Route::post('/admin/staf',[Admin\StafController::class,'store'])->name('admin.staf.store');
        Route::get('/admin/staf/{id}',[Admin\StafController::class,'show'])->name('admin.staf.show');
        Route::get('/admin/staf/{id}/edit',[Admin\StafController::class,'edit'])->name('admin.staf.edit');
        Route::put('/admin/staf/{id}',[Admin\StafController::class,'update'])->name('admin.staf.update');
        Route::delete('/admin/staf/{id}',[Admin\StafController::class,'destroy'])->name('admin.staf.destroy');
        Route::patch('/admin/staf/{id}/toggle-status',[Admin\StafController::class,'toggleStatus'])->name('admin.staf.toggle-status');
        Route::get('/admin/kategori-blog',[Admin\KategoriBlogController::class,'index'])->name('admin.kategori_blog');
        Route::post('/admin/kategori-blog',[Admin\KategoriBlogController::class,'store'])->name('admin.kategori_blog.store');
        Route::put('/admin/kategori-blog/{id}',[Admin\KategoriBlogController::class,'update'])->name('admin.kategori_blog.update');
        Route::delete('/admin/kategori-blog/{id}',[Admin\KategoriBlogController::class,'destroy'])->name('admin.kategori_blog.destroy');
    });
});