<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);

        return view('pages.admin.messages.index', compact('messages'));
    }
    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()
            ->route('pages.admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
