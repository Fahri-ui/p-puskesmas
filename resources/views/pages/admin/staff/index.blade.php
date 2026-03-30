<x-admin.app-layout>
    <div class="flex-1 overflow-y-auto p-8 bg-slate-50 dark:bg-background-dark/50">

        {{-- ── Flash Messages ─────────────────────────────────────────────── --}}
        @if (session('success'))
            <div id="alert-success"
                class="flex items-center gap-3 mb-6 px-5 py-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 rounded-xl font-semibold text-sm">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                <span>{{ session('success') }}</span>
                <button onclick="document.getElementById('alert-success').remove()" class="ml-auto">
                    <span class="material-symbols-outlined text-[18px]">close</span>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div id="alert-error"
                class="flex items-center gap-3 mb-6 px-5 py-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-400 rounded-xl font-semibold text-sm">
                <span class="material-symbols-outlined text-[20px]">error</span>
                <span>{{ session('error') }}</span>
                <button onclick="document.getElementById('alert-error').remove()" class="ml-auto">
                    <span class="material-symbols-outlined text-[18px]">close</span>
                </button>
            </div>
        @endif

        {{-- ── Page Title & CTA ────────────────────────────────────────────── --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h3 class="text-heading dark:text-slate-100 text-3xl font-black tracking-tight">Daftar Staf</h3>
                <p class="text-slate-500 mt-1 font-medium">Kelola data seluruh staf yang terdaftar.</p>
            </div>
            <button onclick="openCreateModal()"
                class="flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-xl font-bold transition-all shadow-lg shadow-primary/25">
                <span class="material-symbols-outlined text-[20px]">person_add</span>
                <span>Tambah Staf Baru</span>
            </button>
        </div>

        {{-- ── Stats Cards ─────────────────────────────────────────────────── --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined">group</span>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Total Staf</p>
                    <p class="text-heading dark:text-slate-100 text-2xl font-black">{{ $totalStaf }}</p>
                </div>
            </div>
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined">badge</span>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Halaman</p>
                    <p class="text-heading dark:text-slate-100 text-2xl font-black">{{ $staf->currentPage() }} /
                        {{ $staf->lastPage() }}</p>
                </div>
            </div>
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-amber-100 dark:bg-amber-900/30 text-amber-600 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined">format_list_numbered</span>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Ditampilkan</p>
                    <p class="text-heading dark:text-slate-100 text-2xl font-black">{{ $staf->count() }}</p>
                </div>
            </div>
        </div>

        {{-- ── Table ───────────────────────────────────────────────────────── --}}
        <div
            class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Staf</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Jabatan
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Kontak
                            </th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        @forelse ($staf as $s)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                {{-- Staf --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-full border-2 border-slate-100 dark:border-slate-700 overflow-hidden shadow-sm flex-shrink-0">
                                            @if ($s->foto)
                                                <img class="w-full h-full object-cover"
                                                    src="{{ asset($s->foto) }}" alt="{{ $s->nama }}">
                                            @else
                                                <div
                                                    class="w-full h-full bg-primary/10 flex items-center justify-center">
                                                    <span
                                                        class="material-symbols-outlined text-primary text-[22px]">person</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-heading dark:text-slate-100 font-bold text-sm">
                                                {{ $s->nama }}</p>
                                            <p class="text-slate-400 text-xs font-medium">
                                                {{ $s->nip ? 'NIP: ' . $s->nip : 'ID: ' . $s->id }}</p>
                                        </div>
                                    </div>
                                </td>
                                {{-- Jabatan --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">{{ $s->jabatan }}</span>
                                    @if ($s->profesi)
                                        <p class="text-slate-400 text-xs mt-1">{{ $s->profesi }}</p>
                                    @endif
                                </td>
                                {{-- Kontak --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col gap-1">
                                        @if ($s->telepon)
                                            <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                                <span class="material-symbols-outlined text-[14px]">call</span>
                                                <span class="text-xs font-medium">{{ $s->telepon }}</span>
                                            </div>
                                        @endif
                                        @if ($s->email)
                                            <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                                <span class="material-symbols-outlined text-[14px]">mail</span>
                                                <span class="text-xs font-medium">{{ $s->email }}</span>
                                            </div>
                                        @endif
                                        @if (!$s->telepon && !$s->email)
                                            <span class="text-xs text-slate-400">—</span>
                                        @endif
                                    </div>
                                </td>
                                {{-- Aksi --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">
                                        {{-- Detail --}}
                                        <button onclick="openDetailModal({{ $s->id }})"
                                            class="p-2 text-slate-400 hover:text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-all"
                                            title="Detail">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        {{-- Edit --}}
                                        <button onclick="openEditModal({{ $s->id }})"
                                            class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-all"
                                            title="Edit">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        {{-- Hapus --}}
                                        <button onclick="confirmDelete({{ $s->id }}, '{{ addslashes($s->nama) }}')"
                                            class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all"
                                            title="Hapus">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center gap-3 text-slate-400">
                                        <span class="material-symbols-outlined text-[48px]">group_off</span>
                                        <p class="font-semibold">Belum ada data staf.</p>
                                        <button onclick="openCreateModal()"
                                            class="text-primary font-bold text-sm hover:underline">Tambah staf
                                            pertama</button>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ── Pagination ──────────────────────────────────────────────── --}}
            <div
                class="px-6 py-4 bg-slate-50/50 dark:bg-slate-800/30 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between flex-wrap gap-3">
                <p class="text-xs font-semibold text-slate-500">
                    Menampilkan {{ $staf->firstItem() ?? 0 }} sampai {{ $staf->lastItem() ?? 0 }} dari
                    {{ $staf->total() }} entri
                </p>
                <div class="flex items-center gap-1">
                    {{-- Prev --}}
                    @if ($staf->onFirstPage())
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 text-slate-300 cursor-not-allowed">
                            <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        </span>
                    @else
                        <a href="{{ $staf->previousPageUrl() }}"
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 text-slate-400 hover:bg-white transition-all">
                            <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($staf->getUrlRange(max(1, $staf->currentPage() - 2), min($staf->lastPage(), $staf->currentPage() + 2)) as $page => $url)
                        @if ($page == $staf->currentPage())
                            <span
                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white text-xs font-bold">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}"
                                class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-600 dark:text-slate-400 text-xs font-bold hover:bg-white/50 transition-all">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($staf->hasMorePages())
                        <a href="{{ $staf->nextPageUrl() }}"
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 text-slate-400 hover:bg-white transition-all">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </a>
                    @else
                        <span
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 text-slate-300 cursor-not-allowed">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════════════
         MODAL: CREATE / EDIT
    ═══════════════════════════════════════════════════════════════════════ --}}
    <div id="modal-form"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div
            class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] flex flex-col border border-slate-200 dark:border-slate-700">

            {{-- Header --}}
            <div
                class="flex items-center justify-between px-6 py-5 border-b border-slate-200 dark:border-slate-700 flex-shrink-0">
                <h2 id="modal-form-title" class="text-heading dark:text-slate-100 text-xl font-black">Tambah Staf</h2>
                <button onclick="closeFormModal()"
                    class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-all">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            {{-- Body --}}
            <div class="overflow-y-auto flex-1 px-6 py-5">
                <form id="form-staf" method="POST" enctype="multipart/form-data" action="">
                    @csrf
                    <input type="hidden" name="_method" id="form-method" value="POST">

                    {{-- Foto Preview --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div id="foto-preview-wrap"
                            class="w-20 h-20 rounded-full border-2 border-slate-200 dark:border-slate-700 overflow-hidden flex items-center justify-center bg-slate-50 dark:bg-slate-800 flex-shrink-0">
                            <span id="foto-placeholder"
                                class="material-symbols-outlined text-slate-300 text-[36px]">person</span>
                            <img id="foto-preview" class="w-full h-full object-cover hidden" src="" alt="">
                        </div>
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Foto</label>
                            <input type="file" name="foto" id="input-foto" accept="image/*"
                                onchange="previewFoto(this)"
                                class="text-sm text-slate-600 file:mr-3 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:bg-primary/10 file:text-primary file:font-semibold hover:file:bg-primary/20 cursor-pointer">
                            <p class="text-xs text-slate-400 mt-1">JPEG, PNG, GIF. Maks 2MB.</p>
                        </div>
                    </div>

                    {{-- Grid Fields --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Nama --}}
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Nama
                                Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="nama" id="f-nama" required
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm"
                                placeholder="Nama lengkap staf">
                        </div>
                        {{-- Jabatan --}}
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Jabatan
                                <span class="text-red-500">*</span></label>
                            <input type="text" name="jabatan" id="f-jabatan" required
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm"
                                placeholder="Jabatan staf">
                        </div>
                        {{-- Profesi --}}
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Profesi</label>
                            <input type="text" name="profesi" id="f-profesi"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm"
                                placeholder="Misal: Dokter, Guru, dll">
                        </div>
                        {{-- NIP --}}
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">NIP</label>
                            <input type="text" name="nip" id="f-nip"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm"
                                placeholder="Nomor Induk Pegawai">
                        </div>
                        {{-- Jenis Kelamin --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Jenis
                                Kelamin</label>
                            <select name="jenis_kelamin" id="f-jenis_kelamin"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm">
                                <option value="">— Pilih —</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        {{-- Tanggal Lahir --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Tanggal
                                Lahir</label>
                            <input type="date" name="tanggal_lahir" id="f-tanggal_lahir"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm">
                        </div>
                        {{-- Telepon --}}
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Telepon</label>
                            <input type="text" name="telepon" id="f-telepon"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm"
                                placeholder="08xx-xxxx-xxxx">
                        </div>
                        {{-- Email --}}
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Email</label>
                            <input type="email" name="email" id="f-email"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm"
                                placeholder="email@contoh.com">
                        </div>
                        {{-- Pendidikan Terakhir --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Pendidikan
                                Terakhir</label>
                            <input type="text" name="pendidikan_terakhir" id="f-pendidikan_terakhir"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm"
                                placeholder="S1, S2, D3, dll">
                        </div>
                        {{-- Bergabung Sejak --}}
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Bergabung
                                Sejak</label>
                            <input type="date" name="bergabung_sejak" id="f-bergabung_sejak"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm">
                        </div>
                        {{-- Urutan --}}
                        <div>
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Urutan
                                <span class="text-red-500">*</span></label>
                            <input type="number" name="urutan" id="f-urutan" required min="0" value="0"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm">
                        </div>
                        {{-- Alamat --}}
                        <div class="md:col-span-2">
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Alamat</label>
                            <textarea name="alamat" id="f-alamat" rows="2"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm resize-none"
                                placeholder="Alamat lengkap"></textarea>
                        </div>
                        {{-- Deskripsi --}}
                        <div class="md:col-span-2">
                            <label
                                class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-1.5">Deskripsi</label>
                            <textarea name="deskripsi" id="f-deskripsi" rows="3"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition text-sm resize-none"
                                placeholder="Deskripsi singkat staf…"></textarea>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Footer --}}
            <div
                class="flex items-center justify-end gap-3 px-6 py-5 border-t border-slate-200 dark:border-slate-700 flex-shrink-0">
                <button onclick="closeFormModal()"
                    class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 font-semibold text-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                    Batal
                </button>
                <button onclick="document.getElementById('form-staf').submit()"
                    class="px-6 py-2.5 rounded-xl bg-primary hover:bg-primary/90 text-white font-bold text-sm shadow-lg shadow-primary/25 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    <span id="btn-submit-label">Simpan</span>
                </button>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════════════
         MODAL: DETAIL
    ═══════════════════════════════════════════════════════════════════════ --}}
    <div id="modal-detail"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div
            class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] flex flex-col border border-slate-200 dark:border-slate-700">
            <div
                class="flex items-center justify-between px-6 py-5 border-b border-slate-200 dark:border-slate-700 flex-shrink-0">
                <h2 class="text-heading dark:text-slate-100 text-xl font-black">Detail Staf</h2>
                <button onclick="closeDetailModal()"
                    class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-all">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="overflow-y-auto flex-1 px-6 py-5">
                <div id="detail-loading" class="flex items-center justify-center py-10 gap-3 text-slate-400">
                    <span class="material-symbols-outlined animate-spin text-[28px]">progress_activity</span>
                    <span class="text-sm font-semibold">Memuat data…</span>
                </div>
                <div id="detail-content" class="hidden space-y-4">
                    <div class="flex items-center gap-5">
                        <div
                            class="w-20 h-20 rounded-full border-2 border-slate-200 dark:border-slate-700 overflow-hidden flex-shrink-0">
                            <img id="d-foto" class="w-full h-full object-cover hidden" src="" alt="">
                            <div id="d-foto-fallback"
                                class="w-full h-full bg-primary/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary text-[32px]">person</span>
                            </div>
                        </div>
                        <div>
                            <p id="d-nama" class="text-heading dark:text-slate-100 text-xl font-black"></p>
                            <p id="d-jabatan" class="text-primary text-sm font-bold mt-0.5"></p>
                            <p id="d-profesi" class="text-slate-400 text-xs mt-0.5"></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 pt-2">
                        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">NIP</p>
                            <p id="d-nip" class="text-slate-700 dark:text-slate-300 text-sm font-semibold">—</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Jenis Kelamin
                            </p>
                            <p id="d-jenis_kelamin" class="text-slate-700 dark:text-slate-300 text-sm font-semibold">
                                —</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Tanggal Lahir
                            </p>
                            <p id="d-tanggal_lahir" class="text-slate-700 dark:text-slate-300 text-sm font-semibold">
                                —</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Bergabung Sejak
                            </p>
                            <p id="d-bergabung_sejak"
                                class="text-slate-700 dark:text-slate-300 text-sm font-semibold">—</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Telepon</p>
                            <p id="d-telepon" class="text-slate-700 dark:text-slate-300 text-sm font-semibold">—</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Email</p>
                            <p id="d-email" class="text-slate-700 dark:text-slate-300 text-sm font-semibold break-all">
                                —</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3 col-span-2">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Pendidikan
                                Terakhir</p>
                            <p id="d-pendidikan_terakhir"
                                class="text-slate-700 dark:text-slate-300 text-sm font-semibold">—</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3 col-span-2">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Alamat</p>
                            <p id="d-alamat" class="text-slate-700 dark:text-slate-300 text-sm font-semibold">—</p>
                        </div>
                        <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-3 col-span-2">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Deskripsi</p>
                            <p id="d-deskripsi" class="text-slate-700 dark:text-slate-300 text-sm font-semibold">—
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════════════
         MODAL: KONFIRMASI HAPUS
    ═══════════════════════════════════════════════════════════════════════ --}}
    <div id="modal-delete"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div
            class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl w-full max-w-sm border border-slate-200 dark:border-slate-700 p-6">
            <div class="flex flex-col items-center text-center gap-4">
                <div class="w-16 h-16 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-red-500 text-[32px]">delete_forever</span>
                </div>
                <div>
                    <h3 class="text-heading dark:text-slate-100 text-lg font-black">Hapus Staf?</h3>
                    <p class="text-slate-500 text-sm mt-1">Data <strong id="delete-nama" class="text-slate-700 dark:text-slate-300"></strong> akan dihapus secara permanen.</p>
                </div>
                <div class="flex gap-3 w-full mt-2">
                    <button onclick="closeDeleteModal()"
                        class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 font-semibold text-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                        Batal
                    </button>
                    <form id="form-delete" method="POST" action="" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full px-4 py-2.5 rounded-xl bg-red-500 hover:bg-red-600 text-white font-bold text-sm transition-all">
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════════════════════
         JAVASCRIPT
    ═══════════════════════════════════════════════════════════════════════ --}}
    <script>
        const ROUTES = {
            store: "{{ route('admin.staf.store') }}",
            show:  (id) => `/admin/staf/${id}`,
            edit:  (id) => `/admin/staf/${id}/edit`,
            update:(id) => `/admin/staf/${id}`,
            destroy:(id)=> `/admin/staf/${id}`,
        };

        // ─── Form Modal ────────────────────────────────────────────────────────
        function openCreateModal() {
            resetForm();
            document.getElementById('modal-form-title').textContent = 'Tambah Staf Baru';
            document.getElementById('btn-submit-label').textContent = 'Simpan';
            document.getElementById('form-staf').action = ROUTES.store;
            document.getElementById('form-method').value = 'POST';
            document.getElementById('modal-form').classList.remove('hidden');
        }

        async function openEditModal(id) {
            resetForm();
            document.getElementById('modal-form-title').textContent = 'Edit Staf';
            document.getElementById('btn-submit-label').textContent = 'Perbarui';
            document.getElementById('form-staf').action = ROUTES.update(id);
            document.getElementById('form-method').value = 'PUT';
            document.getElementById('modal-form').classList.remove('hidden');

            try {
                const res  = await fetch(ROUTES.edit(id));
                const data = await res.json();
                fillForm(data);
            } catch (e) {
                alert('Gagal memuat data staf.');
                closeFormModal();
            }
        }

        function closeFormModal() {
            document.getElementById('modal-form').classList.add('hidden');
        }

        function resetForm() {
            const form = document.getElementById('form-staf');
            form.reset();
            document.getElementById('foto-preview').classList.add('hidden');
            document.getElementById('foto-placeholder').classList.remove('hidden');
            document.getElementById('f-urutan').value = 0;
        }

        function fillForm(d) {
            const set = (id, val) => { const el = document.getElementById(id); if (el) el.value = val ?? ''; };
            set('f-nama',                d.nama);
            set('f-jabatan',             d.jabatan);
            set('f-profesi',             d.profesi);
            set('f-nip',                 d.nip);
            set('f-jenis_kelamin',       d.jenis_kelamin);
            set('f-tanggal_lahir',       d.tanggal_lahir);
            set('f-telepon',             d.telepon);
            set('f-email',               d.email);
            set('f-pendidikan_terakhir', d.pendidikan_terakhir);
            set('f-bergabung_sejak',     d.bergabung_sejak);
            set('f-alamat',              d.alamat);
            set('f-deskripsi',           d.deskripsi);
            set('f-urutan',              d.urutan ?? 0);

            if (d.foto) {
                const img = document.getElementById('foto-preview');
                img.src = '/' + d.foto;
                img.classList.remove('hidden');
                document.getElementById('foto-placeholder').classList.add('hidden');
            }
        }

        function previewFoto(input) {
            const img  = document.getElementById('foto-preview');
            const icon = document.getElementById('foto-placeholder');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => { img.src = e.target.result; img.classList.remove('hidden'); icon.classList.add('hidden'); };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // ─── Detail Modal ──────────────────────────────────────────────────────
        async function openDetailModal(id) {
            document.getElementById('modal-detail').classList.remove('hidden');
            document.getElementById('detail-loading').classList.remove('hidden');
            document.getElementById('detail-content').classList.add('hidden');

            try {
                const res  = await fetch(ROUTES.show(id));
                const d    = await res.json();
                const fill = (elId, val) => { const el = document.getElementById(elId); if (el) el.textContent = val || '—'; };

                fill('d-nama',                d.nama);
                fill('d-jabatan',             d.jabatan);
                fill('d-profesi',             d.profesi);
                fill('d-nip',                 d.nip);
                fill('d-jenis_kelamin',       d.jenis_kelamin);
                fill('d-tanggal_lahir',       d.tanggal_lahir);
                fill('d-bergabung_sejak',     d.bergabung_sejak);
                fill('d-telepon',             d.telepon);
                fill('d-email',               d.email);
                fill('d-pendidikan_terakhir', d.pendidikan_terakhir);
                fill('d-alamat',              d.alamat);
                fill('d-deskripsi',           d.deskripsi);

                const foto     = document.getElementById('d-foto');
                const fotoFb   = document.getElementById('d-foto-fallback');
                if (d.foto) {
                    foto.src = '/' + d.foto;
                    foto.classList.remove('hidden');
                    fotoFb.classList.add('hidden');
                } else {
                    foto.classList.add('hidden');
                    fotoFb.classList.remove('hidden');
                }

                document.getElementById('detail-loading').classList.add('hidden');
                document.getElementById('detail-content').classList.remove('hidden');
            } catch (e) {
                alert('Gagal memuat detail staf.');
                closeDetailModal();
            }
        }

        function closeDetailModal() {
            document.getElementById('modal-detail').classList.add('hidden');
        }

        // ─── Delete Modal ──────────────────────────────────────────────────────
        function confirmDelete(id, nama) {
            document.getElementById('delete-nama').textContent = nama;
            document.getElementById('form-delete').action = ROUTES.destroy(id);
            document.getElementById('modal-delete').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('modal-delete').classList.add('hidden');
        }

        // ─── Close on backdrop click ───────────────────────────────────────────
        ['modal-form', 'modal-detail', 'modal-delete'].forEach(id => {
            document.getElementById(id).addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                }
            });
        });
    </script>
</x-admin.app-layout>
