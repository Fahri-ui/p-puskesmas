@extends('layouts.admin.main')

@section('title', 'Kelola Layanan - Puskesmas Binong')
@section('page-title', 'Layanan')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Kelola layanan kesehatan yang tersedia di Puskesmas Binong</p>
        </div>
        <button onclick="openModal('add')" class="bg-green-700 hover:bg-green-800 text-white px-6 py-2.5 rounded-lg flex items-center space-x-2 transition duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Tambah Layanan</span>
        </button>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Layanan</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalServices ?? 0 }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Layanan Aktif</p>
                    <p class="text-3xl font-bold text-green-600">{{ $activeServices ?? 0 }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Tidak Aktif</p>
                    <p class="text-3xl font-bold text-gray-500">{{ $inactiveServices ?? 0 }}</p>
                </div>
                <div class="bg-gray-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Cari layanan..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent w-full md:w-80">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <div class="flex items-center space-x-3">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Semua Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Tidak Aktif</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ikon</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Layanan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Urutan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="tableBody">
                    @forelse($services ?? collect() as $index => $service)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                @if($service->icon)
                                    @php
                                        $iconName = $service->icon;
                                        $iconClasses = "w-6 h-6 text-green-700";
                                        $svgPath = '';

                                        switch ($iconName) {
                                            case 'stethoscope':
                                                $svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>';
                                                break;
                                            case 'microscope':
                                                $svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>';
                                                break;
                                            case 'syringe':
                                                $svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c.195.195.291.45.291.707v2.586a1 1 0 01-1 1H4a1 1 0 01-1-1v-2.586c0-.257.096-.512.291-.707l5-5A2 2 0 008.586 10.172V5L8 4z"/>';
                                                break;
                                            case 'user-group':
                                                $svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>';
                                                break;
                                            case 'clock':
                                                $svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>';
                                                break;
                                            case 'home':
                                                $svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>';
                                                break;
                                            case 'plus-circle':
                                                $svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>';
                                                break;
                                            default: // clipboard
                                                $svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>';
                                        }
                                    @endphp
                                    <svg class="{{ $iconClasses }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        {!! $svgPath !!}
                                    </svg>
                                @else
                                    <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $service->nama_layanan }}</p>
                                <p class="text-xs text-gray-500">{{ $service->slug }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs">
                            <p class="line-clamp-2">{{ $service->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $service->urutan }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full {{ $service->aktif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $service->aktif ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <button onclick="openModal('edit', {{ $service->id }}, '{{ $service->nama_layanan }}', '{{ $service->deskripsi }}', '{{ $service->icon }}', {{ $service->aktif ? 'true' : 'false' }}, {{ $service->urutan }})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition duration-150" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <form method="POST" action="{{ route('admin.layanan.toggle-status', $service->id) }}" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition duration-150" title="Ubah Status">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                        </svg>
                                    </button>
                                </form>
                                <button onclick="confirmDelete({{ $service->id }}, '{{ $service->nama_layanan }}')" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition duration-150" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-lg font-medium">Belum ada layanan</p>
                                <p class="text-sm">Mulai dengan menambahkan layanan baru</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Menampilkan <span class="font-medium">1-3</span> dari <span class="font-medium">12</span> layanan
            </div>
            <div class="flex items-center space-x-2">
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    Sebelumnya
                </button>
                <button class="px-3 py-2 bg-green-700 text-white rounded-lg text-sm">1</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-50">2</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-50">3</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-50">
                    Selanjutnya
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add/Edit Layanan -->
<div id="modalLayanan" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
            <h3 id="modalTitle" class="text-xl font-semibold text-gray-800">Tambah Layanan Baru</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <form class="p-6 space-y-5" method="POST">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Layanan <span class="text-red-500">*</span></label>
                <input type="text" name="nama_layanan" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Contoh: Pemeriksaan Umum" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Slug <span class="text-red-500">*</span></label>
                <input type="text" name="slug" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent bg-gray-50" placeholder="pemeriksaan-umum" required readonly>
                <p class="mt-1 text-xs text-gray-500">Akan otomatis dibuat dari nama layanan</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Jelaskan detail tentang layanan ini..."></textarea>
            </div>

            <!-- Input Tersembunyi untuk Menyimpan Nama/Kode Ikon (Opsional, hanya untuk UI) -->
            <input type="hidden" name="icon" id="selectedIconInput">

            <!-- Field Ikon - Versi Ramah Pengguna -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ikon Layanan</label>

                <!-- Preview & Tombol Pilih -->
                <div class="flex items-center space-x-4">
                    <!-- Preview Ikon Terpilih -->
                    <div id="iconPreviewContainer" class="w-12 h-12 flex items-center justify-center border border-gray-300 rounded-lg bg-gray-50">
                        <svg id="iconPreview" class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>

                    <!-- Tombol Pilih Ikon -->
                    <button type="button" onclick="openIconModal()" class="px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Pilih Ikon</span>
                    </button>
                </div>

                <p class="mt-2 text-xs text-gray-500">Pilih ikon dari daftar yang tersedia untuk mewakili layanan ini.</p>
            </div>

            <!-- Modal Galeri Ikon -->
            <div id="iconModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[80vh] overflow-hidden">
                    <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800">Pilih Ikon</h3>
                        <button onclick="closeIconModal()" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Grid Ikon -->
                    <div class="p-6 overflow-y-auto max-h-[60vh]">
                        <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-4">
                            <!-- Daftar Ikon (gunakan Heroicons atau ikon relevan kesehatan) -->
                            <!-- Setiap ikon bisa diklik untuk dipilih -->
                            <button type="button" onclick="selectIcon('stethoscope')" class="flex flex-col items-center space-y-2 p-2 rounded-lg hover:bg-gray-100 transition">
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span class="text-xs text-gray-600">Hati</span>
                            </button>

                            <button type="button" onclick="selectIcon('microscope')" class="flex flex-col items-center space-y-2 p-2 rounded-lg hover:bg-gray-100 transition">
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <span class="text-xs text-gray-600">Lab</span>
                            </button>

                            <button type="button" onclick="selectIcon('syringe')" class="flex flex-col items-center space-y-2 p-2 rounded-lg hover:bg-gray-100 transition">
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c.195.195.291.45.291.707v2.586a1 1 0 01-1 1H4a1 1 0 01-1-1v-2.586c0-.257.096-.512.291-.707l5-5A2 2 0 008.586 10.172V5L8 4z"></path>
                                </svg>
                                <span class="text-xs text-gray-600">Imunisasi</span>
                            </button>

                            <button type="button" onclick="selectIcon('clipboard')" class="flex flex-col items-center space-y-2 p-2 rounded-lg hover:bg-gray-100 transition">
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <span class="text-xs text-gray-600">Dokumen</span>
                            </button>

                            <button type="button" onclick="selectIcon('user-group')" class="flex flex-col items-center space-y-2 p-2 rounded-lg hover:bg-gray-100 transition">
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span class="text-xs text-gray-600">Keluarga</span>
                            </button>

                            <button type="button" onclick="selectIcon('clock')" class="flex flex-col items-center space-y-2 p-2 rounded-lg hover:bg-gray-100 transition">
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-xs text-gray-600">Jadwal</span>
                            </button>

                            <button type="button" onclick="selectIcon('home')" class="flex flex-col items-center space-y-2 p-2 rounded-lg hover:bg-gray-100 transition">
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                <span class="text-xs text-gray-600">Rumah</span>
                            </button>

                            <button type="button" onclick="selectIcon('plus-circle')" class="flex flex-col items-center space-y-2 p-2 rounded-lg hover:bg-gray-100 transition">
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-xs text-gray-600">Umum</span>
                            </button>
                        </div>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
                        <button type="button" onclick="closeIconModal()" class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">Tutup</button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampilan <span class="text-red-500">*</span></label>
                    <input type="number" name="urutan" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="1" value="1" min="1" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                    <select name="aktif" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-5 flex justify-end space-x-3">
                <button type="button" onclick="closeModal()" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2.5 bg-green-700 text-white rounded-lg hover:bg-green-800 transition duration-200">
                    Simpan Layanan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="modalDelete" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="p-6">
            <div class="flex items-center justify-center w-12 h-12 bg-red-100 rounded-full mx-auto mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Hapus Layanan?</h3>
            <p class="text-sm text-gray-600 text-center mb-6">Apakah Anda yakin ingin menghapus layanan "<span id="deleteServiceName" class="font-medium text-gray-900"></span>"? Data yang dihapus tidak dapat dikembalikan.</p>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex space-x-3">
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
                        Ya, Hapus
                    </button>
                </div> 
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Pastikan DOM sudah dimuat sebelum menjalankan JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk membuka modal (add/edit)
        function openModal(mode, id = null, nama = '', deskripsi = '', icon = '', aktif = true, urutan = 1) {
            const modal = document.getElementById('modalLayanan');
            const title = document.getElementById('modalTitle');
            const form = document.querySelector('#modalLayanan form');

            if (mode === 'add') {
                title.textContent = 'Tambah Layanan Baru';
                form.action = '{{ route("admin.layanan.store") }}';
                form.method = 'POST';
                // Reset form
                form.reset();
                // Set default values
                document.querySelector('input[name="nama_layanan"]').value = '';
                document.querySelector('textarea[name="deskripsi"]').value = '';
                document.querySelector('input[name="urutan"]').value = '1';
                document.querySelector('select[name="aktif"]').value = '1';
                selectedIcon = 'clipboard';
                updateIconPreview();
            } else if (mode === 'edit') {
                title.textContent = 'Edit Layanan';
                form.action = '{{ route("admin.layanan.update", ":id") }}'.replace(':id', id);
                form.method = 'POST';
                // Add method spoofing for PUT
                let methodInput = form.querySelector('input[name="_method"]');
                if (!methodInput) {
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    form.appendChild(methodInput);
                }
                methodInput.value = 'PUT';

                // Fill form with data
                document.querySelector('input[name="nama_layanan"]').value = nama;
                document.querySelector('textarea[name="deskripsi"]').value = deskripsi || '';
                document.querySelector('input[name="urutan"]').value = urutan;
                document.querySelector('select[name="aktif"]').value = aktif ? '1' : '0';
                selectedIcon = icon && icon.trim() !== '' ? icon : 'clipboard';
                updateIconPreview();
            }

            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        // Fungsi untuk mendapatkan SVG icon lengkap
        function getIconSVG(iconName) {
            const iconClasses = "w-6 h-6 text-green-700";
            let svgPath = '';

            switch (iconName) {
                case 'stethoscope':
                    svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>';
                    break;
                case 'microscope':
                    svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>';
                    break;
                case 'syringe':
                    svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c.195.195.291.45.291.707v2.586a1 1 0 01-1 1H4a1 1 0 01-1-1v-2.586c0-.257.096-.512.291-.707l5-5A2 2 0 008.586 10.172V5L8 4z"/>';
                    break;
                case 'user-group':
                    svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>';
                    break;
                case 'clock':
                    svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>';
                    break;
                case 'home':
                    svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>';
                    break;
                case 'plus-circle':
                    svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>';
                    break;
                default: // clipboard
                    svgPath = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>';
            }

            return `<svg class="${iconClasses}" fill="none" stroke="currentColor" viewBox="0 0 24 24">${svgPath}</svg>`;
        }

        // Fungsi untuk update icon preview
        function updateIconPreview() {
            const preview = document.getElementById('iconPreview');
            preview.outerHTML = getIconSVG(selectedIcon);
            // Re-assign the element reference after replacing outerHTML
            const newPreview = document.querySelector('#iconPreviewContainer svg');
            if (newPreview) {
                newPreview.id = 'iconPreview';
            }
        }

        // Fungsi untuk menutup modal layanan
        function closeModal() {
            document.getElementById('modalLayanan').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            // Reset form (opsional)
            document.querySelector('#modalLayanan form').reset();
        }

        // Fungsi untuk membuka modal konfirmasi hapus
        function confirmDelete(id, nama) {
            document.getElementById('deleteServiceName').textContent = nama;
            const form = document.getElementById('deleteForm');
            form.action = '{{ route("admin.layanan.destroy", ":id") }}'.replace(':id', id);
            document.getElementById('modalDelete').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        // Fungsi untuk menutup modal hapus
        function closeDeleteModal() {
            document.getElementById('modalDelete').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Fungsi placeholder untuk menghapus item
        function deleteItem() {
            document.getElementById('deleteForm').submit();
        }

        // Fungsi placeholder untuk toggle status (aktif/nonaktif)
        function toggleStatus() {
            alert('Status layanan akan diubah via backend nanti.');
        }

        // Auto-generate slug dari nama layanan
        document.querySelector('input[name="nama_layanan"]').addEventListener('input', function() {
            const nama = this.value;
            const slug = nama.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                .replace(/\s+/g, '-') // Replace spaces with hyphens
                .replace(/-+/g, '-') // Replace multiple hyphens with single hyphen
                .trim(); // Trim whitespace
            document.querySelector('input[name="slug"]').value = slug;
        });

        // Fitur pencarian sederhana (filter baris tabel berdasarkan input)
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            rows.forEach(row => {
                const serviceName = row.querySelector('td:nth-child(3) p:first-of-type').textContent.toLowerCase();
                const slug = row.querySelector('td:nth-child(3) p.text-xs').textContent.toLowerCase();
                if (serviceName.includes(searchTerm) || slug.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Tutup modal saat klik di luar konten modal (opsional tapi user-friendly)
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('modalLayanan');
            const deleteModal = document.getElementById('modalDelete');
            if (modal && !modal.classList.contains('hidden')) {
                const modalContent = modal.querySelector('.max-w-2xl');
                if (!modalContent.contains(e.target) && e.target === modal) {
                    closeModal();
                }
            }
            if (deleteModal && !deleteModal.classList.contains('hidden')) {
                const deleteModalContent = deleteModal.querySelector('.max-w-md');
                if (!deleteModalContent.contains(e.target) && e.target === deleteModal) {
                    closeDeleteModal();
                }
            }
        });

        // Tekan ESC untuk menutup modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!document.getElementById('modalLayanan').classList.contains('hidden')) {
                    closeModal();
                }
                if (!document.getElementById('modalDelete').classList.contains('hidden')) {
                    closeDeleteModal();
                }
            }
        });

        // Simpan ikon terpilih (untuk UI saja)
        let selectedIcon = 'clipboard'; // default

        function openIconModal() {
            document.getElementById('iconModal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeIconModal() {
            document.getElementById('iconModal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function selectIcon(iconName) {
            selectedIcon = iconName;
            // Update preview dengan SVG lengkap
            const preview = document.getElementById('iconPreview');
            preview.outerHTML = getIconSVG(selectedIcon);
            // Re-assign the element reference after replacing outerHTML
            const newPreview = document.querySelector('#iconPreviewContainer svg');
            if (newPreview) {
                newPreview.id = 'iconPreview';
            }
            // Simpan ke input tersembunyi
            document.getElementById('selectedIconInput').value = iconName;
            closeIconModal();
        }

        // Tutup modal saat klik di luar
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('iconModal');
            if (!modal.classList.contains('hidden')) {
                const content = modal.querySelector('.max-w-2xl');
                if (!content.contains(e.target) && e.target === modal) {
                    closeIconModal();
                }
            }
        });

        // ESC untuk tutup modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeIconModal();
            }
        });

        // Make functions globally available
        window.openModal = openModal;
        window.closeModal = closeModal;
        window.confirmDelete = confirmDelete;
        window.closeDeleteModal = closeDeleteModal;
        window.deleteItem = deleteItem;
        window.toggleStatus = toggleStatus;
        window.openIconModal = openIconModal;
        window.closeIconModal = closeIconModal;
        window.selectIcon = selectIcon;
    });
</script>