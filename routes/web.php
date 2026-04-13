<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Admin;
use Illuminate\Http\Request;

RateLimiter::for('contact-form', function (Request $request) {
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
        Route::patch('/admin/layanan/{layanan}/toggle-status', [LayananController::class, 'toggleStatus'])->name('admin.layanan.toggle-status');
        // category blog
        Route::post('/admin/kategori-blog', [Admin\BlogController::class, 'storeKategory'])->name('admin.kategori_blog.store');
        Route::put('/admin/kategori-blog/{id}', [Admin\BlogController::class, 'updateKategory'])->name('admin.kategori_blog.update');
        Route::delete('/admin/kategori-blog/{id}', [Admin\BlogController::class, 'destroyKategory'])->name('admin.kategori_blog.destroy');
        // service
        Route::get('/admin/layanan', [LayananController::class, 'index'])->name('admin.layanan');
        Route::post('/admin/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
        Route::put('/admin/layanan/{layanan}', [LayananController::class, 'update'])->name('admin.layanan.update');
        Route::delete('/admin/layanan/{layanan}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');
        Route::patch('/admin/layanan/{layanan}/toggle-status', [LayananController::class, 'toggleStatus'])->name('admin.layanan.toggle-status');
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
        Route::get('/admin/gallery/{gallery}/edit', [Admin\GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::put('/admin/gallery/{gallery}', [Admin\GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::delete('/admin/gallery/{gallery}', [Admin\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
        // message
        Route::get('/admin/message', [Admin\MessageController::class, 'index'])->name('admin.message');
        Route::delete('/messages/{message}', [Admin\MessageController::class, 'destroy'])->name('admin.messages.destroy');
        // profil
        Route::get('/admin/profil', [Admin\ProfilController::class, 'index'])->name('admin.profil');
        Route::post('/admin/profil', [Admin\ProfilController::class, 'store'])->name('admin.profil.store');
        Route::get('/admin/profil/edit', [Admin\ProfilController::class, 'edit'])->name('admin.profil.edit');
        Route::put('/admin/profil', [Admin\ProfilController::class, 'update'])->name('admin.profil.update');
        // Delete route dihilangkan dari UI, tapi bisa tetap ada untuk keperluan teknis
        // Route::delete('/profil/{profil}', [Admin\ProfilController::class, 'destroy'])->name('admin.profil.destroy');
        // VisiMisi
        Route::get('/admin/visi-misi', [Admin\VisiMisiController::class, 'index'])->name('admin.visi-misi.index');
        Route::post('/admin/visi-misi/visi', [Admin\VisiMisiController::class, 'storeVisi'])->name('admin.visi-misi.store-visi');
        Route::post('/admin/visi-misi/misi', [Admin\VisiMisiController::class, 'storeMisi'])->name('admin.visi-misi.store-misi');
        Route::put('/admin/visi-misi/visi/{visi}', [Admin\VisiMisiController::class, 'updateVisi'])->name('admin.visi-misi.update-visi');
        Route::put('/admin/visi-misi/misi/{misi}', [Admin\VisiMisiController::class, 'updateMisi'])->name('admin.visi-misi.update-misi');
        Route::delete('/admin/visi-misi/misi/{misi}', [Admin\VisiMisiController::class, 'destroyMisi'])->name('admin.visi-misi.destroy-misi');
        // Certificate
        Route::get('/admin/certificate', [Admin\CertificateController::class, 'index'])->name('admin.certificate');
        Route::post('/admin/certificate', [Admin\CertificateController::class, 'store'])->name('admin.certificate.store');
        Route::put('/admin/certificate/{certificate}', [Admin\CertificateController::class, 'update'])->name('admin.certificate.update');
        Route::delete('/admin/certificate/{certificate}', [Admin\CertificateController::class, 'destroy'])->name('admin.certificate.destroy');
        // inovasi
        Route::get('/admin/inovasi', [Admin\InovasiController::class, 'index'])->name('admin.inovasi');
        Route::post('/admin/inovasi', [Admin\InovasiController::class, 'store'])->name('admin.inovasi.store');
        Route::put('/admin/inovasi/{inovasi}', [Admin\InovasiController::class, 'update'])->name('admin.inovasi.update');
        Route::delete('/admin/inovasi/{inovasi}', [Admin\InovasiController::class, 'destroy'])->name('admin.inovasi.destroy');
    });
});

Route::fallback([ErrorController::class, 'notFound']);
