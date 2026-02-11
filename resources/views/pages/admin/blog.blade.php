<x-admin.app-layout :title="'Kelola Berita - Puskesmas Binong'" :pageTitle="'Kelola Berita'">

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

                <!-- Title -->
                <div>
                    <label for="titleBlog" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Blog <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="titleBlog"
                        name="title"
                        placeholder="Masukkan judul blog"
                        value="{{ old('title') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        required>
                    @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="categoryBlog" class="block text-sm font-medium text-gray-700 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="categoryBlog"
                        name="category_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        required>
                        <option value="">Pilih Kategori</option>
                        @forelse($categories ?? collect() as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>
                            {{ $category->nama_kategori }}
                        </option>
                        @empty
                        @endforelse
                    </select>
                    @error('category_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Excerpt (Ringkasan) -->
                <div>
                    <label for="excerptBlog" class="block text-sm font-medium text-gray-700 mb-2">
                        Ringkasan <span class="text-gray-500">(Opsional)</span>
                    </label>
                    <textarea
                        id="excerptBlog"
                        name="excerpt"
                        rows="3"
                        placeholder="Tulis ringkasan artikel (maksimal 500 karakter)..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        maxlength="500">{{ old('excerpt') }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Maksimal 500 karakter. Akan ditampilkan di halaman daftar blog.</p>
                    @error('excerpt')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="contentBlog" class="block text-sm font-medium text-gray-700 mb-2">
                        Konten Blog <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="contentBlog"
                        name="content"
                        rows="12"
                        placeholder="Tulis konten blog di sini..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        required>{{ old('content') }}</textarea>
                    @error('content')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload Images Section -->
                <div class="border-t pt-6">
                    <h4 class="text-sm font-semibold text-gray-700 mb-4">Upload Gambar</h4>

                    <!-- Featured Image -->
                    <div class="mb-6">
                        <label for="imageBlog" class="block text-sm font-medium text-gray-700 mb-2">
                            Gambar Utama (Featured Image) <span class="text-gray-500">(Opsional)</span>
                        </label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Pilih Gambar</span>
                                <input type="file" id="imageBlog" name="image" accept="image/*" class="hidden">
                            </label>
                            <span id="imageFileName" class="text-sm text-gray-500">Tidak ada file dipilih</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Gambar utama yang akan ditampilkan di detail artikel.</p>
                        @error('image')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Thumbnail -->
                    <div class="mb-6">
                        <label for="thumbnailBlog" class="block text-sm font-medium text-gray-700 mb-2">
                            Thumbnail <span class="text-gray-500">(Opsional)</span>
                        </label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Pilih Thumbnail</span>
                                <input type="file" id="thumbnailBlog" name="thumbnail" accept="image/*" class="hidden">
                            </label>
                            <span id="thumbnailFileName" class="text-sm text-gray-500">Tidak ada file dipilih</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Gambar kecil yang akan ditampilkan di halaman daftar blog.</p>
                        @error('thumbnail')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
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
                            required>
                            <option value="draft" @selected(old('status')=='draft' )>Draft</option>
                            <option value="publish" @selected(old('status')=='publish' )>Publish</option>
                            <option value="archived" @selected(old('status')=='archived' )>Archived</option>
                        </select>
                        @error('status')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Published At -->
                    <div>
                        <label for="publishedAt" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Publish <span class="text-gray-500">(Opsional)</span>
                        </label>
                        <input
                            type="datetime-local"
                            id="publishedAt"
                            name="published_at"
                            value="{{ old('published_at') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        @error('published_at')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex space-x-3 pt-4 border-t">
                    <button
                        type="submit"
                        id="submitBtn"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 transition-colors flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span id="submitBtnText">Simpan Blog</span>
                    </button>
                    <button
                        type="button"
                        id="btnBatalForm"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-300 transition-colors">
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
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500">
                </div>
            </div>

            <!-- Blog Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($blogs ?? collect() as $blog)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        @php
                        $image = $blog->thumbnail ?? $blog->image ?? $blog->gambar;
                        @endphp
                        @if($image && file_exists(public_path($image)))
                        <img src="{{ asset($image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
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
                            <span>{{ optional($blog->published_at ?? $blog->created_at)->format('j M Y') }}</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">{{ $blog->title }}</h4>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 100) }}</p>
                        <div class="flex items-center justify-between pt-4 border-t">
                            <button type="button" class="editBlogBtn text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center"
                                data-id="{{ $blog->id }}"
                                data-title="{{ $blog->title }}"
                                data-category="{{ $blog->category_id }}"
                                data-content="{{ $blog->content }}"
                                data-excerpt="{{ $blog->excerpt ?? '' }}"
                                data-status="{{ $blog->status }}"
                                data-published-at="{{ $blog->published_at }}"
                                data-gambar="{{ $blog->gambar }}"
                                data-thumbnail="{{ $blog->thumbnail }}"
                                data-image="{{ $blog->image }}">
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

                // Reset file name displays
                document.getElementById('imageFileName').textContent = 'Tidak ada file dipilih';
                document.getElementById('thumbnailFileName').textContent = 'Tidak ada file dipilih';
                document.getElementById('fileName').textContent = 'Tidak ada file dipilih';
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
                const title = this.dataset.title;
                const category = this.dataset.category;
                const content = this.dataset.content;
                const excerpt = this.dataset.excerpt;
                const status = this.dataset.status;
                const publishedAt = this.dataset.publishedAt;

                document.getElementById('titleBlog').value = title;
                document.getElementById('categoryBlog').value = category;
                document.getElementById('contentBlog').value = content;
                document.getElementById('excerptBlog').value = excerpt;
                document.getElementById('statusBlog').value = status;

                if (publishedAt) {
                    // Format datetime untuk input datetime-local (YYYY-MM-DDTHH:mm)
                    const date = new Date(publishedAt);
                    const formattedDate = date.toISOString().slice(0, 16);
                    document.getElementById('publishedAt').value = formattedDate;
                } else {
                    document.getElementById('publishedAt').value = '';
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

        // File input display name - Featured Image
        const imageBlogInput = document.getElementById('imageBlog');
        if (imageBlogInput) {
            imageBlogInput.addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : 'Tidak ada file dipilih';
                document.getElementById('imageFileName').textContent = fileName;
            });
        }

        // File input display name - Thumbnail
        const thumbnailBlogInput = document.getElementById('thumbnailBlog');
        if (thumbnailBlogInput) {
            thumbnailBlogInput.addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : 'Tidak ada file dipilih';
                document.getElementById('thumbnailFileName').textContent = fileName;
            });
        }

        // File input display name - Gambar Lama
        const gambarBlogInput = document.getElementById('gambarBlog');
        if (gambarBlogInput) {
            gambarBlogInput.addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : 'Tidak ada file dipilih';
                document.getElementById('fileName').textContent = fileName;
            });
        }
    </script>

</x-admin.app-layout>