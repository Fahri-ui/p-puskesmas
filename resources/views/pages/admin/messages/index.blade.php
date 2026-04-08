<x-admin.app-layout>
    <div class="min-h-screen bg-white px-6 py-8">

        {{-- Page Header --}}
        <div class="mb-8 border-b border-gray-100 pb-5">
            <p class="text-xs font-semibold uppercase tracking-widest mb-1" style="color: #349953;">
                Manajemen Pesan
            </p>
            <div class="flex items-end justify-between">
                <h1 class="text-2xl font-bold text-gray-800">Pesan Masuk</h1>
                <span class="text-sm text-gray-400">
                    Total {{ $messages->total() }} pesan
                </span>
            </div>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium"
                 style="background-color: #e8f5ec; color: #349953;">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Empty State --}}
        @if ($messages->isEmpty())
            <div class="flex flex-col items-center justify-center py-24 text-center">
                <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4"
                     style="background-color: #e8f5ec;">
                    <svg class="w-6 h-6" style="color: #349953;" fill="none" stroke="currentColor"
                         stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
                <p class="text-gray-500 text-sm">Belum ada pesan masuk saat ini.</p>
            </div>

        {{-- Message Cards --}}
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
                @foreach ($messages as $message)
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm
                                flex flex-col overflow-hidden
                                transition-shadow duration-200 hover:shadow-md">

                        {{-- Card Top Accent --}}
                        <div class="h-1 w-full" style="background-color: #349953;"></div>

                        <div class="p-5 flex flex-col gap-4 flex-1">

                            {{-- Header: Nama & Status --}}
                            <div class="flex items-start justify-between gap-2">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full flex items-center justify-center
                                                text-white text-sm font-bold shrink-0"
                                         style="background-color: #349953;">
                                        {{ strtoupper(substr($message->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800 leading-tight">
                                            {{ $message->name }}
                                        </p>
                                        <p class="text-xs text-gray-400 mt-0.5">
                                            {{ $message->email }}
                                        </p>
                                    </div>
                                </div>

                                @php
                                    $badgeStyle = match($message->status) {
                                        'unread' => 'background-color: #fff8e1; color: #b45309;',
                                        'read'   => 'background-color: #e8f5ec; color: #349953;',
                                        'spam'   => 'background-color: #fef2f2; color: #dc2626;',
                                        default  => 'background-color: #f3f4f6; color: #6b7280;',
                                    };
                                @endphp
                                <span class="text-xs font-medium px-2.5 py-1 rounded-full shrink-0"
                                      style="{{ $badgeStyle }}">
                                    {{ ucfirst($message->status) }}
                                </span>
                            </div>

                            <hr class="border-gray-100">

                            {{-- Subjek --}}
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 mb-1">
                                    Subjek
                                </p>
                                <p class="text-sm font-medium text-gray-700">
                                    {{ $message->subject }}
                                </p>
                            </div>

                            {{-- Isi Pesan --}}
                            <div class="flex-1">
                                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 mb-1">
                                    Pesan
                                </p>
                                <p class="text-sm text-gray-600 leading-relaxed line-clamp-4">
                                    {{ $message->message }}
                                </p>
                            </div>

                            {{-- Footer: Tanggal & Tombol Delete --}}
                            <div class="flex items-center justify-between pt-1">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor"
                                         stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
                                    </svg>
                                    <span class="text-xs text-gray-400">
                                        {{ $message->created_at->format('d M Y, H:i') }}
                                    </span>
                                </div>

                                {{-- Tombol Delete --}}
                                <form action="{{ route('admin.messages.destroy', $message->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="flex items-center gap-1.5 text-xs font-medium
                                                   text-red-400 hover:text-red-600
                                                   transition-colors duration-150">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 00-1-1h-4a1 1 0 00-1 1m-4 0h10" />
                                        </svg>
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8 flex justify-center">
                {{ $messages->links() }}
            </div>
        @endif

    </div>
</x-admin.app-layout>
