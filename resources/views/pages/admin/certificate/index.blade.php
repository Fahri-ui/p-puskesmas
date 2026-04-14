<x-admin.app-layout>
    <div class="p-8">
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm font-medium">
                <span class="material-symbols-outlined text-base">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h3 class="text-2xl font-bold text-slate-900">Daftar Sertifikat</h3>
                <p class="text-slate-500 mt-1">Kelola sertifikat dan penghargaan yang ditampilkan di halaman publik.</p>
            </div>
            <button onclick="openModal('modalCreate')"
                class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-lg font-semibold text-sm transition-all shadow-md shadow-primary/20">
                <span class="material-symbols-outlined">add_circle</span>
                Tambah Sertifikat
            </button>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-16">NO</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-32">GAMBAR</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">JUDUL</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right w-32">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($certificates as $index => $certificate)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $certificates->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    <div class="w-20 h-14 rounded-lg bg-slate-100 overflow-hidden">
                                        <img class="w-full h-full object-cover"
                                            src="{{ asset('storage/' . $certificate->image) }}"
                                            alt="{{ $certificate->title }}" />
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm font-semibold text-slate-900">{{ $certificate->title }}</p>
                                    <p class="text-xs text-slate-400 mt-1">{{ $certificate->created_at->format('d M Y') }}</p>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            onclick="openEditModal({{ $certificate->id }}, {{ json_encode($certificate->title) }}, {{ json_encode(asset('storage/' . $certificate->image)) }})"
                                            class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                            title="Edit">
                                            <span class="material-symbols-outlined text-xl">edit</span>
                                        </button>
                                        <button
                                            onclick="openDeleteModal({{ $certificate->id }}, {{ json_encode($certificate->title) }})"
                                            class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                            title="Delete">
                                            <span class="material-symbols-outlined text-xl">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center text-slate-400">
                                    <span class="material-symbols-outlined text-4xl block mb-2">picture_as_pdf</span>
                                    Belum ada data certificate.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($certificates->hasPages())
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
                    <p class="text-xs text-slate-500 font-medium">
                        Showing {{ $certificates->firstItem() }} to {{ $certificates->lastItem() }} of {{ $certificates->total() }} entries
                    </p>
                    <div class="flex gap-1">
                        <a href="{{ $certificates->previousPageUrl() }}"
                            class="size-8 flex items-center justify-center rounded border border-slate-200 text-slate-400 hover:bg-white transition-colors {{ $certificates->onFirstPage() ? 'pointer-events-none opacity-40' : '' }}">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </a>
                        @foreach ($certificates->getUrlRange(1, $certificates->lastPage()) as $page => $url)
                            <a href="{{ $url }}"
                                class="size-8 flex items-center justify-center rounded border font-medium text-xs transition-colors {{ $page == $certificates->currentPage() ? 'border-primary bg-primary text-white shadow-sm shadow-primary/20' : 'border-slate-200 text-slate-600 hover:bg-white' }}">
                                {{ $page }}
                            </a>
                        @endforeach
                        <a href="{{ $certificates->nextPageUrl() }}"
                            class="size-8 flex items-center justify-center rounded border border-slate-200 text-slate-400 hover:bg-white transition-colors {{ !$certificates->hasMorePages() ? 'pointer-events-none opacity-40' : '' }}">
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div id="modalCreate" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('modalCreate')"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg">
            <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200">
                <h4 class="text-lg font-bold text-slate-900">Tambah Sertifikat Baru</h4>
                <button onclick="closeModal('modalCreate')" class="p-1 text-slate-400 hover:text-slate-600 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form action="{{ route('admin.certificate.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
                @csrf
                <div class="w-full h-48 rounded-xl bg-slate-100 overflow-hidden border-2 border-dashed border-slate-300 flex items-center justify-center cursor-pointer"
                    onclick="document.getElementById('createImageInput').click()">
                    <img id="createPreview" src="" alt="" class="w-full h-full object-cover hidden" />
                    <div id="createPlaceholder" class="text-center text-slate-400">
                        <span class="material-symbols-outlined text-4xl block mb-1">add_photo_alternate</span>
                        <span class="text-sm">Klik untuk pilih gambar</span>
                    </div>
                </div>
                <input id="createImageInput" type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(event, 'createPreview', 'createPlaceholder')" />
                @error('image')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Judul</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul certificate..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition" />
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModal('modalCreate')"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 text-sm font-medium hover:bg-slate-50 transition">Batal</button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-primary hover:bg-primary/90 text-white text-sm font-semibold transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalEdit" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('modalEdit')"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg">
            <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200">
                <h4 class="text-lg font-bold text-slate-900">Edit Certificate</h4>
                <button onclick="closeModal('modalEdit')" class="p-1 text-slate-400 hover:text-slate-600 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form id="editForm" action="" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
                @csrf
                @method('PUT')
                <div class="w-full h-48 rounded-xl bg-slate-100 overflow-hidden border-2 border-dashed border-slate-300 flex items-center justify-center cursor-pointer"
                    onclick="document.getElementById('editImageInput').click()">
                    <img id="editPreview" src="" alt="" class="w-full h-full object-cover" />
                </div>
                <input id="editImageInput" type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(event, 'editPreview', null)" />
                @error('image')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Judul</label>
                    <input id="editTitle" type="text" name="title" placeholder="Masukkan judul certificate..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition" />
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModal('modalEdit')"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 text-sm font-medium hover:bg-slate-50 transition">Batal</button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-primary hover:bg-primary/90 text-white text-sm font-semibold transition">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalDelete" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal('modalDelete')"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md">
            <div class="px-6 py-5 border-b border-slate-200">
                <h4 class="text-lg font-bold text-slate-900">Hapus Certificate</h4>
            </div>
            <form id="deleteForm" action="" method="POST" class="px-6 py-5 space-y-4">
                @csrf
                @method('DELETE')
                <p class="text-sm text-slate-600">Apakah Anda yakin ingin menghapus certificate <span id="deleteTitle" class="font-semibold"></span>?</p>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModal('modalDelete')"
                        class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 text-sm font-medium hover:bg-slate-50 transition">Batal</button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm font-semibold transition">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        function previewImage(event, previewId, placeholderId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);
            const placeholder = placeholderId ? document.getElementById(placeholderId) : null;

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function openEditModal(id, title, imageUrl) {
            document.getElementById('editForm').action = `/admin/certificate/${id}`;
            document.getElementById('editTitle').value = title;
            document.getElementById('editPreview').src = imageUrl;
            openModal('modalEdit');
        }

        function openDeleteModal(id, title) {
            document.getElementById('deleteForm').action = `/admin/certificate/${id}`;
            document.getElementById('deleteTitle').textContent = title;
            openModal('modalDelete');
        }
    </script>
</x-admin.app-layout>
