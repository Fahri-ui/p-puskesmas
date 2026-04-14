<x-admin.app-layout>

    <!-- Page Body -->
    <div class="p-4 sm:p-6 lg:p-8 space-y-6 lg:space-y-8 max-w-7xl mx-auto w-full">

        {{-- ===================== FLASH MESSAGES ===================== --}}
        @if (session('success'))
            <div
                class="px-4 py-3 bg-green-100 text-green-800 rounded-lg border border-green-200 flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">check_circle</span>
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="px-4 py-3 bg-red-100 text-red-800 rounded-lg border border-red-200 flex items-center gap-2">
                <span class="material-symbols-outlined text-[18px]">error</span>
                {{ session('error') }}
            </div>
        @endif

        {{-- ===================== PAGE HEADER ===================== --}}
        <div class="flex items-end justify-between">
            <div>
                <h1 class="text-3xl font-black text-heading dark:text-slate-100 tracking-tight">Manajemen Berita</h1>
                <p class="text-slate-500 mt-1">Kelola publikasi, sunting konten, dan unggah media berita.</p>
            </div>
            <button onclick="showCreateForm()"
                class="bg-primary text-white px-6 py-2.5 rounded-lg font-bold text-sm flex items-center gap-2 hover:bg-primary/90 shadow-sm transition-all active:scale-95">
                <span class="material-symbols-outlined">add</span>
                Buat Berita Baru
            </button>
        </div>

        {{-- ===================== TABS ===================== --}}
        {{-- Hanya 2 status sesuai model: draft & publish --}}
        <div class="border-b border-slate-200 dark:border-slate-800">
            <nav class="flex gap-8 overflow-x-auto whitespace-nowrap scrollbar-hide">
                <a href="{{ route('admin.blog') }}"
                    class="{{ !request('status') ? 'border-b-2 border-primary text-primary font-bold' : 'border-b-2 border-transparent text-slate-500 hover:text-slate-700 font-medium' }} py-3 px-1 text-sm">
                    Semua Berita
                </a>
                <a href="{{ route('admin.blog', ['status' => 'published']) }}"
                    class="{{ request('status') === 'published' ? 'border-b-2 border-primary text-primary font-bold' : 'border-b-2 border-transparent text-slate-500 hover:text-slate-700 font-medium' }} py-3 px-1 text-sm">
                    Publik
                </a>
                <a href="{{ route('admin.blog', ['status' => 'draft']) }}"
                    class="{{ request('status') === 'draft' ? 'border-b-2 border-primary text-primary font-bold' : 'border-b-2 border-transparent text-slate-500 hover:text-slate-700 font-medium' }} py-3 px-1 text-sm">
                    Draf
                </a>
            </nav>
        </div>
    </div>

    {{-- ===================== CATEGORY MANAGEMENT ===================== --}}
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">

        {{-- Form Tambah Kategori --}}
        <div class="xl:col-span-4">
            <div
                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-heading dark:text-slate-100 mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">add</span>
                    Tambah Kategori Baru
                </h3>
                <form class="space-y-4" action="{{ route('admin.kategori_blog.store') }}" method="POST">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Nama Kategori</label>
                        <input
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none @error('nama_kategori') border-red-400 @enderror"
                            placeholder="Masukkan nama kategori..." type="text" name="nama_kategori"
                            value="{{ old('nama_kategori') }}" required />
                        @error('nama_kategori')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full bg-primary text-white px-6 py-2.5 rounded-lg font-bold text-sm hover:bg-primary/90 shadow-sm transition-all active:scale-95">
                        Tambah Kategori
                    </button>
                </form>
            </div>
        </div>

        {{-- Daftar Kategori --}}
        <div class="xl:col-span-8">
            <div
                class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-heading dark:text-slate-100 mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">category</span>
                    Daftar Kategori
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($categories as $category)
                        <div
                            class="bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-sm font-semibold text-heading dark:text-slate-200">
                                    {{ $category->nama_kategori }}
                                </h4>
                                <div class="flex gap-1">
                                    <button type="button" onclick="toggleEditForm({{ $category->id }})"
                                        class="p-1 text-slate-400 hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-[16px]">edit</span>
                                    </button>
                                    <form action="{{ route('admin.kategori_blog.destroy', $category->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-1 text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[16px]">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500">{{ $category->blogs_count }} berita</p>

                            {{-- Hidden edit form --}}
                            <form id="edit-form-{{ $category->id }}" class="mt-2 hidden"
                                action="{{ route('admin.kategori_blog.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-2">
                                    <input type="text" name="nama_kategori" value="{{ $category->nama_kategori }}"
                                        required
                                        class="w-full px-3 py-2 rounded border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-800 text-sm" />
                                    <button type="submit"
                                        class="px-3 bg-green-500 text-white rounded text-sm">Save</button>
                                    <button type="button" onclick="toggleEditForm({{ $category->id }})"
                                        class="px-3 bg-gray-300 text-gray-700 rounded text-sm">X</button>
                                </div>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-slate-500 col-span-3">Belum ada kategori.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== BLOG TABLE ===================== --}}
    <div
        class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Judul Berita
                        </th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal Rilis
                        </th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($blogs as $blog)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">

                            {{-- Judul — thumbnail dihapus, hanya gunakan field 'image' sesuai model --}}
                            <td class="px-6 py-4 whitespace-normal min-w-[300px]">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="size-10 rounded bg-slate-200 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                        @if ($blog->image)
                                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                                                class="w-full h-full object-cover" />
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <span
                                                    class="material-symbols-outlined text-slate-400 text-[18px]">image</span>
                                            </div>
                                        @endif
                                    </div>
                                    <span class="text-sm font-semibold text-heading dark:text-slate-200 line-clamp-2">
                                        {{ $blog->title }}
                                    </span>
                                </div>
                            </td>

                            {{-- Kategori --}}
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-medium rounded-full">
                                    {{ $blog->category?->nama_kategori ?? '-' }}
                                </span>
                            </td>

                            {{-- Status — hanya draft & publish sesuai model --}}
                            <td class="px-6 py-4">
                                @if ($blog->status === 'published')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                        <span class="size-1.5 rounded-full bg-green-600"></span>Published
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400">
                                        <span class="size-1.5 rounded-full bg-yellow-600"></span>Draft
                                    </span>
                                @endif
                            </td>

                            {{-- Tanggal — null jika masih draft --}}
                            <td class="px-6 py-4 text-sm text-slate-500">
                                {{ $blog->published_at ? $blog->published_at->format('d M Y, H:i') : '-' }}
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 text-right space-x-1">
                                <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                    class="inline-flex p-2 text-slate-400 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">edit</span>
                                </a>
                                <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                <span class="material-symbols-outlined text-[40px] mb-2 block">article</span>
                                Belum ada berita. Klik "Buat Berita Baru" untuk memulai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
            <span class="text-xs text-slate-500">Menampilkan {{ $blogs->count() }} berita</span>
        </div>
    </div>

    {{-- ===================== CREATE FORM (hidden by default) ===================== --}}
    <div id="create-form-section" class="hidden">
        <div
            class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-4 sm:p-8 shadow-sm">
            <div
                class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-4 border-b border-slate-100 dark:border-slate-800">
                <h3 class="text-xl font-bold text-heading dark:text-slate-100 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">edit_note</span>
                    Buat Berita Baru
                </h3>
                <button type="button" onclick="hideCreateForm()"
                    class="px-6 py-2 border border-slate-300 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-lg text-sm font-bold hover:bg-slate-50 transition-colors">
                    Batal
                </button>
            </div>

            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @csrf

                {{-- Main Content --}}
                <div class="lg:col-span-2 space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Judul Berita <span
                                class="text-red-500">*</span></label>
                        <input
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none @error('title') border-red-400 @enderror"
                            placeholder="Masukkan judul yang menarik..." type="text" name="title"
                            value="{{ old('title') }}" />
                        @error('title')
                            <p class="text-red-600 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Excerpt / Ringkasan</label>
                        <textarea
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none resize-none h-20"
                            placeholder="Ringkasan singkat berita (opsional, maks 500 karakter)..." name="excerpt" maxlength="500">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="text-red-600 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Konten Berita <span
                                class="text-red-500">*</span></label>
                        <textarea
                            class="w-full px-4 py-3 h-80 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-900 text-sm focus:ring-1 focus:ring-primary outline-none resize-none @error('content') border-red-400 @enderror"
                            placeholder="Mulai menulis berita di sini..." name="content">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-600 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Side Options --}}
                <div
                    class="space-y-6 bg-slate-50 dark:bg-slate-800/50 p-6 rounded-xl border border-slate-200 dark:border-slate-700">
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Kategori <span
                                    class="text-red-500">*</span></label>
                            <select name="category_id"
                                class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none @error('category_id') border-red-400 @enderror">
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Status Publikasi <span
                                    class="text-red-500">*</span></label>
                            <select name="status"
                                class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none">
                                <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
                                    Draft</option>
                                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>
                                    Published</option>
                            </select>
                            @error('status')
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2" id="published-at-wrapper-create">
                            <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Tanggal
                                Publikasi</label>
                            <input
                                class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none"
                                type="datetime-local" name="published_at" value="{{ old('published_at') }}" />
                            <p class="text-xs text-slate-400">Kosongkan untuk menggunakan waktu saat ini.</p>
                            @error('published_at')
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Hanya field 'image' sesuai model --}}
                    <div class="space-y-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Gambar Berita</label>
                            <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/gif"
                                class="w-full text-sm text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-primary file:text-white file:text-xs file:font-bold hover:file:bg-primary/90 cursor-pointer" />
                            @error('image')
                                <p class="text-red-600 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-primary text-white px-6 py-2.5 rounded-lg font-bold text-sm hover:bg-primary/90 shadow-sm transition-all active:scale-95">
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>

    </div>

    {{-- ===================== JAVASCRIPT ===================== --}}
    <script>
        function toggleEditForm(id) {
            const form = document.getElementById('edit-form-' + id);
            if (form) form.classList.toggle('hidden');
        }

        function showCreateForm() {
            const section = document.getElementById('create-form-section');
            section.classList.remove('hidden');
            section.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function hideCreateForm() {
            const section = document.getElementById('create-form-section');
            section.classList.add('hidden');
        }

        @if ($errors->any() && old('title'))
            document.addEventListener('DOMContentLoaded', function() {
                showCreateForm();
            });
        @endif
    </script>

</x-admin.app-layout>
