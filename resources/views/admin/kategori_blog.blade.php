@extends('layouts.admin.main')

@section('title', 'Kelola Kategori Blog - Puskesmas Binong')
@section('page-title', 'Kategori Berita')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Form Create Kategori -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <h3 class="text-xl font-semibold text-gray-800">Tambah Kategori Baru</h3>
        </div>

        <form id="formKategori" class="space-y-4" method="POST" action="{{ route('admin.kategori_blog.store') }}">
            @csrf
            <input type="hidden" id="formMethod" name="_method" value="POST">
            <input type="hidden" id="kategoriId" name="kategori_id" value="">
            <div>
                <label for="namaKategori" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Kategori <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="namaKategori"
                    name="nama_kategori"
                    placeholder="Masukkan nama kategori"
                    value="{{ old('nama_kategori') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required>
                @error('nama_kategori')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-3">
                <button
                    type="submit"
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan
                </button>
                <button
                    type="button"
                    id="cancelEdit"
                    class="hidden"
                    class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-300 transition-colors">
                    Reset
                </button>
            </div>
        </form>
    </div>

    <!-- Tabel Data Kategori -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Data Kategori Berita</h3>
            </div>
            <div class="text-sm text-gray-600">
                Total: <span class="font-semibold">{{ isset($categories) ? $categories->count() : 0 }} kategori</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Kategori
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Dibuat
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($categories ?? collect() as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->nama_kategori }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ optional($category->created_at)->format('j M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                            <button type="button" class="editBtn text-blue-600 hover:text-blue-800 mr-3 inline-flex items-center" data-id="{{ $category->id }}" data-nama="{{ $category->nama_kategori }}">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </button>

                            <form method="POST" action="{{ route('admin.kategori_blog.destroy', $category->id) }}" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-sm text-gray-500 text-center">Belum ada kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    (function(){
        const baseUrl = "{{ url('/admin/kategori-blog') }}";
        const form = document.getElementById('formKategori');
        const namaInput = document.getElementById('namaKategori');
        const methodInput = document.getElementById('formMethod');
        const kategoriIdInput = document.getElementById('kategoriId');
        const cancelBtn = document.getElementById('cancelEdit');

        document.querySelectorAll('.editBtn').forEach(btn => {
            btn.addEventListener('click', function(){
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                form.action = baseUrl + '/' + id;
                methodInput.value = 'PUT';
                kategoriIdInput.value = id;
                namaInput.value = nama;
                cancelBtn.classList.remove('hidden');
                cancelBtn.textContent = 'Batal';
                form.querySelector('button[type=submit]').innerHTML = 'Perbarui';
            });
        });

        cancelBtn.addEventListener('click', function(){
            form.action = "{{ route('admin.kategori_blog.store') }}";
            methodInput.value = 'POST';
            kategoriIdInput.value = '';
            namaInput.value = '';
            cancelBtn.classList.add('hidden');
            form.querySelector('button[type=submit]').innerHTML = '<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Simpan';
        });
    })();
</script>
@endsection