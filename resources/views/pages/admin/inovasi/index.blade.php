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
                <h3 class="text-2xl font-bold text-slate-900">Daftar Inovasi</h3>
                <p class="text-slate-500 mt-1">Kelola file PPT inovasi yang dapat diunggah dan diunduh oleh pengguna.</p>
            </div>
            <button onclick="openModal('modalCreate')"
                class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-lg font-semibold text-sm transition-all shadow-md shadow-primary/20">
                <span class="material-symbols-outlined">add_circle</span>
                Tambah Inovasi
            </button>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-200">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-16">NO</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">JUDUL</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">DESKRIPSI</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">FILE</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right w-32">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($inovasis as $index => $inovasi)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-slate-500">{{ $inovasis->firstItem() + $index }}</td>
                                <td class="px-6 py-4">
                                    <p class="text-sm font-semibold text-slate-900">{{ $inovasi->title }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-slate-500">{{ \Illuminate\Support\Str::limit($inovasi->description, 80) }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($inovasi->file_path)
                                        <a href="{{ asset('storage/' . $inovasi->file_path) }}" target="_blank"
                                            class="text-primary font-medium underline">Unduh PPT</a>
                                    @else
                                        <span class="text-slate-400">Tidak ada file</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            onclick="openEditModal({{ $inovasi->id }}, {{ json_encode($inovasi->title) }}, {{ json_encode($inovasi->description) }}, {{ json_encode($inovasi->file_path) }})"
                                            class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                            title="Edit">
                                            <span class="material-symbols-outlined text-xl">edit</span>
                                        </button>
                                        <button
                                            onclick="openDeleteModal({{ $inovasi->id }}, {{ json_encode($inovasi->title) }})"
                                            class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                            title="Delete">
                                            <span class="material-symbols-outlined text-xl">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center text-slate-400">
                                    <span class="material-symbols-outlined text-4xl block mb-2">description</span>
                                    Belum ada data inovasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($inovasis->hasPages())
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
                    <p class="text-xs text-slate-500 font-medium">
                        Showing {{ $inovasis->firstItem() }} to {{ $inovasis->lastItem() }} of {{ $inovasis->total() }} entries
                    </p>
                    <div class="flex gap-1">
                        <a href="{{ $inovasis->previousPageUrl() }}"
                            class="size-8 flex items-center justify-center rounded border border-slate-200 text-slate-400 hover:bg-white transition-colors {{ $inovasis->onFirstPage() ? 'pointer-events-none opacity-40' : '' }}">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </a>
                        @foreach ($inovasis->getUrlRange(1, $inovasis->lastPage()) as $page => $url)
                            <a href="{{ $url }}"
                                class="size-8 flex items-center justify-center rounded border font-medium text-xs transition-colors {{ $page == $inovasis->currentPage() ? 'border-primary bg-primary text-white shadow-sm shadow-primary/20' : 'border-slate-200 text-slate-600 hover:bg-white' }}">
                                {{ $page }}
                            </a>
                        @endforeach
                        <a href="{{ $inovasis->nextPageUrl() }}"
                            class="size-8 flex items-center justify-center rounded border border-slate-200 text-slate-400 hover:bg-white transition-colors {{ !$inovasis->hasMorePages() ? 'pointer-events-none opacity-40' : '' }}">
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
                <h4 class="text-lg font-bold text-slate-900">Tambah Inovasi Baru</h4>
                <button onclick="closeModal('modalCreate')" class="p-1 text-slate-400 hover:text-slate-600 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form action="{{ route('admin.inovasi.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Judul</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul inovasi..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition" />
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4" placeholder="Masukkan deskripsi singkat..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">File PPT</label>
                    <input type="file" name="file" accept=".ppt,.pptx"
                        class="w-full text-sm text-slate-700 file:border-0 file:bg-slate-100 file:px-3 file:py-2 file:rounded-lg file:text-slate-900" />
                    @error('file')
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
                <h4 class="text-lg font-bold text-slate-900">Edit Inovasi</h4>
                <button onclick="closeModal('modalEdit')" class="p-1 text-slate-400 hover:text-slate-600 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form id="editForm" action="" method="POST" enctype="multipart/form-data" class="px-6 py-5 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Judul</label>
                    <input id="editTitle" type="text" name="title" placeholder="Masukkan judul inovasi..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi</label>
                    <textarea id="editDescription" name="description" rows="4" placeholder="Masukkan deskripsi singkat..."
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Ganti File PPT <span class="text-slate-400 text-xs">(opsional)</span></label>
                    <input type="file" name="file" accept=".ppt,.pptx"
                        class="w-full text-sm text-slate-700 file:border-0 file:bg-slate-100 file:px-3 file:py-2 file:rounded-lg file:text-slate-900" />
                </div>
                <div>
                    <p class="text-sm text-slate-500">File saat ini: <span id="currentFileName" class="font-medium"></span></p>
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
                <h4 class="text-lg font-bold text-slate-900">Hapus Inovasi</h4>
            </div>
            <form id="deleteForm" action="" method="POST" class="px-6 py-5 space-y-4">
                @csrf
                @method('DELETE')
                <p class="text-sm text-slate-600">Apakah Anda yakin ingin menghapus inovasi <span id="deleteTitle" class="font-semibold"></span>?</p>
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

        function openEditModal(id, title, description, filePath) {
            document.getElementById('editForm').action = `/admin/inovasi/${id}`;
            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description;
            document.getElementById('currentFileName').textContent = filePath ? filePath.split('/').pop() : 'Tidak ada file';
            openModal('modalEdit');
        }

        function openDeleteModal(id, title) {
            document.getElementById('deleteForm').action = `/admin/inovasi/${id}`;
            document.getElementById('deleteTitle').textContent = title;
            openModal('modalDelete');
        }
    </script>
</x-admin.app-layout>
