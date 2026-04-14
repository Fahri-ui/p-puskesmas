<x-admin.app-layout>

    <div class="flex-1 overflow-y-auto p-8 space-y-8">

        {{-- ===================== FLASH MESSAGES ===================== --}}
        @if (session('success'))
            <div
                class="flex items-center gap-2 px-4 py-3 bg-emerald-50 text-emerald-800 rounded-lg border border-emerald-200">
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
        @if ($errors->any())
            <div class="flex flex-col gap-1 px-4 py-3 bg-red-50 text-red-800 rounded-lg border border-red-200 text-sm">
                <div class="flex items-center gap-2 font-semibold">
                    <span class="material-symbols-outlined text-[18px]">error</span>
                    Terdapat kesalahan pada form:
                </div>
                <ul class="list-disc list-inside ml-5 space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ===================== PAGE HEADER ===================== --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 dark:text-slate-50 tracking-tight">Layanan</h1>
                <p class="text-slate-500 text-sm">
                    Kelola katalog layanan dan penawaran platform Anda.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="showForm()"
                    class="flex items-center gap-2 px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-primary/90 transition-all shadow-lg shadow-primary/20 text-sm">
                    <span class="material-symbols-outlined text-lg">add</span>
                    Tambah Layanan
                </button>
            </div>
        </div>

        {{-- ===================== TABLE ===================== --}}
        <div class="bg-white dark:bg-background-dark rounded-xl border border-primary/10 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-primary/5 border-b border-primary/10">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Gambar</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Nama Layanan
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Hari Buka
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Jam
                                Operasional</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-primary/5">
                        @forelse($services as $service)
                            <tr class="hover:bg-primary/5 transition-colors group">

                                {{-- Image --}}
                                <td class="px-6 py-4">
                                    <div
                                        class="size-12 rounded-lg bg-primary/5 border border-primary/10 overflow-hidden flex items-center justify-center">
                                        @if ($service->image)
                                            <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}"
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

                                {{-- Open Days --}}
                                <td class="px-6 py-4 text-sm text-slate-500">
                                    {{ $service->open_days ?? '-' }}
                                </td>

                                {{-- Jam Operasional --}}
                                <td class="px-6 py-4 text-sm text-slate-500">
                                    @if ($service->jam_buka && $service->jam_tutup)
                                        {{ $service->jam_buka }} - {{ $service->jam_tutup }}
                                    @elseif($service->jam_buka)
                                        {{ $service->jam_buka }}
                                    @elseif($service->jam_tutup)
                                        {{ $service->jam_tutup }}
                                    @else
                                        -
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.layanan.toggle-status', $service->id) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" title="Ubah status">
                                            @if ($service->is_active)
                                                <span
                                                    class="flex items-center gap-1.5 text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:opacity-70 transition-opacity">
                                                    <span class="size-1.5 rounded-full bg-emerald-500"></span>Aktif
                                                </span>
                                            @else
                                                <span
                                                    class="flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:opacity-70 transition-opacity">
                                                    <span class="size-1.5 rounded-full bg-slate-400"></span>Tidak Aktif
                                                </span>
                                            @endif
                                        </button>
                                    </form>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        {{-- Edit button --}}
                                        <button type="button" data-id="{{ $service->id }}"
                                            data-name="{{ $service->name }}"
                                            data-excerpt="{{ $service->excerpt ?? '' }}"
                                            data-deskripsi="{{ $service->deskripsi ?? '' }}"
                                            data-image="{{ $service->image ? Storage::url($service->image) : '' }}"
                                            data-is-active="{{ $service->is_active ? 1 : 0 }}"
                                            data-jam-buka="{{ $service->jam_buka ?? '' }}"
                                            data-jam-tutup="{{ $service->jam_tutup ?? '' }}"
                                            data-open-days="{{ $service->open_days ?? '' }}"
                                            onclick="loadEditForm(this)"
                                            class="p-2 text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-xl">edit</span>
                                        </button>

                                        {{-- Delete form --}}
                                        <form action="{{ route('admin.layanan.destroy', $service->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus layanan ini?');"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                                                <span class="material-symbols-outlined text-xl">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <span
                                        class="material-symbols-outlined text-[48px] text-slate-200 block mb-2">category</span>
                                    <p class="text-slate-400 text-sm">Belum ada layanan. Klik "Tambah Layanan" untuk
                                        menambah.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ===================== CREATE / EDIT FORM (Slide-in Panel) ===================== --}}
        {{-- Overlay --}}
        <div id="form-overlay" onclick="hideForm()"
            class="fixed inset-0 bg-black/30 backdrop-blur-sm z-40 hidden transition-opacity duration-200 opacity-0">
        </div>

        {{-- Slide-in Panel --}}
        <div id="service-form-panel"
            class="fixed top-0 right-0 h-full w-full max-w-lg bg-white dark:bg-background-dark shadow-2xl z-50
                   transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col">

            {{-- Panel Header --}}
            <div class="flex items-center justify-between px-6 py-5 border-b border-primary/10">
                <div>
                    <h2 id="form-title" class="text-lg font-bold text-slate-900 dark:text-slate-50">Tambah Layanan</h2>
                    <p id="form-subtitle" class="text-xs text-slate-400 mt-0.5">Isi data layanan baru</p>
                </div>
                <button onclick="hideForm()"
                    class="p-2 text-slate-400 hover:text-slate-600 transition-colors rounded-lg hover:bg-slate-100">
                    <span class="material-symbols-outlined text-xl">close</span>
                </button>
            </div>

            {{-- Scrollable Body --}}
            <div class="flex-1 overflow-y-auto px-6 py-6 space-y-5">

                {{-- CREATE form --}}
                <form id="form-create" action="{{ route('admin.layanan.store') }}" method="POST"
                    enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Nama Layanan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            placeholder="Contoh: Web Development" required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    {{-- Image Upload --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Gambar
                            <span class="font-normal text-slate-400">(jpg, jpeg, png, webp — maks. 2MB)</span>
                        </label>
                        <div id="create-dropzone" onclick="document.getElementById('create-image-input').click()"
                            class="relative flex flex-col items-center justify-center gap-2 w-full h-36
                                   border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-lg
                                   bg-slate-50 dark:bg-slate-800 cursor-pointer
                                   hover:border-primary/50 hover:bg-primary/5 transition group">
                            {{-- Placeholder --}}
                            <div id="create-placeholder" class="flex flex-col items-center gap-1 pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-3xl text-slate-300 group-hover:text-primary transition">upload</span>
                                <p class="text-xs text-slate-400 group-hover:text-primary transition">Klik untuk pilih
                                    gambar</p>
                            </div>
                            {{-- Preview --}}
                            <img id="create-image-preview" src="" alt="Pratinjau"
                                class="hidden absolute inset-0 w-full h-full object-cover rounded-lg">
                        </div>
                        <input type="file" name="image" id="create-image-input"
                            accept="image/jpg,image/jpeg,image/png,image/webp" class="hidden"
                            onchange="previewImage(this, 'create-image-preview', 'create-placeholder')">
                    </div>

                    {{-- Excerpt --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Ringkasan
                            <span class="font-normal text-slate-400">(ringkasan singkat)</span>
                        </label>
                        <input type="text" name="excerpt" value="{{ old('excerpt') }}"
                            placeholder="Contoh: Solusi website profesional untuk bisnis Anda" maxlength="500"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                                Jam Buka
                            </label>
                            <input type="time" name="jam_buka" value="{{ old('jam_buka') }}" placeholder="08:00"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                       text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                                Jam Tutup
                            </label>
                            <input type="time" name="jam_tutup" value="{{ old('jam_tutup') }}"
                                placeholder="17:00"
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                       text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Hari Buka
                            <span class="font-normal text-slate-400">(Contoh: Senin–Jumat atau Senin, Rabu,
                                Jumat)</span>
                        </label>
                        <input type="text" name="open_days" value="{{ old('open_days') }}"
                            placeholder="Senin–Jumat" maxlength="255"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Deskripsi
                        </label>
                        <textarea name="deskripsi" rows="4" placeholder="Deskripsikan layanan secara lengkap..."
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition resize-none">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div>
                        <label
                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                        <label class="flex items-center gap-3 cursor-pointer mt-1">
                            <div class="relative">
                                <input type="checkbox" name="is_active" value="1"
                                    {{ old('is_active', 1) ? 'checked' : '' }} class="sr-only peer">
                                <div
                                    class="w-10 h-5 bg-slate-200 rounded-full peer peer-checked:bg-primary transition-colors duration-200">
                                </div>
                                <div
                                    class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5">
                                </div>
                            </div>
                            <span class="text-sm text-slate-600 dark:text-slate-400">Aktif</span>
                        </label>
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
                <form id="form-edit" action="" method="POST" enctype="multipart/form-data"
                    class="space-y-5 hidden">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Nama Layanan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="edit-name" placeholder="Contoh: Web Development"
                            required
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    {{-- Image Upload --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Gambar
                            <span class="font-normal text-slate-400">(jpg, jpeg, png, webp — maks. 2MB)</span>
                        </label>
                        <div id="edit-dropzone" onclick="document.getElementById('edit-image-input').click()"
                            class="relative flex flex-col items-center justify-center gap-2 w-full h-36
                                   border-2 border-dashed border-slate-200 dark:border-slate-700 rounded-lg
                                   bg-slate-50 dark:bg-slate-800 cursor-pointer
                                   hover:border-primary/50 hover:bg-primary/5 transition group">
                            <div id="edit-placeholder" class="flex flex-col items-center gap-1 pointer-events-none">
                                <span
                                    class="material-symbols-outlined text-3xl text-slate-300 group-hover:text-primary transition">upload</span>
                                <p class="text-xs text-slate-400 group-hover:text-primary transition">Klik untuk ganti
                                    gambar</p>
                            </div>
                            <img id="edit-image-preview" src="" alt="Preview"
                                class="hidden absolute inset-0 w-full h-full object-cover rounded-lg">
                        </div>
                        <input type="file" name="image" id="edit-image-input"
                            accept="image/jpg,image/jpeg,image/png,image/webp" class="hidden"
                            onchange="previewImage(this, 'edit-image-preview', 'edit-placeholder')">
                        <p class="text-xs text-slate-400 mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</p>
                    </div>

                    {{-- Excerpt --}}
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Ringkasan
                            <span class="font-normal text-slate-400">(ringkasan singkat)</span>
                        </label>
                        <input type="text" name="excerpt" id="edit-excerpt"
                            placeholder="Contoh: Solusi website profesional untuk bisnis Anda" maxlength="500"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                                Jam Buka
                            </label>
                            <input type="time" name="jam_buka" id="edit-jam-buka" value=""
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                       text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                                Jam Tutup
                            </label>
                            <input type="time" name="jam_tutup" id="edit-jam-tutup" value=""
                                class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                       bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                       text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">
                            Hari Buka
                            <span class="font-normal text-slate-400">(Contoh: Senin–Jumat atau Senin, Rabu,
                                Jumat)</span>
                        </label>
                        <input type="text" name="open_days" id="edit-open-days" value=""
                            placeholder="Senin–Jumat" maxlength="255"
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition">
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label
                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Deskripsi</label>
                        <textarea name="deskripsi" id="edit-deskripsi" rows="4" placeholder="Deskripsikan layanan secara lengkap..."
                            class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700
                                   bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-50
                                   text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition resize-none"></textarea>
                    </div>

                    <div>
                        <label
                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Status</label>
                        <label class="flex items-center gap-3 cursor-pointer mt-1">
                            <div class="relative">
                                <input type="checkbox" name="is_active" id="edit-is-active" value="1"
                                    class="sr-only peer">
                                <div
                                    class="w-10 h-5 bg-slate-200 rounded-full peer peer-checked:bg-primary transition-colors duration-200">
                                </div>
                                <div
                                    class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full shadow transition-transform duration-200 peer-checked:translate-x-5">
                                </div>
                            </div>
                            <span class="text-sm text-slate-600 dark:text-slate-400">Aktif</span>
                        </label>
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
        const panel = document.getElementById('service-form-panel');
        const overlay = document.getElementById('form-overlay');

        function showForm() {
            document.getElementById('form-create').classList.remove('hidden');
            document.getElementById('form-edit').classList.add('hidden');
            document.getElementById('form-title').textContent = 'Tambah Layanan';
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
            const preview = document.getElementById(previewId);
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

        function loadEditForm(btn) {
            const id = btn.dataset.id;
            const name = btn.dataset.name;
            const excerpt = btn.dataset.excerpt;
            const deskripsi = btn.dataset.deskripsi;
            const imageUrl = btn.dataset.image;
            const isActive = btn.dataset.isActive;
            const jamBuka = btn.dataset.jamBuka;
            const jamTutup = btn.dataset.jamTutup;
            const openDays = btn.dataset.openDays;

            const baseUrl = '{{ url('admin/layanan') }}';
            document.getElementById('form-edit').action = baseUrl + '/' + id;

            document.getElementById('edit-name').value = name;
            document.getElementById('edit-excerpt').value = excerpt;
            document.getElementById('edit-jam-buka').value = jamBuka;
            document.getElementById('edit-jam-tutup').value = jamTutup;
            document.getElementById('edit-open-days').value = openDays;
            document.getElementById('edit-deskripsi').value = deskripsi; // ← BUG 1: ini yang hilang sebelumnya

            document.getElementById('edit-is-active').checked = (isActive == '1');

            const preview = document.getElementById('edit-image-preview');
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

            document.getElementById('edit-image-input').value = '';

            document.getElementById('form-create').classList.add('hidden');
            document.getElementById('form-edit').classList.remove('hidden');
            document.getElementById('form-title').textContent = 'Ubah Layanan';
            document.getElementById('form-subtitle').textContent = 'Perbarui data layanan';

            overlay.classList.remove('hidden');
            requestAnimationFrame(() => {
                overlay.classList.remove('opacity-0');
                panel.classList.remove('translate-x-full');
            });
        }

        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                showForm();
            });
        @endif
    </script>

</x-admin.app-layout>
