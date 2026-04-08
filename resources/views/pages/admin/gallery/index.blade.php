<x-admin.app-layout>
    <div class="p-8">

        {{-- Flash Message --}}
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                class="mb-6 flex items-center gap-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg text-sm font-medium">
                <span class="material-symbols-outlined text-base">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Daftar Galeri</h3>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Kelola konten visual dan dokumentasi kegiatan organisasi</p>
            </div>
            {{-- Tombol buka modal Create --}}
            <button onclick="openModal('modalCreate')"
                class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-lg font-semibold text-sm transition-all shadow-md shadow-primary/20">
                <span class="material-symbols-outlined">add_circle</span>
                Add New Image
            </button>
        </div>

        {{-- Table --}}
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-16">NO</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-32">IMAGE</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider w-1/4">TITLE</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">DESCRIPTION</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider text-right w-32">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse ($galleries as $index => $gallery)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $galleries->firstItem() + $index }}</td>

                                {{-- Image --}}
                                <td class="px-6 py-4">
                                    <div class="w-20 h-14 rounded-lg bg-slate-100 overflow-hidden">
                                        <img class="w-full h-full object-cover"
                                            src="{{ asset('storage/' . $gallery->image) }}"
                                            alt="{{ $gallery->title }}" />
                                    </div>
                                </td>

                                {{-- Title --}}
                                <td class="px-6 py-4">
                                    <p class="text-sm font-semibold text-slate-900 dark:text-white">{{ $gallery->title }}</p>
                                    <p class="text-xs text-slate-400 mt-1">Uploaded: {{ $gallery->created_at->format('d M Y') }}</p>
                                </td>

                                {{-- Description --}}
                                <td class="px-6 py-4">
                                    <p class="text-sm text-slate-600 dark:text-slate-400 line-clamp-2">{{ $gallery->description }}</p>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        {{-- Edit button - FIXED: json_encode instead of addslashes --}}
                                        <button
                                            onclick="openEditModal(
                                                {{ $gallery->id }},
                                                {{ json_encode($gallery->title) }},
                                                {{ json_encode($gallery->description) }},
                                                {{ json_encode(asset('storage/' . $gallery->image)) }}
                                            )"
                                            class="p-1.5 text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-colors"
                                            title="Edit">
                                            <span class="material-symbols-outlined text-xl">edit</span>
                                        </button>

                                        {{-- Delete button - FIXED: json_encode instead of addslashes --}}
                                        <button
                                            onclick="openDeleteModal({{ $gallery->id }}, {{ json_encode($gallery->title) }})"
                                            class="p-1.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors"
                                            title="Delete">
                                            <span class="material-symbols-outlined text-xl">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center text-slate-400 dark:text-slate-600">
                                    <span class="material-symbols-outlined text-4xl block mb-2">image_not_supported</span>
                                    Belum ada data galeri.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($galleries->hasPages())
                <div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/30 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
                    <p class="text-xs text-slate-500 font-medium">
                        Showing {{ $galleries->firstItem() }} to {{ $galleries->lastItem() }} of {{ $galleries->total() }} entries
                    </p>
                    <div class="flex gap-1">
                        {{-- Prev --}}
                        <a href="{{ $galleries->previousPageUrl() }}"
                            class="size-8 flex items-center justify-center rounded border border-slate-200 dark:border-slate-700 text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors {{ $galleries->onFirstPage() ? 'pointer-events-none opacity-40' : '' }}">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </a>

                        {{-- Pages --}}
                        @foreach ($galleries->getUrlRange(1, $galleries->lastPage()) as $page => $url)
                            <a href="{{ $url }}"
                                class="size-8 flex items-center justify-center rounded border font-medium text-xs transition-colors
                                {{ $page == $galleries->currentPage()
                                    ? 'border-primary bg-primary text-white shadow-sm shadow-primary/20'
                                    : 'border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:bg-white dark:hover:bg-slate-800' }}">
                                {{ $page }}
                            </a>
                        @endforeach

                        {{-- Next --}}
                        <a href="{{ $galleries->nextPageUrl() }}"
                            class="size-8 flex items-center justify-center rounded border border-slate-200 dark:border-slate-700 text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors {{ !$galleries->hasMorePages() ? 'pointer-events-none opacity-40' : '' }}">
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>


    {{-- ===================== MODAL CREATE ===================== --}}
    <div id="modalCreate" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('modalCreate')"></div>

        <div class="relative bg-white dark:bg-slate-900 rounded-2xl shadow-2xl w-full max-w-lg">
            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200 dark:border-slate-800">
                <h4 class="text-lg font-bold text-slate-900 dark:text-white">Tambah Gambar Baru</h4>
                <button onclick="closeModal('modalCreate')" class="p-1 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            {{-- Form --}}
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
                @csrf

                {{-- Preview --}}
                <div class="w-full h-48 rounded-xl bg-slate-100 dark:bg-slate-800 overflow-hidden border-2 border-dashed border-slate-300 dark:border-slate-700 flex items-center justify-center cursor-pointer"
                    onclick="document.getElementById('createImageInput').click()">
                    <img id="createPreview" src="" alt="" class="w-full h-full object-cover hidden" />
                    <div id="createPlaceholder" class="text-center text-slate-400">
                        <span class="material-symbols-outlined text-4xl block mb-1">add_photo_alternate</span>
                        <span class="text-sm">Klik untuk pilih gambar</span>
                    </div>
                </div>

                <input id="createImageInput" type="file" name="image" accept="image/*" class="hidden"
                    onchange="previewImage(event, 'createPreview', 'createPlaceholder')" />

                @error('image')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror

                {{-- Title --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Judul</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul gambar..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition" />
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Deskripsi</label>
                    <textarea name="description" rows="3" placeholder="Masukkan deskripsi..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition resize-none">{{ old('description') }}</textarea>
                </div>

                {{-- Footer --}}
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModal('modalCreate')"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-primary hover:bg-primary/90 text-white text-sm font-semibold transition shadow-md shadow-primary/20">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>


    {{-- ===================== MODAL EDIT ===================== --}}
    <div id="modalEdit" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('modalEdit')"></div>

        <div class="relative bg-white dark:bg-slate-900 rounded-2xl shadow-2xl w-full max-w-lg">
            <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200 dark:border-slate-800">
                <h4 class="text-lg font-bold text-slate-900 dark:text-white">Edit Gambar</h4>
                <button onclick="closeModal('modalEdit')" class="p-1 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="editForm" action="" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
                @csrf
                @method('PUT')

                {{-- Preview --}}
                <div class="w-full h-48 rounded-xl bg-slate-100 dark:bg-slate-800 overflow-hidden border-2 border-dashed border-slate-300 dark:border-slate-700 flex items-center justify-center cursor-pointer"
                    onclick="document.getElementById('editImageInput').click()">
                    <img id="editPreview" src="" alt="" class="w-full h-full object-cover" />
                </div>

                <input id="editImageInput" type="file" name="image" accept="image/*" class="hidden"
                    onchange="previewImage(event, 'editPreview', null)" />

                {{-- Title --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Judul</label>
                    <input id="editTitle" type="text" name="title" placeholder="Masukkan judul gambar..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition" />
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Deskripsi</label>
                    <textarea id="editDescription" name="description" rows="3"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition resize-none"></textarea>
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModal('modalEdit')"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-primary hover:bg-primary/90 text-white text-sm font-semibold transition shadow-md shadow-primary/20">
                        Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>


    {{-- ===================== MODAL DELETE ===================== --}}
    <div id="modalDelete" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('modalDelete')"></div>

        <div class="relative bg-white dark:bg-slate-900 rounded-2xl shadow-2xl w-full max-w-sm">
            <div class="p-6 text-center">
                <div class="w-14 h-14 rounded-full bg-red-100 dark:bg-red-900/20 flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-red-600 text-3xl">delete_forever</span>
                </div>
                <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Hapus Gambar?</h4>
                <p class="text-sm text-slate-500 dark:text-slate-400">
                    Anda akan menghapus <strong id="deleteTitle" class="text-slate-700 dark:text-slate-200"></strong>.
                    Tindakan ini tidak dapat dibatalkan.
                </p>

                <form id="deleteForm" action="" method="POST" class="mt-6 flex gap-3 justify-center">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="closeModal('modalDelete')"
                        class="flex-1 px-4 py-2.5 rounded-lg border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 px-4 py-2.5 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm font-semibold transition">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>


    {{-- ===================== SCRIPTS ===================== --}}
    <script>
        // --- Modal helpers ---
        function openModal(id) {
            const el = document.getElementById(id);
            if (el) {
                el.classList.remove('hidden');
                el.classList.add('flex');
            }
        }

        function closeModal(id) {
            const el = document.getElementById(id);
            if (el) {
                el.classList.add('hidden');
                el.classList.remove('flex');
            }
        }

        // --- Preview gambar ---
        function previewImage(event, previewId, placeholderId) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById(previewId);
                if (preview) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }

                if (placeholderId) {
                    const placeholder = document.getElementById(placeholderId);
                    if (placeholder) {
                        placeholder.classList.add('hidden');
                    }
                }
            };
            reader.readAsDataURL(file);
        }

        // --- Buka modal edit & isi data ---
        function openEditModal(id, title, description, imageUrl) {
            const editForm = document.getElementById('editForm');
            const editTitle = document.getElementById('editTitle');
            const editDescription = document.getElementById('editDescription');
            const editPreview = document.getElementById('editPreview');

            if (editForm) editForm.action = `/admin/gallery/${id}`;
            if (editTitle) editTitle.value = title || '';
            if (editDescription) editDescription.value = description || '';
            if (editPreview) editPreview.src = imageUrl || '';

            openModal('modalEdit');
        }

        // --- Buka modal delete ---
        function openDeleteModal(id, title) {
            const deleteForm = document.getElementById('deleteForm');
            const deleteTitle = document.getElementById('deleteTitle');

            if (deleteForm) deleteForm.action = `/admin/gallery/${id}`;
            if (deleteTitle) deleteTitle.textContent = title || '';

            openModal('modalDelete');
        }

        // --- Buka ulang modal create jika ada validation error ---
        @if ($errors->any() && old('_method') === null && old('title'))
            document.addEventListener('DOMContentLoaded', function() {
                openModal('modalCreate');
            });
        @endif

        // --- Close modal dengan tombol Escape ---
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal('modalCreate');
                closeModal('modalEdit');
                closeModal('modalDelete');
            }
        });
    </script>

</x-admin.app-layout>
