<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#349953",
                        "heading": "#18444c",
                        "background-light": "#f6f8f7",
                        "background-dark": "#141e17",
                    },
                    fontFamily: {
                        "display": ["Inter"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <title>Admin Dashboard - Daftar Layanan</title>
    <script defer="" src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100">
    <div class="flex min-h-screen" x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'w-[260px]' : 'w-[80px]'"
            class="fixed inset-y-0 left-0 z-50 w-[260px] border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:static md:block transition-all duration-300">
            <div class="p-6 flex flex-col items-center md:items-start">
                <h1 class="text-heading dark:text-primary text-xl font-bold flex items-center gap-2"><span
                        class="material-symbols-outlined text-primary">admin_panel_settings</span><span
                        class="whitespace-nowrap" x-show="sidebarOpen">Admin Panel</span></h1>
                <p class="text-slate-500 dark:text-slate-400 text-xs mt-1" x-show="sidebarOpen">Layanan Management</p>
            </div>
            <nav class="flex-1 px-4 space-y-1">
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg justify-center md:justify-start"
                    href="#">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-medium" x-show="sidebarOpen">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 bg-primary/10 text-primary rounded-lg justify-center md:justify-start"
                    href="#">
                    <span class="material-symbols-outlined">home_repair_service</span>
                    <span class="text-sm font-medium" x-show="sidebarOpen">Layanan</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg justify-center md:justify-start"
                    href="#">
                    <span class="material-symbols-outlined">category</span>
                    <span class="text-sm font-medium" x-show="sidebarOpen">Kategori</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg justify-center md:justify-start"
                    href="#">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="text-sm font-medium" x-show="sidebarOpen">Pesanan</span>
                </a>
                <div class="pt-4 mt-4 border-t border-slate-200 dark:border-slate-800">
                    <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg justify-center md:justify-start"
                        href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <span class="text-sm font-medium" x-show="sidebarOpen">Pengaturan</span>
                    </a>
                </div>
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header
                class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark px-4 md:px-8 flex items-center justify-between sticky top-0 z-40">
                <button class="md:hidden p-2 -ml-2 text-slate-600 dark:text-slate-300" id="mobile-menu-toggle">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="hidden md:flex p-2 mr-2 text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">
                        <span class="material-symbols-outlined"
                            x-text="sidebarOpen ? 'menu_open' : 'menu'">menu_open</span>
                    </button>
                    <h2 class="text-heading dark:text-slate-100 text-lg font-semibold uppercase tracking-wider">Daftar
                        Layanan</h2>
                </div>
                <div class="flex items-center gap-6">
                    <div class="relative hidden sm:block sm:w-64">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                        <input
                            class="w-full bg-slate-100 dark:bg-slate-800 border-none rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary/50"
                            placeholder="Search service..." type="text" />
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-sm font-medium text-heading dark:text-slate-100">Administrator</p>
                            <p class="text-xs text-slate-500">Super Admin</p>
                        </div>
                        <div
                            class="h-10 w-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold">
                            AD
                        </div>
                    </div>
                </div>
            </header>
            <!-- Content Area -->
            <div class="p-4 md:p-8 space-y-6 md:space-y-8">
                <!-- Page Action Header -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-2xl font-bold text-heading dark:text-slate-100">Manajemen Layanan</h3>
                        <p class="text-slate-500 text-sm">Kelola semua layanan jasa yang tersedia di platform.</p>
                    </div>
                    <button
                        class="bg-primary hover:bg-primary/90 text-white px-5 py-2.5 rounded-lg font-semibold flex items-center gap-2 transition-colors">
                        <span class="material-symbols-outlined">add</span>
                        Tambah Layanan
                    </button>
                </div>
                <!-- Table Section -->
                <div
                    class="bg-white dark:bg-background-dark border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead
                                class="bg-slate-50 dark:bg-slate-800/50 border-b border-slate-200 dark:border-slate-800">
                                <tr>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Name
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Slug
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        Category</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                                <tr>
                                    <td class="px-6 py-4 font-medium text-slate-900 dark:text-slate-100">Deep Cleaning
                                        Rumah</td>
                                    <td class="px-6 py-4 text-slate-500 text-sm italic">deep-cleaning-rumah</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full text-xs text-slate-600 dark:text-slate-400">Cleaning
                                            Service</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold">Active</span>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-slate-900 dark:text-slate-100">Service AC
                                        Split</td>
                                    <td class="px-6 py-4 text-slate-500 text-sm italic">service-ac-split</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full text-xs text-slate-600 dark:text-slate-400">Maintenance</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold">Active</span>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-slate-900 dark:text-slate-100">Instalasi
                                        Listrik</td>
                                    <td class="px-6 py-4 text-slate-500 text-sm italic">instalasi-listrik</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full text-xs text-slate-600 dark:text-slate-400">Teknikal</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-400 px-3 py-1 rounded-full text-xs font-bold">Inactive</span>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-slate-900 dark:text-slate-100">Pengecatan
                                        Tembok</td>
                                    <td class="px-6 py-4 text-slate-500 text-sm italic">pengecatan-tembok</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full text-xs text-slate-600 dark:text-slate-400">Home
                                            Improvement</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold">Active</span>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-medium text-slate-900 dark:text-slate-100">Sedot WC</td>
                                    <td class="px-6 py-4 text-slate-500 text-sm italic">sedot-wc</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-full text-xs text-slate-600 dark:text-slate-400">Sanitasi</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-primary/10 text-primary px-3 py-1 rounded-full text-xs font-bold">Active</span>
                                    </td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button class="text-slate-400 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                        <button class="text-slate-400 hover:text-red-500 transition-colors">
                                            <span class="material-symbols-outlined text-[20px]">delete</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Form Section (Create/Edit Card) -->
                <div
                    class="bg-white dark:bg-background-dark border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
                    <div class="p-6 border-b border-slate-200 dark:border-slate-800">
                        <h4 class="text-lg font-bold text-heading dark:text-slate-100">Detail Layanan</h4>
                        <p class="text-sm text-slate-500">Isi detail informasi untuk menambah atau mengubah layanan.
                        </p>
                    </div>
                    <form class="p-8 space-y-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Nama
                                        Layanan</label>
                                    <input
                                        class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary transition-all"
                                        placeholder="Contoh: Service AC Rutin" type="text" />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Slug</label>
                                    <input
                                        class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary transition-all"
                                        placeholder="service-ac-rutin" type="text" />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Kategori
                                        Layanan</label>
                                    <select
                                        class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary transition-all">
                                        <option value="">Pilih Kategori</option>
                                        <option value="1">Cleaning Service</option>
                                        <option value="2">Maintenance</option>
                                        <option value="3">Teknikal</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div class="space-y-6">
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Gambar
                                        Layanan</label>
                                    <div
                                        class="border-2 border-dashed border-primary/40 rounded-xl p-8 flex flex-col items-center justify-center bg-primary/5 hover:bg-primary/10 transition-colors cursor-pointer group">
                                        <span
                                            class="material-symbols-outlined text-4xl text-primary mb-2 group-hover:scale-110 transition-transform">cloud_upload</span>
                                        <p class="text-sm text-slate-600 dark:text-slate-400 font-medium">Klik untuk
                                            upload atau tarik gambar</p>
                                        <p class="text-xs text-slate-400 mt-1">PNG, JPG up to 2MB</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label
                                            class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Urutan
                                            Tampil</label>
                                        <input
                                            class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary transition-all"
                                            type="number" value="1" />
                                    </div>
                                    <div class="flex flex-col justify-end">
                                        <label class="inline-flex items-center cursor-pointer py-2">
                                            <input checked="" class="sr-only peer" type="checkbox" />
                                            <div
                                                class="relative w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                                            </div>
                                            <span
                                                class="ms-3 text-sm font-semibold text-slate-700 dark:text-slate-300">Aktif</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="pt-6 border-t border-slate-200 dark:border-slate-800 flex justify-end gap-3 flex-col sm:flex-row">
                            <button
                                class="px-6 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all w-full sm:w-auto"
                                type="button">Batal</button>
                            <button
                                class="px-8 py-2.5 rounded-lg bg-primary text-white font-semibold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all w-full sm:w-auto"
                                type="submit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
