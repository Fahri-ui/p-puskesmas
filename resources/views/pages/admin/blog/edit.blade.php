<x-admin.app-layout>
    <div class="p-4 sm:p-6 lg:p-8 space-y-6 lg:space-y-8 max-w-7xl mx-auto w-full">
        <div class="flex items-end justify-between">
            <div>
                <h1 class="text-3xl font-black text-heading dark:text-slate-100 tracking-tight">Edit Berita
                </h1>
                <p class="text-slate-500 mt-1">Perbarui konten berita yang sudah ada.</p>
            </div>
            <a href="{{ route('admin.blog') }}"
                class="bg-gray-200 text-gray-800 px-6 py-2.5 rounded-lg font-bold text-sm flex items-center gap-2 hover:bg-gray-300 shadow-sm transition-all active:scale-95">
                <span class="material-symbols-outlined">arrow_back</span>
                Kembali
            </a>
        </div>

        @if(session('success'))
            <div class="px-4 py-2 mb-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="px-4 py-2 mb-4 bg-red-100 text-red-800 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-bold text-heading dark:text-slate-100 mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">edit</span>
                Formulir Edit Berita
            </h3>
            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Judul</label>
                    <input
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none"
                        placeholder="Masukkan judul berita..." type="text" name="title" value="{{ old('title', $blog->title) }}" required />
                    @error('title')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Kategori</label>
                    <select name="category_id" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none">
                        <option value="">-- Pilih kategori --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $blog->category_id)==$cat->id ? 'selected' : '' }}>{{ $cat->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Status</label>
                    <select name="status" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none">
                        <option value="draft" {{ old('status', $blog->status)=='draft' ? 'selected' : '' }}>Draft</option>
                        <option value="publish" {{ old('status', $blog->status)=='publish' ? 'selected' : '' }}>Publish</option>
                        <option value="archived" {{ old('status', $blog->status)=='archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                    @error('status')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Isi</label>
                    <textarea name="content" rows="5" required
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none">{{ old('content', $blog->content) }}</textarea>
                    @error('content')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Excerpt (opsional)</label>
                    <textarea name="excerpt" rows="2"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none">{{ old('excerpt', $blog->excerpt) }}</textarea>
                    @error('excerpt')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Tanggal Rilis (jika publish)</label>
                    <input type="datetime-local" name="published_at"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none"
                        value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}" />
                    @error('published_at')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-primary text-white px-6 py-2.5 rounded-lg font-bold text-sm hover:bg-primary/90 shadow-sm transition-all active:scale-95">
                    Perbarui Berita
                </button>
            </form>
        </div>
    </div>
</x-admin.app-layout>
