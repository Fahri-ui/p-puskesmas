@extends('layouts.admin.main')

@section('title', 'Kelola Blog - Puskesmas Binong')

@section('page-title', 'Kelola Blog')

@push('styles')
<style>
    .status-draft {
        background-color: #FEF3C7;
        color: #92400E;
    }
    .status-publish {
        background-color: #D1FAE5;
        color: #065F46;
    }
    .status-archived {
        background-color: #E5E7EB;
        color: #374151;
    }
</style>
@endpush

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div></div>
        <button id="btnTambahBlog" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Blog
        </button>
    </div>

    <div class="max-w-7xl mx-auto">

        <!-- Form Tambah/Edit Blog (Hidden by default) -->
        <div id="formSection" class="bg-white rounded-lg shadow-md p-6 mb-6" style="display: none;">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800" id="formTitle">Tambah Blog Baru</h3>
                </div>
                <button id="btnCloseForm" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="formBlog" class="space-y-6" method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <input type="hidden" id="blogId" name="blog_id" value="">

                <!-- Judul Blog -->
                <div>
                    <label for="judulBlog" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Blog <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="judulBlog"
                        name="judul"
                        placeholder="Masukkan judul blog"
                        value="{{ old('judul') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        required
                    >
                    @error('judul')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategoriBlog" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="kategoriBlog"
                        name="kategori_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        required
                    >
                        <option value="">Pilih Kategori</option>
                        @forelse($categories ?? collect() as $category)
                            <option value="{{ $category->id }}" @selected(old('kategori_id') == $category->id)>
                                {{ $category->nama_kategori }}
                            </option>
                        @empty
                        @endforelse
                    </select>
                    @error('kategori_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Isi Blog -->
                <div>
                    <label for="isiBlog" class="block text-sm font-medium text-gray-700 mb-2">
                        Isi Blog <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="isiBlog"
                        name="isi"
                        rows="10"
                        placeholder="Tulis konten blog di sini..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        required
                    >{{ old('isi') }}</textarea>
                    @error('isi')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar Blog -->
                <div>
                    <label for="gambarBlog" class="block text-sm font-medium text-gray-700 mb-2">
                        Gambar Blog <span class="text-gray-500">(Opsional)</span>
                    </label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-sm text-gray-600">Pilih Gambar</span>
                            <input type="file" id="gambarBlog" name="gambar" accept="image/*" class="hidden">
                        </label>
                        <span id="fileName" class="text-sm text-gray-500">Tidak ada file dipilih</span>
                    </div>
                    @error('gambar')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Status -->
                    <div>
                        <label for="statusBlog" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select
                            id="statusBlog"
                            name="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            required
                        >
                            <option value="draft" @selected(old('status') == 'draft')>Draft</option>
                            <option value="publish" @selected(old('status') == 'publish')>Publish</option>
                            <option value="archived" @selected(old('status') == 'archived')>Archived</option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Publish -->
                    <div>
                        <label for="tanggalPublish" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Publish <span class="text-gray-500">(Opsional)</span>
                        </label>
                        <input
                            type="datetime-local"
                            id="tanggalPublish"
                            name="tanggal_publish"
                            value="{{ old('tanggal_publish') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                        @error('tanggal_publish')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex space-x-3 pt-4 border-t">
                    <button
                        type="submit"
                        id="submitBtn"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 transition-colors flex items-center"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span id="submitBtnText">Simpan Blog</span>
                    </button>
                    <button
                        type="button"
                        id="btnBatalForm"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-300 transition-colors"
                    >
                        Batal
                    </button>
                </div>
            </form>
        </div>

        <!-- Daftar Blog (Cards) -->
        <div id="listSection">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Daftar Blog</h3>
                    <p class="text-sm text-gray-600 mt-1">Total: <span class="font-semibold">{{ isset($blogs) ? $blogs->count() : 0 }} artikel</span></p>
                </div>
                <!-- Filter/Search (Optional) -->
                <div class="flex space-x-3">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                        <option value="">Semua Status</option>
                        <option value="draft">Draft</option>
                        <option value="publish">Publish</option>
                        <option value="archived">Archived</option>
                    </select>
                    <input
                        type="text"
                        placeholder="Cari blog..."
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                    >
                </div>
            </div>

            <!-- Blog Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($blogs ?? collect() as $blog)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        @if($blog->gambar && file_exists(public_path($blog->gambar)))
                            <img src="{{ asset($blog->gambar) }}" alt="{{ $blog->judul }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                                <span class="text-gray-500">Tidak ada gambar</span>
                            </div>
                        @endif
                        <span class="absolute top-3 right-3 px-3 py-1 text-xs font-semibold rounded-full status-{{ $blog->status }}">
                            {{ ucfirst($blog->status) }}
                        </span>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center text-xs text-gray-500 mb-2">
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded">{{ $blog->category?->nama_kategori ?? 'N/A' }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ optional($blog->created_at)->format('j M Y') }}</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">{{ $blog->judul }}</h4>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $blog->isi }}</p>
                        <div class="flex items-center justify-between pt-4 border-t">
                            <button type="button" class="editBlogBtn text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center" data-id="{{ $blog->id }}" data-judul="{{ $blog->judul }}" data-kategori="{{ $blog->kategori_id }}" data-isi="{{ $blog->isi }}" data-status="{{ $blog->status }}" data-gambar="{{ $blog->gambar }}" data-tanggal-publish="{{ $blog->tanggal_publish }}">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </button>
                            <form method="POST" action="{{ route('admin.blog.destroy', $blog->id) }}" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus blog ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">Belum ada blog. Mulai dengan menambahkan blog baru.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Toggle Form Section
    const btnTambahBlog = document.getElementById('btnTambahBlog');
    const btnCloseForm = document.getElementById('btnCloseForm');
    const btnBatalForm = document.getElementById('btnBatalForm');
    const formSection = document.getElementById('formSection');
    const listSection = document.getElementById('listSection');
    const formBlog = document.getElementById('formBlog');
    const formMethod = document.getElementById('formMethod');
    const blogId = document.getElementById('blogId');
    const submitBtn = document.getElementById('submitBtn');
    const submitBtnText = document.getElementById('submitBtnText');

    // Show form for tambah
    if (btnTambahBlog) {
        btnTambahBlog.addEventListener('click', function() {
            formSection.style.display = 'block';
            listSection.style.display = 'none';
            document.getElementById('formTitle').textContent = 'Tambah Blog Baru';
            formBlog.reset();
            formMethod.value = 'POST';
            blogId.value = '';
            formBlog.action = "{{ route('admin.blog.store') }}";
            submitBtnText.textContent = 'Simpan Blog';
        });
    }

    // Close form
    if (btnCloseForm) {
        btnCloseForm.addEventListener('click', function() {
            formSection.style.display = 'none';
            listSection.style.display = 'block';
        });
    }

    if (btnBatalForm) {
        btnBatalForm.addEventListener('click', function() {
            formSection.style.display = 'none';
            listSection.style.display = 'block';
        });
    }

    // Edit blog
    document.querySelectorAll('.editBlogBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            const judul = this.dataset.judul;
            const kategori = this.dataset.kategori;
            const isi = this.dataset.isi;
            const status = this.dataset.status;
            const tanggalPublish = this.dataset.tanggalPublish;

            document.getElementById('judulBlog').value = judul;
            document.getElementById('kategoriBlog').value = kategori;
            document.getElementById('isiBlog').value = isi;
            document.getElementById('statusBlog').value = status;
            if (tanggalPublish) {
                document.getElementById('tanggalPublish').value = tanggalPublish.substring(0, 16);
            }

            formSection.style.display = 'block';
            listSection.style.display = 'none';
            document.getElementById('formTitle').textContent = 'Edit Blog';
            formMethod.value = 'PUT';
            blogId.value = id;
            formBlog.action = "/admin/blog/" + id;
            submitBtnText.textContent = 'Perbarui Blog';
        });
    });

    // File input display name
    const gambarBlogInput = document.getElementById('gambarBlog');
    if (gambarBlogInput) {
        gambarBlogInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Tidak ada file dipilih';
            document.getElementById('fileName').textContent = fileName;
        });
    }
</script>
@endpush