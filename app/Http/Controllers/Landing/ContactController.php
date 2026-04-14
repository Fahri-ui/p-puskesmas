<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.landing.contact.index');
    }

    public function store(ContactFormRequest $request): RedirectResponse
    {
        try {
            ContactMessage::create([
                'name'       => $request->validated('name'),
                'email'      => $request->validated('email'),
                'subject'    => $request->validated('subject'),
                'message'    => $request->validated('message'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->route('contact')->with('success', 'Pesan Anda telah terkirim. Terima kasih!');
        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage(), [
                'email' => $request->validated('email'),
                'ip'    => $request->ip(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }
}
