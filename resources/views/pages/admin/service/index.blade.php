<x-admin.app-layout>

    <div class="flex-1 overflow-y-auto p-8 space-y-8">

        {{-- ===================== FLASH MESSAGES ===================== --}}
        @if(session('success'))
            <div class="flex items-center gap-2 px-4 py-3 bg-emerald-50 text-emerald-800 rounded-lg border border-emerald-200">
                <span class="material-symbols-outlined text-[18px]">check_circle</span>
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="flex items-center gap-2 px-4 py-3 bg-red-50 text-red-800 rounded-lg border border-red-200">
                <span class="material-symbols-outlined text-[18px]">error</span>
                {{ session('error') }}
            </div>
        @endif

        {{-- Validation errors --}}
        @if($errors->any())
            <div class="flex flex-col gap-1 px-4 py-3 bg-red-50 text-red-800 rounded-lg border border-red-200 text-sm">
                <div class="flex items-center gap-2 font-semibold">
                    <span class="material-symbols-outlined text-[18px]">error</span>
                    Terdapat kesalahan pada form:
                </div>
                <ul class="list-disc list-inside ml-5 space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ===================== PAGE HEADER ===================== --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 dark:text-slate-50 tracking-tight">Services</h1>
                <p class="text-slate-500 text-sm">Manage your platform's service catalog and offerings.</p>
            </div>
            <div class="flex items-center gap-3">
                <button
                    onclick="showForm()"
                    class="flex items-center gap-2 px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-primary/90 transition-all shadow-lg shadow-primary/20 text-sm">
                    <span class="material-symbols-outlined text-lg">add</span>
                    Add Service
                </button>
            </div>
        </div>

        {{-- ===================== TABLE ===================== --}}
        <div class="bg-white dark:bg-background-dark rounded-xl border border-primary/10 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-primary/5 border-b border-primary/10">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Service Name</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Excerpt</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Sort</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-primary/5">
                        @forelse($services as $service)
                            <tr class="hover:bg-primary/5 transition-colors group">

                                {{-- Image --}}
                                <td class="px-6 py-4">
                                    <div class="size-12 rounded-lg bg-primary/5 border border-primary/10 overflow-hidden flex items-center justify-center">
                                        @if($service->image)
                                            <img
                                                src="{{ Storage::url($service->image) }}"
                                                alt="{{ $service->name }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <span class="material-symbols-outlined text-slate-300 text-2xl">image</span>
                                        @endif
                                    </div>
                                </td>

                                {{-- Nama & Slug --}}
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-slate-900 dark:text-slate-50">{{ $service->name }}</p>
                                    <p class="text-xs text-slate-400">/services/{{ $service->slug }}</p>
                                </td>

                                {{-- Excerpt --}}
                                <td class="px-6 py-4 max-w-xs">
                                    <p class="text-sm text-slate-500 truncate">{{ $service->excerpt ?? '-' }}</p>
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.layanan.toggle-status', $service->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" title="Toggle status">
                                            @if($service->is_active)
                                                <span class="flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:opacity-70 transition-opacity">
                                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>Active
                                                </span>
                                            @else
                                                <span class="flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:opacity-70 transition-opacity">
                                                    <span class="size-1.5 rounded-full bg-slate-400"></span>Inactive
                                                </span>
                                            @endif
                                        </button>
                                    </form>
                                </td>

                                {{-- Sort Order --}}
                                <td class="px-6 py-4 text-sm text-slate-500">
                                    {{ str_pad($service->sort_order, 2, '0', STR_PAD_LEFT) }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        {{-- Edit button --}}
                                        <button
                                            type="button"
                                            onclick="loadEditForm(
                                                {{ $service->id }},
                                                '{{ addslashes($service->name) }}',
                                                '{{ addslashes($service->excerpt ?? '') }}',
                                                '{{ addslashes($service->deskripsi ?? '') }}',
                                                '{{ $service->image ? Storage::url($service->image) : '' }}',
                                                {{ $service->is_active ? 1 : 0 }},
                                                {{ $service->sort_order }}
                                            )"
                                            class="p-2 text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-xl">edit</span>
                                        </button>

                                        {{-- Delete form --}}
                                        <form action="{{ route('admin.layanan.destroy', $service->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus layanan ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                                                <span class="material-symbols-outlined text-xl">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <span class="material-symbols-outlined text-[48px] text-slate-200 block mb-2">category</span>
                                    <p class="text-slate-400 text-sm">Belum ada layanan. Klik "Add Service" untuk menambah.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ===================== CREATE / EDIT FORM (Slide-in Panel) ===================== --}}
        {{-- Overlay --}}
        <div
            id="form-overlay"
            onclick="hideForm()"
            class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 hidden transition-opacity duration-200 opacity-0">
        </div>

        {{-- Slide-in Panel --}}
        <div
            id="service-form-panel"
            class="fixed top-0 right-0 h-full w-full max-w-lg bg-white dark:bg-background-dark shadow-2xl z-50
                   transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col">

            {{-- Panel Header --}}
            <div class="flex items-center justify-between px-6 py-5 border-b border-primary/10">
                <div>
                    <h2 id="form-title" class="text-lg font-bold text-slate-900 dark:text-slate-50">Add Service</h2>
                    <p id="form-subtitle" class="text-xs text-slate-400 mt-0.5">Isi data layanan baru</p>
                </div>
                <button onclick="hideForm()" class="p-2 text-slate-400 hover:text-slate-600 transition-colors rounded-lg hover:bg-slate-100">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>

            {{-- Scrollable Body --}}
            <div class="flex-1 overflow-y-auto px-6 py-6 space-y-5">

                {{-- CREATE form --}}
                <form id="form-create" action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Nama Layanan <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Web Development"
                            required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    {{-- Image Upload --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Image
                            <span class="font-normal text-slate-400">(jpg, jpeg, png, webp — maks. 2MB)</span>
                        </label>
                        <div
                            id="create-dropzone"
                            onclick="document.getElementById('create-image-input').click()"
                            class="relative flex flex-col items-center justify-center gap-2 w-full h-36
                                   border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-lg
                                   bg-slate-50 dark:bg-slate-800 cursor-pointer
                                   hover:border-primary/50 hover:bg-primary/5 transition group">
                            {{-- Placeholder --}}
                            <div id="create-placeholder" class="flex flex-col items-center gap-1 pointer-events-none">
                                <span class="material-symbols-outlined text-3xl text-slate-300 group-hover:text-primary transition">upload</span>
                                <p class="text-xs text-slate-400 group-hover:text-primary transition">Klik untuk pilih gambar</p>
                            </div>
                            {{-- Preview --}}
                            <img id="create-image-preview" src="" alt="Preview"
                                class="hidden absolute inset-0 w-full h-full object-cover rounded-lg">
                        </div>
                        <input
                            type="file"
                            name="image"
                            id="create-image-input"
                            accept="image/jpg,image/jpeg,image/png,image/webp"
                            class="hidden"
                            onchange="previewImage(this, 'create-image-preview', 'create-placeholder')">
                    </div>

                    {{-- Excerpt --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Excerpt
                            <span class="font-normal text-slate-400">(ringkasan singkat)</span>
                        </label>
                        <input
                            type="text"
                            name="excerpt"
                            value="{{ old('excerpt') }}"
                            placeholder="Contoh: Solusi website profesional untuk bisnis Anda"
                            maxlength="500"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Deskripsi
                        </label>
                        <textarea
                            name="deskripsi"
                            rows="4"
                            placeholder="Deskripsikan layanan secara lengkap..."
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition resize-none">{{ old('deskripsi') }}</textarea>
                    </div>

                    {{-- Sort Order + Status --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Sort Order</label>
                            <input
                                type="number"
                                name="sort_order"
                                value="{{ old('sort_order', 0) }}"
                                min="0"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                       text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                            <label class="flex items-center gap-3 cursor-pointer mt-1">
                                <div class="relative">
                                    <input type="checkbox" name="is_active" value="1"
                                        {{ old('is_active', 1) ? 'checked' : '' }}
                                        class="sr-only peer">
                                    <div class="w-10 h-5 bg-slate-200 rounded-full peer peer-checked:bg-primary transition-colors duration-200"></div>
                                    <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5"></div>
                                </div>
                                <span class="text-sm text-slate-600 dark:text-slate-400">Active</span>
                            </label>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2.5
                                   bg-primary text-white font-semibold rounded-lg
                                   hover:bg-primary/90 transition-all shadow-lg shadow-primary/20 text-sm">
                            <span class="material-symbols-outlined text-lg">save</span>
                            Simpan Layanan
                        </button>
                    </div>
                </form>

                {{-- EDIT form (hidden by default) --}}
                <form id="form-edit" action="" method="POST" enctype="multipart/form-data" class="space-y-5 hidden">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Nama Layanan <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="edit-name"
                            placeholder="Contoh: Web Development"
                            required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    {{-- Image Upload --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Image
                            <span class="font-normal text-slate-400">(jpg, jpeg, png, webp — maks. 2MB)</span>
                        </label>
                        <div
                            id="edit-dropzone"
                            onclick="document.getElementById('edit-image-input').click()"
                            class="relative flex flex-col items-center justify-center gap-2 w-full h-36
                                   border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-lg
                                   bg-slate-50 dark:bg-slate-800 cursor-pointer
                                   hover:border-primary/50 hover:bg-primary/5 transition group">
                            <div id="edit-placeholder" class="flex flex-col items-center gap-1 pointer-events-none">
                                <span class="material-symbols-outlined text-3xl text-slate-300 group-hover:text-primary transition">upload</span>
                                <p class="text-xs text-slate-400 group-hover:text-primary transition">Klik untuk ganti gambar</p>
                            </div>
                            <img id="edit-image-preview" src="" alt="Preview"
                                class="hidden absolute inset-0 w-full h-full object-cover rounded-lg">
                        </div>
                        <input
                            type="file"
                            name="image"
                            id="edit-image-input"
                            accept="image/jpg,image/jpeg,image/png,image/webp"
                            class="hidden"
                            onchange="previewImage(this, 'edit-image-preview', 'edit-placeholder')">
                        <p class="text-xs text-slate-400 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    </div>

                    {{-- Excerpt --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Excerpt
                            <span class="font-normal text-slate-400">(ringkasan singkat)</span>
                        </label>
                        <input
                            type="text"
                            name="excerpt"
                            id="edit-excerpt"
                            placeholder="Contoh: Solusi website profesional untuk bisnis Anda"
                            maxlength="500"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Deskripsi</label>
                        <textarea
                            name="deskripsi"
                            id="edit-deskripsi"
                            rows="4"
                            placeholder="Deskripsikan layanan secara lengkap..."
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition resize-none"></textarea>
                    </div>

                    {{-- Sort Order + Status --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Sort Order</label>
                            <input
                                type="number"
                                name="sort_order"
                                id="edit-sort-order"
                                min="0"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                       text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                            <label class="flex items-center gap-3 cursor-pointer mt-1">
                                <div class="relative">
                                    <input type="checkbox" name="is_active" id="edit-is-active" value="1" class="sr-only peer">
                                    <div class="w-10 h-5 bg-slate-200 rounded-full peer peer-checked:bg-primary transition-colors duration-200"></div>
                                    <div class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5"></div>
                                </div>
                                <span class="text-sm text-slate-600 dark:text-slate-400">Active</span>
                            </label>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2.5
                                   bg-primary text-white font-semibold rounded-lg
                                   hover:bg-primary/90 transition-all shadow-lg shadow-primary/20 text-sm">
                            <span class="material-symbols-outlined text-lg">save</span>
                            Update Layanan
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

    {{-- ===================== JAVASCRIPT ===================== --}}
    <script>
        const panel   = document.getElementById('service-form-panel');
        const overlay = document.getElementById('form-overlay');

        function showForm() {
            document.getElementById('form-create').classList.remove('hidden');
            document.getElementById('form-edit').classList.add('hidden');
            document.getElementById('form-title').textContent    = 'Add Service';
            document.getElementById('form-subtitle').textContent = 'Isi data layanan baru';

            overlay.classList.remove('hidden');
            requestAnimationFrame(() => {
                overlay.classList.remove('opacity-0');
                panel.classList.remove('translate-x-full');
            });
        }

        function hideForm() {
            panel.classList.add('translate-x-full');
            overlay.classList.add('opacity-0');
            setTimeout(() => overlay.classList.add('hidden'), 200);
        }

        function previewImage(input, previewId, placeholderId) {
            const preview     = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function loadEditForm(id, name, excerpt, deskripsi, imageUrl, isActive, sortOrder) {
            const baseUrl = '{{ url("admin/layanan") }}';
            document.getElementById('form-edit').action = baseUrl + '/' + id;

            document.getElementById('edit-name').value       = name;
            document.getElementById('edit-excerpt').value    = excerpt;
            document.getElementById('edit-deskripsi').value  = deskripsi;
            document.getElementById('edit-sort-order').value = sortOrder;
            document.getElementById('edit-is-active').checked = (isActive == 1);

            // Show existing image preview if available
            const preview     = document.getElementById('edit-image-preview');
            const placeholder = document.getElementById('edit-placeholder');
            if (imageUrl) {
                preview.src = imageUrl;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            } else {
                preview.src = '';
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }

            // Reset file input
            document.getElementById('edit-image-input').value = '';

            document.getElementById('form-create').classList.add('hidden');
            document.getElementById('form-edit').classList.remove('hidden');
            document.getElementById('form-title').textContent    = 'Edit Service';
            document.getElementById('form-subtitle').textContent = 'Perbarui data layanan';

            overlay.classList.remove('hidden');
            requestAnimationFrame(() => {
                overlay.classList.remove('opacity-0');
                panel.classList.remove('translate-x-full');
            });
        }

        @if($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                showForm();
            });
        @endif
    </script>

</x-admin.app-layout>
