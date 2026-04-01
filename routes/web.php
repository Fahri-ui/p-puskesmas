<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\LayananController;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

RateLimiter::for('contact-form', function (Request $request) {
    // Nonaktifkan rate limit saat development
    if (app()->environment('local')) {
        return Limit::none();
    }

    return [
        Limit::perMinutes(10, 3)->by($request->ip()),
        Limit::perHour(5)->by($request->input('email')),
    ];
});

Route::middleware('guest')->group(function () {
    // landing route
    Route::get('/', [Landing\HomeController::class, 'index'])->name('welcome');
    // about
    Route::get('/tentang-kami', [Landing\AboutController::class, 'index'])->name('about');
    // service
    Route::get('/layanan', [Landing\ServiceController::class, 'index'])->name('service');
    Route::get('/layanan/{slug}', [Landing\ServiceController::class, 'show'])->name('service.show');
    // inovaci
    Route::get('/inovasi', [Landing\InovasiController::class, 'index'])->name('inovasi');
    // staf
    Route::get('/staf', [Landing\StafController::class, 'index'])->name('staf');
    Route::get('/staf/{id}', [Landing\StafController::class, 'show'])->name('staf.show');
    // blog
    Route::get('/berita', [Landing\BlogController::class, 'index'])->name('blog');
    Route::get('/berita/{slug}', [Landing\BlogController::class, 'show'])->name('blog.show');
    // gallery
    Route::get('/galeri', [Landing\GalleryController::class, 'index'])->name('gallery');
    // kontak
    Route::get('/kontak', [Landing\ContactController::class, 'index'])->name('contact');
    Route::post('/kontak', [Landing\ContactController::class, 'store'])
        ->middleware('throttle:contact-form')
        ->name('contact.store');

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
        // dashboard
        Route::get('/admin/dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        // blog
        Route::get('/admin/blog', [Admin\BlogController::class, 'index'])->name('admin.blog');
        Route::post('/admin/blog', [Admin\BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/admin/blog/{id}/edit', [Admin\BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::put('/admin/blog/{id}', [Admin\BlogController::class, 'update'])->name('admin.blog.update');
        Route::delete('/admin/blog/{id}', [Admin\BlogController::class, 'destroy'])->name('admin.blog.destroy');
        // category blog
        Route::post('/admin/kategori-blog', [Admin\BlogController::class, 'storeKategory'])->name('admin.kategori_blog.store');
        Route::put('/admin/kategori-blog/{id}', [Admin\BlogController::class, 'updateKategory'])->name('admin.kategori_blog.update');
        Route::delete('/admin/kategori-blog/{id}', [Admin\BlogController::class, 'destroyKategory'])->name('admin.kategori_blog.destroy');
        // service
        Route::get('/admin/layanan', [LayananController::class, 'index'])->name('admin.layanan');
        Route::post('/admin/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
        Route::put('/admin/layanan/{id}', [LayananController::class, 'update'])->name('admin.layanan.update');
        Route::delete('/admin/layanan/{id}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');
        Route::patch('/admin/layanan/{id}/toggle-status', [LayananController::class, 'toggleStatus'])->name('admin.layanan.toggle-status');
        // staf
        Route::get('/admin/staff', [Admin\StafController::class, 'index'])->name('admin.staf');
        Route::post('/admin/staf', [Admin\StafController::class, 'store'])->name('admin.staf.store');
        Route::get('/admin/staf/{id}', [Admin\StafController::class, 'show'])->name('admin.staf.show');
        Route::get('/admin/staf/{id}/edit', [Admin\StafController::class, 'edit'])->name('admin.staf.edit');
        Route::put('/admin/staf/{id}', [Admin\StafController::class, 'update'])->name('admin.staf.update');
        Route::delete('/admin/staf/{id}', [Admin\StafController::class, 'destroy'])->name('admin.staf.destroy');
        Route::patch('/admin/staf/{id}/toggle-status', [Admin\StafController::class, 'toggleStatus'])->name('admin.staf.toggle-status');
        // gallery
        Route::get('/admin/gallery', [Admin\GalleryController::class, 'index'])->name('admin.gallery');
        Route::post('/admin/gallery', [Admin\GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::get('/admin/gallery/{id}/edit', [Admin\GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::put('/admin/gallery/{id}', [Admin\GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::delete('/admin/gallery/{id}', [Admin\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    });
});
