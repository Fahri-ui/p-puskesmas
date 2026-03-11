<x-admin.app-layout>
    <div class="flex-1 overflow-y-auto p-8 bg-slate-50 dark:bg-background-dark/50">
        <!-- Page Title & CTA -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h3 class="text-heading dark:text-slate-100 text-3xl font-black tracking-tight">Daftar Staf</h3>
                <p class="text-slate-500 mt-1 font-medium">Informasi mendalam dan kontrol hak akses karyawan.
                </p>
            </div>
            <button
                class="flex items-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-xl font-bold transition-all shadow-lg shadow-primary/25">
                <span class="material-symbols-outlined text-[20px]">person_add</span>
                <span>Tambah Staf Baru</span>
            </button>
        </div>
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined">group</span>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Total Staf</p>
                    <p class="text-heading dark:text-slate-100 text-2xl font-black">154</p>
                </div>
            </div>
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-primary/10 text-primary rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined">verified</span>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Aktif</p>
                    <p class="text-heading dark:text-slate-100 text-2xl font-black">142</p>
                </div>
            </div>
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-center gap-4">
                <div
                    class="w-12 h-12 bg-amber-100 dark:bg-amber-900/30 text-amber-600 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined">pending_actions</span>
                </div>
                <div>
                    <p class="text-slate-500 text-sm font-semibold uppercase tracking-wider">Cuti/Libur</p>
                    <p class="text-heading dark:text-slate-100 text-2xl font-black">12</p>
                </div>
            </div>
        </div>
        <!-- Table Container -->
        <div
            class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">
                                Staf</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">
                                Jabatan</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">
                                Kontak</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        <!-- Data Row 1 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-full border-2 border-slate-100 dark:border-slate-700 overflow-hidden shadow-sm">
                                        <img class="w-full h-full object-cover"
                                            data-alt="Photo of Budi Santoso"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAr6wuXg0jak6aQy4PjIEEvssEUlMi7G-6KusRctc5pUv6EdkzWTDz97Mt8I75rNbobx48DX7tk3H8IGuhVWgzZrlq5sgzIALketxB8Ya63i0oNq2_uS8IWDXDlhHsIuSdGrNCvjb1jf3wgTAkbllC8tl8u5o0h-AtFzbzF6qN4v9ejuo20L7H4cTYYYtJAai39HyUR2-ioC3STrGLv1U_1K4FtHcG-7_cbEEz8XxMKkJJI1AJj7W6o5CUgIzWq7iyA1wL28q4b3E4" />
                                    </div>
                                    <div>
                                        <p class="text-heading dark:text-slate-100 font-bold text-sm">Budi
                                            Santoso</p>
                                        <p class="text-slate-400 text-xs font-medium">ID: STF-001</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">Manajer
                                    Operasional</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">call</span>
                                        <span class="text-xs font-medium">0812-3456-7890</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">mail</span>
                                        <span class="text-xs font-medium">budi.s@company.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-all"
                                        title="Detail">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-all"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all"
                                        title="Hapus">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Data Row 2 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-full border-2 border-slate-100 dark:border-slate-700 overflow-hidden shadow-sm">
                                        <img class="w-full h-full object-cover"
                                            data-alt="Photo of Siti Aminah"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAMM7voLINtnPswVduVrBhRqkCd-a_fNwa-5pdEloKMDuIqEC6ppQlBa0FUHHgND3XmN8jH1MLBFduKITZg-S6x770QhRBN6_bI5z2FKX7WdtBpOBg3_LYmFlLbHfbIm246RTq9dPlf4CYUW1iROUubajJXDhsuHFeJ8LhM1mPLZihY2s0TC81P9TbzNMoFQ7mDRpxvboz1-U1TZKQPgC90qB7JPuigGSyvMxBeb1H5yNAzKFfdoRGdODB5SrUop4ogcGVhgRdAuxQ" />
                                    </div>
                                    <div>
                                        <p class="text-heading dark:text-slate-100 font-bold text-sm">Siti
                                            Aminah</p>
                                        <p class="text-slate-400 text-xs font-medium">ID: STF-002</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-bold rounded-full">Staff
                                    HRD</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">call</span>
                                        <span class="text-xs font-medium">0823-4567-8901</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">mail</span>
                                        <span class="text-xs font-medium">siti.a@company.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-all"
                                        title="Detail">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-all"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all"
                                        title="Hapus">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Data Row 3 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-full border-2 border-slate-100 dark:border-slate-700 overflow-hidden shadow-sm">
                                        <img class="w-full h-full object-cover"
                                            data-alt="Photo of Agus Prayitno"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD5ADkPJQsJe8KTXsK3fvPzWXD1Ae9iTdJ6CSRLmbVEglICNADsXJf8JljwQqpj9frp8iWLE_MEKMqGvQuV1bZemvQMFrYY9VWlin0EQfFdqIbr9vYbVlRtWh4aXW0IdV364vviZFo2HgrjBQqLP0UGHprdIHhPVk5uDFyVAjt3XZ2QwyliJFYfd64-8C-ybCGetycpQtyUxGhsHsJQKAzjqKCRCIU4raor0LagpcikCQVFK4lIclFEqexvBw-m0v6eaBT36dM7wNY" />
                                    </div>
                                    <div>
                                        <p class="text-heading dark:text-slate-100 font-bold text-sm">Agus
                                            Prayitno</p>
                                        <p class="text-slate-400 text-xs font-medium">ID: STF-003</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-bold rounded-full">IT
                                    Support</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">call</span>
                                        <span class="text-xs font-medium">0834-5678-9012</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">mail</span>
                                        <span class="text-xs font-medium">agus.p@company.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-all"
                                        title="Detail">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-all"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all"
                                        title="Hapus">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Data Row 4 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-full border-2 border-slate-100 dark:border-slate-700 overflow-hidden shadow-sm">
                                        <img class="w-full h-full object-cover"
                                            data-alt="Photo of Dewi Lestari"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD_JIViuYCY56u7oeWaAt0dbhQl3Cv8l_yt93mxmddYO-nFjAxxhAVOwXc5Q3U1BtuWo3Z-IFPhd2Sexk-yPD6OJpAz4tJcf7xxM_wbb6HAO5JAuDGMBU0JOO30GMC7c47aEoWXdU3zciy-HxbJ4XfdNr7WO9DvgJK5CdxAKkqQ2_drV5dEBHVyR-fMRD1AlH13GGkKqUr1Y5IhgJ1UaDY72Vg-XLS_yJAsJb5_33So1u0Ccm4PUt-6Qk64Zi_9qmkP0EnZJyax0w8" />
                                    </div>
                                    <div>
                                        <p class="text-heading dark:text-slate-100 font-bold text-sm">Dewi
                                            Lestari</p>
                                        <p class="text-slate-400 text-xs font-medium">ID: STF-004</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-bold rounded-full">Marketing
                                    Specialist</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">call</span>
                                        <span class="text-xs font-medium">0845-6789-0123</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">mail</span>
                                        <span class="text-xs font-medium">dewi.l@company.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-all"
                                        title="Detail">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-all"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all"
                                        title="Hapus">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Data Row 5 -->
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap border-b-0">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-full border-2 border-slate-100 dark:border-slate-700 overflow-hidden shadow-sm">
                                        <img class="w-full h-full object-cover" data-alt="Photo of Eko Wijaya"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCy9f9XfLICFoKo1OgoB0tq4FDby0yvHeNyNem62U_3BUx5eEZ8rdTQj3bgrU2khz1DLytFOyFDTGbXw2wUzGy_l7ciJFHlqXZ0VtznuEuB00_LiQ92MJ8tiFhjSaaUUjuxh2B26Bgm7FwE0CDMYRu4vZ4Pl24LInsnvrE6eENe52nzMwrVPCEFs4rEB8BntvBK79wxajQUprBhGFEbZMMShuIVjk-aPbGc1Vvu3_uqznm0tdLkJVa_P7GefyrxeXBAXanIS4C81M" />
                                    </div>
                                    <div>
                                        <p class="text-heading dark:text-slate-100 font-bold text-sm">Eko
                                            Wijaya</p>
                                        <p class="text-slate-400 text-xs font-medium">ID: STF-005</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b-0">
                                <span
                                    class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-bold rounded-full">Financial
                                    Analyst</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap border-b-0">
                                <div class="flex flex-col gap-1">
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">call</span>
                                        <span class="text-xs font-medium">0856-7890-1234</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-slate-600 dark:text-slate-400">
                                        <span class="material-symbols-outlined text-[14px]">mail</span>
                                        <span class="text-xs font-medium">eko.w@company.com</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center border-b-0">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="p-2 text-slate-400 hover:text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition-all"
                                        title="Detail">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-primary hover:bg-primary/10 rounded-lg transition-all"
                                        title="Edit">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button
                                        class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all"
                                        title="Hapus">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div
                class="px-6 py-4 bg-slate-50/50 dark:bg-slate-800/30 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
                <p class="text-xs font-semibold text-slate-500">Menampilkan 1 sampai 5 dari 154 entri</p>
                <div class="flex items-center gap-1">
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 text-slate-400 hover:bg-white transition-all">
                        <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                    </button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white text-xs font-bold">1</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-600 dark:text-slate-400 text-xs font-bold hover:bg-white/50 transition-all">2</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg text-slate-600 dark:text-slate-400 text-xs font-bold hover:bg-white/50 transition-all">3</button>
                    <button
                        class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 dark:border-slate-700 text-slate-400 hover:bg-white transition-all">
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>