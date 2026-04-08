<x-admin.app-layout>
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Data Profil</h1>
            <p class="text-gray-600 text-sm">Perbarui informasi profil Puskesmas Binong</p>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Judul Profil <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $profil->title) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#349953] focus:border-[#349953] outline-none transition @error('title') border-red-500 @enderror"
                        placeholder="Masukkan judul profil" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if ($profil->image)
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                        <div class="rounded-lg overflow-hidden border border-gray-200">
                            <img src="{{ Storage::url($profil->image) }}" alt="{{ $profil->title }}"
                                class="w-full h-64 object-cover">
                        </div>
                    </div>
                @endif

                <!-- Image -->
                <div class="mb-5">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Ganti Gambar Profil
                    </label>
                    <div class="flex items-center gap-4">
                        <input type="file" id="image" name="image" accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#349953] file:text-white hover:file:bg-[#2d8a47] cursor-pointer">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF, WebP. Maksimal 2MB. Biarkan kosong jika
                        tidak ingin mengganti gambar.</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi
                    </label>
                    <textarea id="description" name="description" rows="5"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#349953] focus:border-[#349953] outline-none transition resize-vertical @error('description') border-red-500 @enderror"
                        placeholder="Masukkan deskripsi profil">{{ old('description', $profil->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2.5 bg-[#349953] text-white font-medium rounded-lg hover:bg-[#2d8a47] focus:ring-4 focus:ring-[#349953]/30 transition">
                        Perbarui Data
                    </button>
                    <a href="{{ route('admin.profil') }}"
                        class="w-full sm:w-auto px-6 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin.app-layout>
