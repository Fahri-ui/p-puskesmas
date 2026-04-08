<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\ContactMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.landing.contact.index');
    }

    public function store(ContactFormRequest $request): JsonResponse
    {
        // Cek honeypot — jika field 'website' terisi, abaikan diam-diam
        if ($request->filled('website')) {
            // Kembalikan respons sukses palsu agar bot tidak tahu
            return response()->json([
                'success' => true,
                'message' => 'Pesan Anda telah terkirim. Terima kasih!',
            ]);
        }

        try {
            ContactMessage::create([
                'name'       => $request->validated('name'),
                'email'      => $request->validated('email'),
                'subject'    => $request->validated('subject'),
                'message'    => $request->validated('message'),
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pesan Anda telah terkirim. Terima kasih!',
            ]);
        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage(), [
                'email' => $request->validated('email'),
                'ip'    => $request->ip(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan. Silakan coba lagi.',
            ], 500);
        }
    }
}
