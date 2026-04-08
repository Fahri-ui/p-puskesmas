<x-admin.app-layout>
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Kelola Visi & Misi</h1>
            <p class="text-gray-600 text-sm">Kelola visi dan misi Puskesmas Binong</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Visi Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Visi</h2>

                @if($visi)
                    <!-- Edit Visi Form -->
                    <form action="{{ route('admin.visi-misi.update-visi', $visi) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="visi_content" class="block text-sm font-medium text-gray-700 mb-2">
                                Konten Visi <span class="text-red-500">*</span>
                            </label>
                            <textarea id="visi_content"
                                      name="content"
                                      rows="4"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#349953] focus:border-[#349953] outline-none transition resize-vertical @error('content') border-red-500 @enderror"
                                      placeholder="Masukkan visi">{{ old('content', $visi->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="w-full px-4 py-2 bg-[#349953] text-white font-medium rounded-lg hover:bg-[#2d8a47] transition">
                            Perbarui Visi
                        </button>
                    </form>
                @else
                    <!-- Add Visi Form -->
                    <form action="{{ route('admin.visi-misi.store-visi') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="visi_content" class="block text-sm font-medium text-gray-700 mb-2">
                                Konten Visi <span class="text-red-500">*</span>
                            </label>
                            <textarea id="visi_content"
                                      name="content"
                                      rows="4"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#349953] focus:border-[#349953] outline-none transition resize-vertical @error('content') border-red-500 @enderror"
                                      placeholder="Masukkan visi">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="w-full px-4 py-2 bg-[#349953] text-white font-medium rounded-lg hover:bg-[#2d8a47] transition">
                            Tambah Visi
                        </button>
                    </form>
                @endif
            </div>

            <!-- Misi Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Misi</h2>
                    <button type="button"
                            onclick="openAddMisiModal()"
                            class="px-3 py-1.5 bg-[#349953] text-white text-sm font-medium rounded-lg hover:bg-[#2d8a47] transition">
                        Tambah Misi
                    </button>
                </div>

                <!-- Misi List -->
                <div class="space-y-3">
                    @forelse($misis as $misi)
                        <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                            <div class="flex-1">
                                <p class="text-sm text-gray-700">{{ $misi->content }}</p>
                                <div class="flex items-center gap-2 mt-2">
                                    <button type="button"
                                            onclick="openEditMisiModal({{ $misi->id }}, '{{ addslashes($misi->content) }}')"
                                            class="text-xs px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.visi-misi.destroy-misi', $misi) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus misi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 text-center py-4">Belum ada data misi</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Add Misi Modal -->
    <div id="addMisiModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg max-w-md w-full p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Tambah Misi Baru</h3>
                <form action="{{ route('admin.visi-misi.store-misi') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="misi_content" class="block text-sm font-medium text-gray-700 mb-2">
                            Konten Misi <span class="text-red-500">*</span>
                        </label>
                        <textarea id="misi_content"
                                  name="content"
                                  rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#349953] focus:border-[#349953] outline-none transition resize-vertical"
                                  placeholder="Masukkan misi"></textarea>
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 px-4 py-2 bg-[#349953] text-white font-medium rounded-lg hover:bg-[#2d8a47] transition">
                            Simpan
                        </button>
                        <button type="button" onclick="closeAddMisiModal()" class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Misi Modal -->
    <div id="editMisiModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg max-w-md w-full p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Edit Misi</h3>
                <form id="editMisiForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_misi_content" class="block text-sm font-medium text-gray-700 mb-2">
                            Konten Misi <span class="text-red-500">*</span>
                        </label>
                        <textarea id="edit_misi_content"
                                  name="content"
                                  rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#349953] focus:border-[#349953] outline-none transition resize-vertical"
                                  placeholder="Masukkan misi"></textarea>
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 px-4 py-2 bg-[#349953] text-white font-medium rounded-lg hover:bg-[#2d8a47] transition">
                            Perbarui
                        </button>
                        <button type="button" onclick="closeEditMisiModal()" class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openAddMisiModal() {
            document.getElementById('addMisiModal').classList.remove('hidden');
        }

        function closeAddMisiModal() {
            document.getElementById('addMisiModal').classList.add('hidden');
        }

        function openEditMisiModal(id, content) {
            document.getElementById('edit_misi_content').value = content;
            document.getElementById('editMisiForm').action = `/admin/visi-misi/misi/${id}`;
            document.getElementById('editMisiModal').classList.remove('hidden');
        }

        function closeEditMisiModal() {
            document.getElementById('editMisiModal').classList.add('hidden');
        }

        // Close modals when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.id === 'addMisiModal') {
                closeAddMisiModal();
            }
            if (e.target.id === 'editMisiModal') {
                closeEditMisiModal();
            }
        });
    </script>
</x-admin.app-layout>
