<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\Inovasi;
use App\Models\Profil;
use App\Models\Service;
use App\Models\Staf;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $services = Service::orderByDesc('id')->limit(5)->get(['id', 'name', 'excerpt', 'created_at']);
        $stafs = Staf::orderByDesc('id')->limit(5)->get(['id', 'nama', 'profesi', 'jabatan', 'created_at']);
        $blogs = Blog::orderByDesc('id')->limit(5)->get(['id', 'title', 'status', 'published_at', 'excerpt']);
        $galleries = Gallery::orderByDesc('id')->limit(5)->get(['id', 'title', 'image', 'created_at']);
        $certificates = Certificate::orderByDesc('id')->limit(5)->get(['id', 'title', 'created_at']);
        $messages = ContactMessage::orderByDesc('id')->limit(5)->get(['id', 'name', 'subject', 'status', 'created_at']);
        $profiles = Profil::orderByDesc('id')->limit(5)->get(['id', 'title', 'description', 'image']);
        $visiMisis = VisiMisi::orderByDesc('id')->limit(5)->get(['id', 'type', 'content']);
        $inovasis = Inovasi::orderByDesc('id')->limit(5)->get(['id', 'title', 'description', 'file_path', 'created_at']);

        return view('pages.admin.dashboard', [
            'services' => $services,
            'stafs' => $stafs,
            'blogs' => $blogs,
            'galleries' => $galleries,
            'certificates' => $certificates,
            'messages' => $messages,
            'profiles' => $profiles,
            'visiMisis' => $visiMisis,
            'inovasis' => $inovasis,
            'totalServices' => Service::count(),
            'totalStafs' => Staf::count(),
            'totalBlogs' => Blog::count(),
            'totalGalleries' => Gallery::count(),
            'totalCertificates' => Certificate::count(),
            'totalMessages' => ContactMessage::count(),
            'totalProfiles' => Profil::count(),
            'totalVisiMisis' => VisiMisi::count(),
            'totalInovasis' => Inovasi::count(),
            'unreadMessages' => ContactMessage::unread()->count(),
        ]);
    }
}
