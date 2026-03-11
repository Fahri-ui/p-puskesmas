<x-admin.app-layout>

    <!-- Page Body -->
    <div class="p-4 sm:p-6 lg:p-8 space-y-6 lg:space-y-8 max-w-7xl mx-auto w-full">
        <!-- Page Title Area -->
        <div class="flex items-end justify-between">
            <div>
                <h1 class="text-3xl font-black text-heading dark:text-slate-100 tracking-tight">Manajemen Berita
                </h1>
                <p class="text-slate-500 mt-1">Kelola publikasi, sunting konten, dan unggah media berita.</p>
            </div>
            <button
                class="bg-primary text-white px-6 py-2.5 rounded-lg font-bold text-sm flex items-center gap-2 hover:bg-primary/90 shadow-sm transition-all active:scale-95">
                <span class="material-symbols-outlined">add</span>
                Buat Berita Baru
            </button>
        </div>
        <!-- Tabs -->
        <div class="border-b border-slate-200 dark:border-slate-800">
            <nav class="flex gap-8 overflow-x-auto whitespace-nowrap scrollbar-hide">
                <a class="border-b-2 border-primary py-3 px-1 text-sm font-bold text-primary" href="#">Semua
                    Berita</a>
                <a class="border-b-2 border-transparent py-3 px-1 text-sm font-medium text-slate-500 hover:text-slate-700"
                    href="#">Published</a>
                <a class="border-b-2 border-transparent py-3 px-1 text-sm font-medium text-slate-500 hover:text-slate-700"
                    href="#">Draft</a>
                <a class="border-b-2 border-transparent py-3 px-1 text-sm font-medium text-slate-500 hover:text-slate-700"
                    href="#">Terjadwal</a>
            </nav>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-8 items-start">
            <!-- Table Section -->
            <div class="xl:col-span-12">
                <div
                    class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left whitespace-nowrap">
                            <thead
                                class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                                <tr>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        Judul Berita</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        Kategori</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        Status</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        Tanggal Rilis</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 whitespace-normal min-w-[300px]">
                                        <div class="flex items-center gap-3 w-full sm:w-auto">
                                            <div
                                                class="size-10 rounded bg-slate-200 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                                <img alt="News" class="w-full h-full object-cover"
                                                    data-alt="Stock market growth chart on screen"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcCC_MyxSvzu3dRi5OZnD-tOWMZkqrQB0aVq3dIQ8D1EOFhAyt9fhAuSfS8NEHyBQSgxaf0lRDr3zihtgapkypvpeWGteugjQFNX9AjYf7d5q_BhVdtjent4nb275tTypBUQwM7xj-gxgrvprOcD_sYJk3zwnf38c8sOwm3bgH4DxOuhIIQbY0oEb3E-33Cj9-KmqIGt77V2yAFckYG00AZvCRPhj2PxBJNBc5VP-o07WL6xZwAdQfSUV0WjTsRrTodpYmP56Bow" />
                                            </div>
                                            <span
                                                class="text-sm font-semibold text-heading dark:text-slate-200 line-clamp-2">Inovasi
                                                Ekonomi Digital: Langkah Menuju 2025</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-medium rounded-full">Bisnis</span>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400"><span
                                                class="size-1.5 rounded-full bg-green-600"></span>Published</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-500">24 Okt 2023, 14:30</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 whitespace-normal min-w-[300px]">
                                        <div class="flex items-center gap-3 w-full sm:w-auto">
                                            <div
                                                class="size-10 rounded bg-slate-200 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                                <img alt="News" class="w-full h-full object-cover"
                                                    data-alt="Close up of a medical professional"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCpuuu-SKsSJ8BbjQ6Qbp69MCbcVHbZE3uR7YqbZ26xv88ov77eFucSeWKt8T7bj0SCVrspluRYr8WcvVPy1i-DAKwQvaCseZAqyDBjd1t8E4OSdYZNM7HPexQo_ehZgvOycglPhEKPrE69KEVCgv4jwcklo_KXCZuQJTK3Vmp8R7jBBKfZKeVEFQ8sxEYLaotVMuKNq04w8MoE3pPPnOaWtnvStILZodRmemW2vZ_2Uwr6UiXxZQd2Hb2BxjUt6UjrvBBgE7tgBQ" />
                                            </div>
                                            <span
                                                class="text-sm font-semibold text-heading dark:text-slate-200 line-clamp-2">Protokol
                                                Kesehatan Terbaru di Musim Hujan</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-medium rounded-full">Kesehatan</span>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400"><span
                                                class="size-1.5 rounded-full bg-yellow-600"></span>Draft</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 whitespace-normal min-w-[300px]">
                                        <div class="flex items-center gap-3 w-full sm:w-auto">
                                            <div
                                                class="size-10 rounded bg-slate-200 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                                <img alt="News" class="w-full h-full object-cover"
                                                    data-alt="Modern robot arm technology"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBZCGMIVEfehI5j0rCEvMFrRHNEc1GHY9PNJEP5xK0I8UX54GoFS390ghUnmC3lJ7VPbtsOEENbtseq2fwJn5c54Yu9CWNRVC5B6gQZsEHkw6ToVGb_Bls3NyVzFAqg78zrLhiNcgcsJD5Js6Cjab21ZhZLY2Yw39Uys4NBxMSwcrI26E2pmRcuQhU57h4-uZAaHDnLPRj_vVfCMJCAhQ75Twx48t0yTdI9vDGOBzl_jMXKElN-8iWNxkMTm6qvNxBN-Aqp57OEg" />
                                            </div>
                                            <span
                                                class="text-sm font-semibold text-heading dark:text-slate-200 line-clamp-2">AI
                                                vs Tenaga Kerja: Peluang atau Ancaman?</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-medium rounded-full">Teknologi</span>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400"><span
                                                class="size-1.5 rounded-full bg-green-600"></span>Published</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-500">22 Okt 2023, 10:00</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 whitespace-normal min-w-[300px]">
                                        <div class="flex items-center gap-3 w-full sm:w-auto">
                                            <div
                                                class="size-10 rounded bg-slate-200 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                                <img alt="News" class="w-full h-full object-cover"
                                                    data-alt="Soccer player on field stadium"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYzfU3mHcMB2T8w__JN2qegq8Fmo9u4sMIUlzn7Cazcyg8YpSqYeMRNQlGU0C0rtkblmnDd_yicwpZKesqN8mA-Ak3RksUb-zmoCzAVRAKwMNZOnba3E0s1fKV4YyIak10Yp1zoxjYAAnPD6Vj_E6yuyXXOgQNiVwIFVHZbXcg7ecCqDxiAqKLAZBIYNyNGS4vZxi2FO0XmwChLyJ0bESIECaHDQCYg1h7FL7_gM1ArUeIZnPVPGH7KT39LO3IiqgxqEPvnoNj3Q" />
                                            </div>
                                            <span
                                                class="text-sm font-semibold text-heading dark:text-slate-200 line-clamp-2">Rekapitulasi
                                                Liga Champion: Derby Malam Ini</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-medium rounded-full">Olahraga</span>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400"><span
                                                class="size-1.5 rounded-full bg-green-600"></span>Published</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-500">21 Okt 2023, 08:00</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4 whitespace-normal min-w-[300px]">
                                        <div class="flex items-center gap-3 w-full sm:w-auto">
                                            <div
                                                class="size-10 rounded bg-slate-200 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                                <img alt="News" class="w-full h-full object-cover"
                                                    data-alt="Scenic mountain landscape with lake"
                                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZNVQ0lOjYhlG_0VOo79SAHGRvYFywWP6_z3qiXiGb6rw7zSb9meoKH-xxoycl4cFHqePpOmEImYzWDydtAH5dR5wOwqflRi5xUJSquro9BF7qpqx8wW9qawN-T_zhILii6Ln_8V0BXt7uDm6_rnGWcDnQFHu7kz_FHRPZGTb-BJa5cGp78CogPP-Bvd9JnFgqzuVXOCC9iDlsmbWJm8PB05UvbCEJlg4cRwezN0dw1BaCNNVbuJkwZIiEEd55_Em5K7PvOxZb1Q" />
                                            </div>
                                            <span
                                                class="text-sm font-semibold text-heading dark:text-slate-200 line-clamp-2">Destinasi
                                                Liburan Akhir Tahun Paling Irit</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-medium rounded-full">Wisata</span>
                                    </td>
                                    <td class="px-6 py-4"><span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400"><span
                                                class="size-1.5 rounded-full bg-yellow-600"></span>Draft</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-500">-</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="p-2 text-slate-400 hover:text-primary transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">edit</span></button>
                                        <button class="p-2 text-slate-400 hover:text-red-500 transition-colors"><span
                                                class="material-symbols-outlined text-[20px]">delete</span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="px-6 py-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
                        <span class="text-xs text-slate-500">Menampilkan 5 dari 128 berita</span>
                        <div class="flex gap-2">
                            <button
                                class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium hover:bg-slate-50 transition-colors">Previous</button>
                            <button class="px-3 py-1 bg-primary text-white rounded text-xs font-medium">1</button>
                            <button
                                class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium hover:bg-slate-50 transition-colors">2</button>
                            <button
                                class="px-3 py-1 border border-slate-200 dark:border-slate-700 rounded text-xs font-medium hover:bg-slate-50 transition-colors">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Editor/Form Section -->
            <div class="xl:col-span-12">
                <div
                    class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-4 sm:p-8 shadow-sm">
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-4 border-b border-slate-100 dark:border-slate-800">
                        <h3 class="text-xl font-bold text-heading dark:text-slate-100 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">edit_note</span>
                            Edit / Buat Berita
                        </h3>
                        <div class="flex gap-3 w-full sm:w-auto">
                            <button
                                class="px-6 py-2 border border-slate-300 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-lg text-sm font-bold hover:bg-slate-50 transition-colors flex-1 sm:flex-none">Simpan
                                Draft</button>
                            <button
                                class="px-6 py-2 bg-primary text-white rounded-lg text-sm font-bold hover:bg-primary/90 transition-colors flex-1 sm:flex-none">Publikasikan</button>
                        </div>
                    </div>
                    <form class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Main Info -->
                        <div class="lg:col-span-2 space-y-6">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Judul
                                    Berita</label>
                                <input
                                    class="w-full px-4 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none"
                                    placeholder="Masukkan judul yang menarik..." type="text" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Konten
                                    Berita</label>
                                <div class="rounded-lg border border-slate-200 dark:border-slate-700 overflow-hidden">
                                    <div
                                        class="bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 px-3 py-2 flex gap-4 text-slate-500">
                                        <span
                                            class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">format_bold</span>
                                        <span
                                            class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">format_italic</span>
                                        <span
                                            class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">format_underlined</span>
                                        <span
                                            class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">format_list_bulleted</span>
                                        <span
                                            class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">link</span>
                                        <span
                                            class="material-symbols-outlined text-[18px] cursor-pointer hover:text-primary">image</span>
                                    </div>
                                    <textarea class="w-full px-4 py-3 h-80 bg-white dark:bg-slate-900 text-sm focus:outline-none border-none resize-none"
                                        placeholder="Mulai menulis berita di sini..."></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Side Options -->
                        <div
                            class="space-y-6 bg-slate-50 dark:bg-slate-800/50 p-6 rounded-xl border border-slate-200 dark:border-slate-700">
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-bold text-slate-700 dark:text-slate-300">Kategori</label>
                                    <select
                                        class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none">
                                        <option>Pilih Kategori</option>
                                        <option>Bisnis</option>
                                        <option>Teknologi</option>
                                        <option>Kesehatan</option>
                                        <option>Olahraga</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Status
                                        Publikasi</label>
                                    <select
                                        class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none">
                                        <option>Published</option>
                                        <option>Draft</option>
                                        <option>Pending</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Tanggal
                                        Publikasi</label>
                                    <input
                                        class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-sm focus:ring-1 focus:ring-primary outline-none"
                                        type="date" />
                                </div>
                            </div>
                            <!-- Dual Image Upload -->
                            <div class="space-y-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Thumbnail
                                        Berita (1:1)</label>
                                    <div
                                        class="border-2 border-dashed border-slate-300 dark:border-slate-700 rounded-lg p-4 bg-white dark:bg-slate-900 flex flex-col items-center justify-center text-center">
                                        <div
                                            class="size-16 bg-slate-100 dark:bg-slate-800 rounded flex items-center justify-center mb-2">
                                            <span class="material-symbols-outlined text-slate-400">add_a_photo</span>
                                        </div>
                                        <p class="text-[10px] text-slate-500 uppercase font-bold tracking-widest">
                                            Klik untuk unggah</p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700 dark:text-slate-300">Gambar
                                        Utama (16:9)</label>
                                    <div
                                        class="relative group border-2 border-dashed border-slate-300 dark:border-slate-700 rounded-lg h-32 bg-slate-100 dark:bg-slate-900 overflow-hidden flex flex-col items-center justify-center">
                                        <img alt="Preview"
                                            class="absolute inset-0 w-full h-full object-cover opacity-50"
                                            data-alt="Blue and purple abstract gradient background"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvSB3S0a2xpA7jGZqr5b8zz5FURishcZaTOCNBFtOcS_6a_8Tz8wBLkEza935lHfdfoN2k4Yruc_LWaXifkNTOGAKZ4GhHeoOE5-TMY7NPXqXTqLwrrf37-TZDCisI8ew-1vcsRwKVcwfByG0SiHhR2-iCn8CP5GDhMqqoNLOWyydwwif9gGstiRsPgc-aAqiboFE93okitbyf_O-qdEaDsg6Y6S9ISEfOkhsSSETqmrB6jDGGFV1sihtSJGCnna39KOJ7-mPmSw" />
                                        <div class="relative z-10 text-center">
                                            <span
                                                class="material-symbols-outlined text-heading dark:text-slate-200">upload_file</span>
                                            <p class="text-xs font-bold text-heading dark:text-slate-200">Ubah
                                                Gambar</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
