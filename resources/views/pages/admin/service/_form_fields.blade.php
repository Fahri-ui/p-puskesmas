<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    {{-- ============ LEFT: Primary Details ============ --}}
    <div class="lg:col-span-2 space-y-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Nama Layanan --}}
            <div class="space-y-1">
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">
                    Service Name<span class="text-red-500">*</span>
                </label>
                <input
                    class="w-full bg-primary/5 border border-primary/10 rounded-lg px-3 py-2 focus:ring-1 focus:ring-primary focus:border-primary transition-all text-sm @error('nama_layanan') border-red-400 @enderror"
                    type="text"
                    name="nama_layanan"
                    placeholder="Nama layanan..."
                    value="{{ old('nama_layanan') }}" />
                @error('nama_layanan')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="space-y-1">
            <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Deskripsi</label>
            <textarea
                class="w-full bg-primary/5 border border-primary/10 rounded-lg px-3 py-2 focus:ring-1 focus:ring-primary focus:border-primary transition-all text-sm resize-none @error('deskripsi') border-red-400 @enderror"
                name="deskripsi"
                placeholder="Deskripsi singkat layanan ini..."
                rows="5">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

    </div>

    {{-- ============ RIGHT: Settings ============ --}}
    <div class="space-y-6">

        {{-- Sort Order --}}
        <div class="space-y-1">
            <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">
                Sort Order <span class="text-red-500">*</span>
            </label>
            <input
                class="w-full bg-primary/5 border border-primary/10 rounded-lg px-3 py-2 focus:ring-1 focus:ring-primary focus:border-primary transition-all text-sm @error('urutan') border-red-400 @enderror"
                type="number"
                name="urutan"
                min="0"
                placeholder="1"
                value="{{ old('urutan', 1) }}" />
            @error('urutan')
                <p class="text-red-500 text-xs">{{ $message }}</p>
            @enderror
        </div>

        {{-- Status Aktif --}}
        <div class="space-y-1">
            <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Status</label>
            <div class="flex items-center gap-3 px-4 py-3 bg-primary/5 border border-primary/10 rounded-lg">
                <input
                    type="checkbox"
                    name="aktif"
                    id="aktif-toggle"
                    value="1"
                    class="w-4 h-4 text-primary rounded border-primary/20 focus:ring-primary"
                    {{ old('aktif', true) ? 'checked' : '' }} />
                <label for="aktif-toggle" class="text-sm text-slate-600 dark:text-slate-300 cursor-pointer">
                    Aktifkan layanan ini
                </label>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="pt-4 flex items-center gap-3">
            <button
    type="button"
    onclick="submitServiceForm()"
    class="flex-1 px-4 py-2 bg-primary text-white font-bold rounded-lg hover:bg-primary/90 transition-all text-sm">
    Save Service
</button>
            {{-- <button
                type="button"
                onclick="hideForm()"
                class="px-4 py-2 border border-slate-200 text-slate-500 font-bold rounded-lg hover:bg-slate-50 transition-all text-sm">
                Discard
            </button> --}}
        </div>

    </div>
</div>

