<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'min:2', 'max:100'],
            'email'    => ['required', 'email:rfc,dns', 'max:150'],
            'subject'  => ['required', 'string', 'min:3', 'max:200'],
            'message'  => ['required', 'string', 'min:10', 'max:3000'],

            // Honeypot field — harus kosong (bot biasanya mengisi semua field)
            'website'  => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Nama lengkap wajib diisi.',
            'name.min'         => 'Nama minimal 2 karakter.',
            'email.required'   => 'Alamat email wajib diisi.',
            'email.email'      => 'Format email tidak valid.',
            'subject.required' => 'Tujuan pesan wajib diisi.',
            'subject.min'      => 'Tujuan minimal 3 karakter.',
            'message.required' => 'Pesan wajib diisi.',
            'message.min'      => 'Pesan minimal 10 karakter.',
            'message.max'      => 'Pesan maksimal 3000 karakter.',
            'website.max'      => 'Terdeteksi sebagai bot.',
        ];
    }

    /**
     * Sanitasi input sebelum validasi
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name'    => strip_tags($this->name),
            'subject' => strip_tags($this->subject),
            'message' => strip_tags($this->message),
        ]);
    }
}
