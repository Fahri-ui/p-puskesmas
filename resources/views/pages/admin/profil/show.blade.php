<x-admin.app-layout>
    <div class="max-w-4xl mx-auto">
        <!-- Header + Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Data Profil</h1>
                <p class="text-gray-600 text-sm">Informasi profil Puskesmas Binong</p>
            </div>
            <div class="flex items-center gap-3">
                <!-- Edit Button - Always Visible -->
                <a href="{{ route('admin.profil.edit') }}"
                   class="inline-flex items-center px-4 py-2 bg-[#349953] text-white font-medium rounded-lg hover:bg-[#2d8a47] transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Data
                </a>

                <!-- Delete Button - Hidden by Design (Single Record) -->
                <!-- Jika ingin diaktifkan, uncomment kode berikut -->
                {{--
                <form action="{{ route('admin.profil.destroy', $profil) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data profil? Tindakan ini tidak dapat dibatalkan.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                    </button>
                </form>
                --}}
            </div>
        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <!-- Image Header -->
            @if($profil->image)
            <div class="h-48 sm:h-64 bg-gray-100">
                <img src="{{ Storage::url($profil->image) }}"
                     alt="{{ $profil->title }}"
                     class="w-full h-full object-cover">
            </div>
            @endif

            <!-- Body -->
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">
                    {{ $profil->title }}
                </h2>

                <div class="prose prose-sm max-w-none text-gray-600">
                    {!! nl2br(e($profil->description)) !!}
                </div>
            </div>

            <!-- Footer Meta -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 text-sm text-gray-500">
                <p>
                    Terakhir diperbarui:
                    <span class="font-medium text-gray-700">
                        {{ $profil->updated_at->format('d F Y, H:i') }}
                    </span>
                </p>
            </div>
        </div>

        <!-- Info Box: Single Record Notice -->
        <div class="mt-6 p-4 bg-[#349953]/10 border border-[#349953]/30 rounded-lg">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-[#349953] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-sm text-[#349953]">
                    <p class="font-medium">Sistem Satu Data</p>
                    <p class="mt-1 opacity-90">Halaman ini hanya mengelola satu data profil. Gunakan tombol <strong>Edit</strong> untuk memperbarui informasi.</p>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
