<x-admin.app-layout>
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tambah Data Profil</h1>
            <p class="text-gray-600 text-sm">Isi informasi profil Puskesmas Binong</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <form action="{{ route('admin.profil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Profil <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#349953] focus:border-[#349953] outline-none transition @error('title') border-red-500 @enderror"
                           placeholder="Masukkan judul profil"
                           required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div class="mb-5">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Gambar Profil
                    </label>
                    <div class="flex items-center gap-4">
                        <input type="file"
                               id="image"
                               name="image"
                               accept="image/*"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#349953] file:text-white hover:file:bg-[#2d8a47] cursor-pointer">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF, WebP. Maksimal 2MB.</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi
                    </label>
                    <textarea id="description"
                              name="description"
                              rows="5"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#349953] focus:border-[#349953] outline-none transition resize-vertical @error('description') border-red-500 @enderror"
                              placeholder="Masukkan deskripsi profil">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                            class="px-6 py-2.5 bg-[#349953] text-white font-medium rounded-lg hover:bg-[#2d8a47] focus:ring-4 focus:ring-[#349953]/30 transition">
                        Simpan Data
                    </button>
                    <a href="{{ route('admin.profil') }}"
                       class="px-6 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Image Script -->
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Optional: Tampilkan preview jika diperlukan
                    console.log('Image selected:', file.name);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-admin.app-layout>
