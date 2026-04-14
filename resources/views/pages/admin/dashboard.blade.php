<x-admin.app-layout>
    <div class="p-8 space-y-8">
        <!-- Stat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div
                class="bg-white dark:bg-background-dark border border-slate-100 dark:border-slate-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Layanan</p>
                        <h3 class="text-3xl font-bold mt-1">12</h3>
                    </div>
                    <div class="p-3 bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">settings_suggest</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-medium text-emerald-600">
                    <span class="material-symbols-outlined text-sm mr-1">trending_up</span>
                    <span>+4% from last month</span>
                </div>
            </div>
            <div
                class="bg-white dark:bg-background-dark border border-slate-100 dark:border-slate-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Staf</p>
                        <h3 class="text-3xl font-bold mt-1">45</h3>
                    </div>
                    <div class="p-3 bg-blue-500/10 rounded-lg text-blue-600">
                        <span class="material-symbols-outlined">group</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-medium text-slate-400">
                    <span class="material-symbols-outlined text-sm mr-1">horizontal_rule</span>
                    <span>Tidak ada perubahan</span>
                </div>
            </div>
            <div
                class="bg-white dark:bg-background-dark border border-slate-100 dark:border-slate-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Berita</p>
                        <h3 class="text-3xl font-bold mt-1">89</h3>
                    </div>
                    <div class="p-3 bg-amber-500/10 rounded-lg text-amber-600">
                        <span class="material-symbols-outlined">article</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-medium text-emerald-600">
                    <span class="material-symbols-outlined text-sm mr-1">trending_up</span>
                    <span>+12 baru minggu ini</span>
                </div>
            </div>
            <div
                class="bg-white dark:bg-background-dark border border-slate-100 dark:border-slate-800 p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Gallery</p>
                        <h3 class="text-3xl font-bold mt-1">56</h3>
                    </div>
                    <div class="p-3 bg-purple-500/10 rounded-lg text-purple-600">
                        <span class="material-symbols-outlined">collections</span>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-medium text-emerald-600">
                    <span class="material-symbols-outlined text-sm mr-1">add_circle</span>
                    <span>+5 pembaruan baru</span>
                </div>
            </div>
        </div>
        <!-- Charts and Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column: System Activity -->
            <div
                class="lg:col-span-5 bg-white dark:bg-background-dark border border-slate-100 dark:border-slate-800 rounded-xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="font-bold text-lg">Aktivitas Sistem</h2>
                    <select class="text-xs bg-slate-50 dark:bg-slate-800 border-none rounded-lg focus:ring-primary">
                        <option>7 Hari Terakhir</option>
                        <option>30 Hari Terakhir</option>
                    </select>
                </div>
                <div class="space-y-6">
                    <div class="relative pl-8 pb-6 border-l-2 border-slate-100 dark:border-slate-800 last:border-0">
                        <div
                            class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-primary border-4 border-white dark:border-background-dark">
                        </div>
                        <p class="text-sm font-bold">Staf Baru Terdaftar</p>
                        <p class="text-xs text-slate-500 mt-1">2 jam lalu • Oleh Administrator</p>
                    </div>
                    <div class="relative pl-8 pb-6 border-l-2 border-slate-100 dark:border-slate-800 last:border-0">
                        <div
                            class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-amber-500 border-4 border-white dark:border-background-dark">
                        </div>
                        <p class="text-sm font-bold">Pemeliharaan Sistem Selesai</p>
                        <p class="text-xs text-slate-500 mt-1">5 jam lalu • Sistem</p>
                    </div>
                    <div class="relative pl-8 pb-6 border-l-2 border-slate-100 dark:border-slate-800 last:border-0">
                        <div
                            class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-blue-500 border-4 border-white dark:border-background-dark">
                        </div>
                        <p class="text-sm font-bold">Layanan Baru "Cloud Storage" Ditambahkan</p>
                        <p class="text-xs text-slate-500 mt-1">Kemarin • Manajer Konten</p>
                    </div>
                    <div class="relative pl-8 pb-6 border-l-2 border-slate-100 dark:border-slate-800 last:border-0">
                        <div
                            class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-slate-400 border-4 border-white dark:border-background-dark">
                        </div>
                        <p class="text-sm font-bold">Arsip Galeri Dibuat</p>
                        <p class="text-xs text-slate-500 mt-1">2 hari lalu • Pengguna Staf</p>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <button
                        class="w-full py-2 text-sm text-primary font-medium hover:bg-primary/5 rounded-lg transition-colors">
                        Lihat Semua Aktivitas
                    </button>
                </div>
            </div>
            <!-- Right Column: Recent News Table -->
            <div
                class="lg:col-span-7 bg-white dark:bg-background-dark border border-slate-100 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
                <div class="p-6 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
                    <h2 class="font-bold text-lg">Berita Terbaru</h2>
                    <button class="text-sm text-primary font-medium hover:underline">Kelola Semua</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead
                            class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 text-xs uppercase tracking-wider">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Judul</th>
                                <th class="px-6 py-4 font-semibold">Tanggal</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded bg-slate-100 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                            <img alt="News" data-alt="News thumbnail of a newspaper"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDg8INfOyIqKKZkuIu2N7FFifJtJ043S0_qC8AUrmxUDsu5WPFG1ax2k738FN3GVR9CpyS8UpH7zSoG1LlA6eJH9YyJKw026T6grj6slt8V63AugjLisomfz1lxH7zRRa1ZDTzbFFw87ADZ3-DZFmYOGAPUH2ESxRjeWS2CBTVXZewHSOothC3Pb2Qy2UirlDp1xkPLZXj4lU_5ycHn4EWSaZcdr9WnxTNKCTJiMTQtc-fILpid8m2ahnDBzwIAzAdoOnwUnsPnwWI" />
                                        </div>
                                        <span class="text-sm font-medium line-clamp-1">Laporan Kinerja Sistem Tahunan 2024</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                    Oct 12, 2024</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-[10px] font-bold uppercase bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Dipublikasikan</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-primary"><span
                                            class="material-symbols-outlined text-lg">edit</span></button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded bg-slate-100 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                            <img alt="News" data-alt="News thumbnail of digital world"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBTykvJz3QjwO0DEyHtuVh7e4TsGOtwdERg2X87ebhPnFWr8cp5u4BWCP5AgjXA3ItNjKhVIuV3JXmvKaNPjUzQfGYH3JiVyUCXzl8cy9BYocRgERtfL36aIaRqTPmTgsvPzMY8-Nbp-XdN7FKYybLMR_S7ZqAO1LvzkFKhhAe93W5j9BYdlmBbOU1xQuKPnQwMqMi2E9mzLUkREoUSQ-fFyJcEnnSHa8QqWXNspZgtgZuAw-dj11dpqx0XWL7yi4Kg4S--6kqKmWc" />
                                        </div>
                                        <span class="text-sm font-medium line-clamp-1">Implementasi Protokol Keamanan Baru</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                    Oct 10, 2024</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-[10px] font-bold uppercase bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">Draf</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-primary"><span
                                            class="material-symbols-outlined text-lg">edit</span></button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded bg-slate-100 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                            <img alt="News" data-alt="News thumbnail of team meeting"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGt1-cyK6R99odcemalEoSFqCj9n5oeHG0Y--qn3Wxy1LjcVhTYbtg2PWh2OBaUQVTcD-0BBP_pVXvUeVoJrQYCqD5D8GMBX7W0oGnWNuZc9P9x0vn5yKutx--8y9qO_22WqGbZstdFoOUEnKWqGf657-oioP8qufCGdbIjd0Om4TZsWNgV6D2xClS8rOWqOlrqfH6f8U7pBSIDjssEGGTjpSag7WsUt9yn5N5w4Fgy30Ax1JdoPSsdvdxYZ3AKkbZru4qnc1x5SE" />
                                        </div>
                                        <span class="text-sm font-medium line-clamp-1">Menyambut Spesialis TI Baru</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                    Oct 08, 2024</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-[10px] font-bold uppercase bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Dipublikasikan</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-primary"><span
                                            class="material-symbols-outlined text-lg">edit</span></button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded bg-slate-100 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                            <img alt="News" data-alt="News thumbnail of laptop development"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBuyWlCtjx3aPxUIWVmxNz7CdYXrf2JLqDeB4cNv8TINoam7LJ5K0IzKw7lycluzdDiDWkIWjtqlM4DjvUwZCYTaVAJffMKZh342nQ3dpa-s3rXKL3mds8P_u3YmC48y3vbXgqAd_RnJvkUKp5tb1Yp7OywUV5CTWXcBzL0UUcacBihDAeCLdOLvim8X9VG_4zWZUocnyTscFrPnlOzi9pnYrywbepGFakkT9YRNiAYaGGzw9jl4mPFiODqdTwzbelqIkI4b2S2D1s" />
                                        </div>
                                        <span class="text-sm font-medium line-clamp-1">Memperbarui Alat Pengembang &amp; SDK</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                    Oct 05, 2024</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-[10px] font-bold uppercase bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">Terjadwal</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-primary"><span
                                            class="material-symbols-outlined text-lg">edit</span></button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded bg-slate-100 dark:bg-slate-700 overflow-hidden flex-shrink-0">
                                            <img alt="News" data-alt="News thumbnail of students together"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYPJEq6QNULqJFiVuZ2y7z1lJ0r6xez6fsuxd0-dqGxfEY3ZacX2MSIVNXQKvdscxKrL-ehiz4mqmz-HAaSe1r1gjgP9XgiOmigUd2wPndTN8MnFEtjvtksR7zGZrM7pgSYu7gwZtxNzPWQlazdWy0DsB9YS1YRFC0aSoYNLc4yFKt5lYpcYky_AuDIDeKTvuTaR9W0NeWXy2lK82xY6lZi9J4EGCkqSdMrry0f4_YOj53NsZdBdEGjlJuCCPMyT3Qu9-RqHajaU4" />
                                        </div>
                                        <span class="text-sm font-medium line-clamp-1">Workshop Staf: Kesadaran Siber</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                    Oct 01, 2024</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-[10px] font-bold uppercase bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">Dipublikasikan</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-slate-400 hover:text-primary"><span
                                            class="material-symbols-outlined text-lg">edit</span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Secondary Gallery Summary (Optional extra to fill space) -->
        <div
            class="bg-white dark:bg-background-dark border border-slate-100 dark:border-slate-800 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-bold text-lg">Recent Gallery Uploads</h2>
                <button
                    class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">upload</span>
                    Upload New
                </button>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-7 gap-4">
                <div
                    class="aspect-square rounded-lg bg-slate-100 dark:bg-slate-800 overflow-hidden hover:opacity-80 transition-opacity cursor-pointer">
                    <img alt="Gallery" data-alt="Office workspace with multiple monitors"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB0NZ5EyN4VpGamw3AQPcFDopZh4abf-HXFRN55g0bS0fK1ZNQreQlmMHRjKOLW7iJGX7v2j2qDYS4oAPuoCHBQ3WRnjQffC7dP0V9vAjCx2mKh8EgLbUWo2afIqwNYGMbIvscmJkoc6_8bpSdqSzU8W39jwNVrqVxmV82YEMy3UsL8smjM5P4kzYvi4VygHfSWy2HLRd-txg2sdcdYspvPia8W-TpEWgGnaDum9JxFtr0cUm6BXdPnyz0egTM8UNiE4xy6VHGW-7M" />
                </div>
                <div
                    class="aspect-square rounded-lg bg-slate-100 dark:bg-slate-800 overflow-hidden hover:opacity-80 transition-opacity cursor-pointer">
                    <img alt="Gallery" data-alt="Group of professionals working"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQv0uxWY9XAu0ZBhTZmHgkOS-yg_YHzoedjd0JOIwoWdTSMvMqCbSXqeTaoLH4AypJOEKehBRYsDan2iJwmF8tuSq89IY-sLS2MwXm5S8TP5fpAN8zS39z3hI_68g0EQooMWow0Wv8giJa5q4VXYHPrVQXo3YQiwmm3rR3HR8Bdb0m0jEV_v6H3_wr8HeZDYEzManHz6K4X0rvQeTSFNDSuKuI8fF2PP-g6VbWx6CcBFbebG9irNIj1YVClkd0vf5iF8Y4osfvggc" />
                </div>
                <div
                    class="aspect-square rounded-lg bg-slate-100 dark:bg-slate-800 overflow-hidden hover:opacity-80 transition-opacity cursor-pointer">
                    <img alt="Gallery" data-alt="Modern empty conference room"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDp2LBC3LS522urxrav06MoX-B1PeMmu-dFkDiH3f8oyb2cKFm1XvhBh7vza1UrEKpgzcDxHQuokHS7E-MXJj3Z0AZXqupL-2-KnChTYPmTK6i9p6bvGApG4n1hAD21BpZQ11DlxQCDjx-8Te2dVLmgnlSuFjYYSKHrNPYXsvuzTosOLhGuLEdTva2e6bM8K4grTSLtn0OZIygghM59tl2uW9nTe8GJHFkFxZEPJoevP76eBvXJYAw_uJvYj2Xl4fMhCoAq_1TahrM" />
                </div>
                <div
                    class="aspect-square rounded-lg bg-slate-100 dark:bg-slate-800 overflow-hidden hover:opacity-80 transition-opacity cursor-pointer">
                    <img alt="Gallery" data-alt="Technical team collaborating"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgDn5hZM-azIcgvxaI6skSXHpQiIRvqQqQmSAMfn-cbBA2cpr5EJVedVQDQJzmg8rTC5GzEms35cZacDcYbjYULoL_1vVdHiQV64KuM_uwv6XGVs3OMR8go-UZpeLDF9JBt6WPQw3VISd9bI9rb1dloIaufnyp8PCyhm_Oc67EMRRvZzqC9iQq0YpLx936s_84y4_MNo9jQaUf2fpyZt4dheqBZLEiMwxsU1ZCbfid7pboOANl7LVQTDX1YUtZn_TSdWp_PcYgNO4" />
                </div>
                <div
                    class="aspect-square rounded-lg bg-slate-100 dark:bg-slate-800 overflow-hidden hover:opacity-80 transition-opacity cursor-pointer">
                    <img alt="Gallery" data-alt="Charts and graphs on laptop"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAon1sUaYGnRPLdJ3aoWHB8o00WN2Y8EeWxSbCEMWAcdiTsuAlZHtO-FivmnUSpPKyUMNg04VudjpvDhxdJ4u0BvHA28tj7_JnaRP-t1R8iar3xP_pxdX6WPuk91aVoyURHhkdLor3hcF8hhLayLN2CNRRZ8-AxPmPgoCsbdpv6dgOSLajuzPSAqFJON_sKsekogCbi6Tqj1jye6vMGBOST3t4Xsu-AVXu2Ii-f1BEcWiPBKAlM8GreyF9aeN-w0d5NS8ZYlRkfLyo" />
                </div>
                <div
                    class="aspect-square rounded-lg bg-slate-100 dark:bg-slate-800 overflow-hidden hover:opacity-80 transition-opacity cursor-pointer">
                    <img alt="Gallery" data-alt="Collaborative workspace environment"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6Yr37fkywrFsktTN1c2-LwOwnSnk7LNTKkW6e8uk6sxKGIFJNegjJ2KifiiRmW1Lf5lmGB887qDY95RWurxpXE25UDDMRvCtl72YUq97pJlVYBixy0oTSuOqawaQFI9QAp7a9-tOUCgcDf7g1WvAENDXx7yhcxIMTQJ9e6bGI6U42s7XSmkt4MkgYoGQLkducAnAB_oqVT2VcVSonLtbw4ZM5vzQE25-owwDtCWauNYZbT6G3a6TbqN-7fGPKjSyn3QO1i7S_S6c" />
                </div>
                <div
                    class="aspect-square rounded-lg bg-slate-200 dark:bg-slate-700 flex flex-col items-center justify-center text-slate-500 dark:text-slate-400 hover:bg-slate-300 dark:hover:bg-slate-600 transition-colors cursor-pointer group">
                    <span class="text-sm font-bold group-hover:scale-110 transition-transform">+50</span>
                    <span class="text-[10px] uppercase font-semibold">More</span>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
