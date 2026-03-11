<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Manajemen Staf - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
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
                        "background-light": "#f6f8f7",
                        "background-dark": "#141e17",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
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
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            color: #349953;
        }

        .active-link {
            background-color: rgba(52, 153, 83, 0.1);
            border-left: 4px solid #349953;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100">
    <div class="flex min-h-screen">
        <!-- Side Navigation -->
        <div class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden" id="sidebar-overlay" onclick="toggleSidebar()">
        </div>
        <aside
            class="w-64 border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex flex-col fixed h-full fixed inset-y-0 left-0 z-50 transition-transform duration-300 transform -translate-x-full lg:translate-x-0 lg:static lg:inset-0"
            id="sidebar">
            <div class="p-6 flex items-center gap-3">
                <div class="bg-primary p-2 rounded-lg text-white">
                    <span class="material-symbols-outlined !text-white">admin_panel_settings</span>
                </div>
                <div>
                    <h1 class="font-bold text-lg leading-none">Admin Panel</h1>
                    <p class="text-xs text-slate-500 mt-1">Staff Management</p>
                </div>
            </div>
            <nav class="flex-1 px-4 py-4 space-y-1">
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-primary active-link rounded-r-lg transition-colors"
                    href="#">
                    <span class="material-symbols-outlined !text-primary">group</span>
                    <span class="text-sm font-semibold">Manajemen Staf</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">calendar_today</span>
                    <span class="text-sm font-medium">Jadwal</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">description</span>
                    <span class="text-sm font-medium">Laporan</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors"
                    href="#">
                    <span class="material-symbols-outlined">settings</span>
                    <span class="text-sm font-medium">Pengaturan</span>
                </a>
            </nav>
            <div class="p-4 border-t border-slate-200 dark:border-slate-800">
                <div class="flex items-center gap-3 p-2">
                    <img alt="Admin Profile" class="w-10 h-10 rounded-full border-2 border-primary"
                        data-alt="Portrait of a professional male admin"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDKFMO3jfeWv2GaZ0Vx3dshfLsgdtxid-xUfCXEjpKS-ARjd-_3rgsMrWIn_2b310yHMd9pVggxbrFlLJ7ZkH-gl4eMzqs6rjdtQKzg0ft-AmyxwLcvLj-H-Nz_YE5XYxocvuAVnmwhPTz0rjcz_53rPREJV6C55QrMKtd8XROm1t6f57iGM7h4EUiRPG6TGkt87Y4SgOtzoLELc2e8R7dzR8oHB40ii9yAuys-M_8IL1ssv___37OkdvjcZ85cY7Ue29nApE3EPQ" />
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold truncate">Admin Utama</p>
                        <p class="text-xs text-slate-500 truncate">admin@company.com</p>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 w-full lg:ml-0">
            <!-- Top Navigation -->
            <header
                class="h-16 border-b border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md flex items-center justify-between px-8 sticky top-0 z-10">
                <div class="flex items-center gap-4"><button
                        class="lg:hidden p-2 -ml-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800"
                        onclick="toggleSidebar()">
                        <span class="material-symbols-outlined !text-slate-600 dark:!text-slate-300">menu</span>
                    </button>
                    <h2 class="text-xl font-bold tracking-tight">Manajemen Staf</h2>
                </div>
                <div class="flex items-center gap-6">
                    <div class="relative group">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 !text-slate-400 text-xl">search</span>
                        <input
                            class="pl-10 pr-4 py-2 bg-slate-100 dark:bg-slate-800 border-none rounded-lg text-sm w-64 focus:ring-2 focus:ring-primary/20 transition-all"
                            placeholder="Cari staf..." type="text" />
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 relative">
                            <span
                                class="material-symbols-outlined !text-slate-600 dark:!text-slate-300">notifications</span>
                            <span
                                class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
                        </button>
                        <button class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
                            <span
                                class="material-symbols-outlined !text-slate-600 dark:!text-slate-300">account_circle</span>
                        </button>
                    </div>
                </div>
            </header>
            <div class="max-w-7xl mx-auto space-y-8 px-4 sm:px-6 lg:px-8">
                <!-- Header Stats/Action -->
                <div class="flex justify-between items-end flex-col sm:flex-row sm:items-end gap-4 items-start">
                    <div>
                        <h3 class="text-3xl font-extrabold tracking-tight">Daftar Staf</h3>
                        <p class="text-slate-500 dark:text-slate-400 mt-1">Kelola data dan informasi staf organisasi
                            Anda.</p>
                    </div>
                    <button
                        class="bg-primary hover:bg-primary/90 text-white px-5 py-2.5 rounded-lg font-bold flex items-center gap-2 shadow-lg shadow-primary/20 transition-all w-full sm:w-auto justify-center">
                        <span class="material-symbols-outlined !text-white">add</span>
                        Tambah Staf Baru
                    </button>
                </div>
                <!-- Table Section -->
                <div
                    class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-slate-50 dark:bg-slate-800/50">
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Foto
                                    </th>
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Nama
                                        Lengkap</th>
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Telepon</th>
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Email</th>
                                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">
                                        Jabatan</th>
                                    <th
                                        class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                                <!-- Row 1 -->
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div
                                            class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden border border-slate-200 dark:border-slate-600">
                                            <img alt="Staff 1" data-alt="Close up portrait of a young man smiling"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwDB-HaNPimORQJQpXdnWUvexHYBHxn5j-6S8RwPTJyHrVySLZ9fnk9t5T3Gh3u4MKNy5p5iMXMJ2E6cgedoPWo-qgL8CxpQk0nz6NdMnoYwdNPVzdWHGSX4mmTkHJBM1MNwADNtstZSc7mZkAg2h4Tx4_ccxBCRRVxbV2L638KWrd_T5YDgfQz7WENLItVhjxCDSj_RiRn4FMmwt1yPSwhbOzc0066izyTFvsJTNmwPgABfxb9bPAPap6MCzF2buGuDTE9vN7Mg" />
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-sm">Budi Santoso</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">0812-3456-7890</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">budi.s@hospital.com
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full">Manager</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="text-primary hover:text-primary/70 font-bold text-sm">Edit</button>
                                    </td>
                                </tr>
                                <!-- Row 2 -->
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div
                                            class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden border border-slate-200 dark:border-slate-600">
                                            <img alt="Staff 2"
                                                data-alt="Portrait of a professional woman with glasses"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBeLxE8dYH9-bp6cL8vzXIm7kpCxsxjBMNLB9tT3rUx3wyf0hxCvWbMZbl20WKdz_4mY9U_cOkqCjmhnGP3AFauRdSbvvKm6hACs5gpFCRGBuXgGuWt4AHli7oKGA3pJ31UEPPi59EZYHh9_Vt2R7kohRcRqEtgBdpi5fGr1tEcBMJRzo4fSzHSnzvGCW-vngvPoKJPtBFDw_W6xziBjL_Ni5E73FSU785H5IeyRB3prmEDWizzjgfRm51e7ICknn1_fA9wwAJU4w" />
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-sm">Siti Aminah</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">0856-2223-3344
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                        siti.a@hospital.com</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-bold rounded-full">Senior
                                            Staff</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="text-primary hover:text-primary/70 font-bold text-sm">Edit</button>
                                    </td>
                                </tr>
                                <!-- Row 3 -->
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div
                                            class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden border border-slate-200 dark:border-slate-600">
                                            <img alt="Staff 3" data-alt="Professional male with a beard smiling"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAl6mBv9g5b4P0Xsuoy-2mtytwUvJUI0mJtpbduWOfd1uwno5JZk51tye_mY0FftQrU9etzUlSRX-0p6cbgY_HU1cGbspIMyRPqwC90UR0mHcafR8n6tSlUfXA7l2kSLjQDxWixArW9nLq5NNpqgQCVsO7kssRPviqlq8dCbI4DjPRPSSVNLkR5fItPLxgoVb8DelVw4VZTP7nQ_v6B6-CnRCxW8qqobKJZ4ZuendvtMTnc69qC0J6OSt9Xq45k29IANv3R9qZ_Uw" />
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-sm">Agus Prayogo</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">0813-3344-5566
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                        agus.p@hospital.com</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 bg-purple-100 text-purple-600 text-xs font-bold rounded-full">Administrator</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="text-primary hover:text-primary/70 font-bold text-sm">Edit</button>
                                    </td>
                                </tr>
                                <!-- Row 4 -->
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div
                                            class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden border border-slate-200 dark:border-slate-600">
                                            <img alt="Staff 4" data-alt="Portrait of a young professional woman"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjwU_m1AVvl0hjR1PIB35L6824aA36HEDZRe3A8g6mJOjPwpAVijYQ_e1sEee5HNpXaf2RSDDDH81kCfTYrYwiCSR7Jmpwgw-DNkdpndr9dZPTeSgWQPLHBDtW-_D--JPEetxPadgl7oihgX9B8myPL4a1KXR90lmadvy3CdE2DxakAK-dnrDYqHc6CPGh-cHrTBlhXHfEjRPtSpthei3pHEoMFNlVsysveSShQ8t2x7KRcei1kG0OzCNAUV9jiBHGxwuudbL5Gg" />
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-sm">Lani Wijaya</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">0814-4455-6677
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                        lani.w@hospital.com</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 bg-slate-100 text-slate-600 text-xs font-bold rounded-full">Staff</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="text-primary hover:text-primary/70 font-bold text-sm">Edit</button>
                                    </td>
                                </tr>
                                <!-- Row 5 -->
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                                    <td class="px-6 py-4">
                                        <div
                                            class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 overflow-hidden border border-slate-200 dark:border-slate-600">
                                            <img alt="Staff 5"
                                                data-alt="Professional male with glasses looking forward"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCeGv5j2h5mxJRTtoznpoLKNBDSGwuqQNU4-cI22ovTSh9cLsBMSTHOR3pRBLvA7oSJ5R4MiXOnnpfS7VJEnNo2PHYpeYU9avp8thddSloMsSaW1rlo8prrptuGWCa3uL5VtC_NXF_rL_jmv2s7brMWxzPuBBHLrA3iemjQ-iUersHMIrStVUynfB1J5qiT5QsKgGslwtXh8JkUXOatqhIjVtYBOcAFiNDs7gfbun9EztiK0LRn9HwOvzHCaWWJMpFLv6fosrv1xg" />
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-sm">Rudi Tabuti</td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">0815-5566-7788
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">
                                        rudi.t@hospital.com</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-3 py-1 bg-amber-100 text-amber-600 text-xs font-bold rounded-full">Supervisor</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="text-primary hover:text-primary/70 font-bold text-sm">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Form Section -->
                <div
                    class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
                    <div
                        class="px-8 py-6 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
                        <h4 class="text-xl font-bold">Data Detil Staf</h4>
                        <span class="text-xs font-medium text-slate-400">Lengkapi formulir di bawah ini</span>
                    </div>
                    <form class="p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                            <!-- Left: Profile Image Upload/Preview -->
                            <div class="lg:col-span-3 flex flex-col items-center gap-4">
                                <div class="relative group">
                                    <div
                                        class="w-40 h-40 rounded-xl border-4 border-primary p-1 bg-white overflow-hidden shadow-xl shadow-primary/10">
                                        <img alt="Staff Preview" class="w-full h-full object-cover rounded-lg"
                                            data-alt="Detailed close up preview of staff member"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDfMIFIzgC29TDHB8luqq-KQ0GZ38Vxek280Pgbzv2FZwaD_1bqYUcWc9Cl16JWV3M8Kaq7UcdPiXS8v8Ky55UaS5ryGSoZVn0CtgNfndBz7NSOte0_TXD0CLlvTAMTmSUQ2vlj1blGXsMlBUw3QMC_rTcUxQ_CysDr7I67eXWYCXY3nOwYG1r1WIYwbJDgtRfkqSAgOTjyijRztCPlS1evjK5MCX7sUxSGwX5dzk6KBm2I5ESYm3ubkh7lDVzwlmQMm6YsMF7GvQ" />
                                    </div>
                                    <button
                                        class="absolute -bottom-3 -right-3 bg-primary text-white p-2 rounded-lg shadow-lg hover:scale-105 transition-transform flex items-center justify-center"
                                        type="button">
                                        <span class="material-symbols-outlined !text-white text-lg">edit</span>
                                    </button>
                                </div>
                                <div class="text-center">
                                    <p class="text-sm font-bold">Foto Profil</p>
                                    <p class="text-xs text-slate-500 mt-1">Maks. 2MB (JPG, PNG)</p>
                                </div>
                            </div>
                            <!-- Right: Detailed Grid Form -->
                            <div class="lg:col-span-9 grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                                <!-- Row 1 -->
                                <div class="space-y-1.5">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Nama
                                        Lengkap</label>
                                    <input
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary"
                                        type="text" value="Budi Santoso" />
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Nomor
                                        Telepon</label>
                                    <input
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary"
                                        type="tel" value="081234567890" />
                                </div>
                                <!-- Row 2 -->
                                <div class="space-y-1.5">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Alamat
                                        Email</label>
                                    <input
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary"
                                        type="email" value="budi.s@hospital.com" />
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Jenis
                                        Kelamin</label>
                                    <select
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <!-- Row 3 -->
                                <div class="space-y-1.5">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Tanggal
                                        Lahir</label>
                                    <div class="relative">
                                        <span
                                            class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 !text-slate-400 text-xl pointer-events-none">calendar_month</span>
                                        <input
                                            class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary appearance-none"
                                            type="date" value="1990-05-15" />
                                    </div>
                                </div>
                                <div class="space-y-1.5">
                                    <label
                                        class="text-sm font-semibold text-slate-700 dark:text-slate-300">Profesi</label>
                                    <input
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary"
                                        type="text" value="Tenaga Medis" />
                                </div>
                                <!-- Row 4 -->
                                <div class="space-y-1.5">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">NIP (Nomor
                                        Induk Pegawai)</label>
                                    <input
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary"
                                        type="text" value="199005152020031001" />
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Jabatan
                                        Struktural</label>
                                    <input
                                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary"
                                        type="text" value="Manager Operasional" />
                                </div>
                                <!-- Row 5 -->
                                <div class="space-y-1.5 md:col-span-2">
                                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Bergabung
                                        Sejak</label>
                                    <div class="relative">
                                        <span
                                            class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 !text-slate-400 text-xl pointer-events-none">event_available</span>
                                        <input
                                            class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-lg focus:ring-primary focus:border-primary appearance-none"
                                            type="date" value="2020-03-01" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Form Actions -->
                        <div class="mt-12 flex justify-end gap-4 pt-8 border-t border-slate-100 dark:border-slate-800">
                            <button
                                class="px-6 py-2.5 border border-slate-200 dark:border-slate-700 rounded-lg font-bold hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors"
                                type="button">Batal</button>
                            <button
                                class="px-8 py-2.5 bg-primary text-white rounded-lg font-bold shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all"
                                type="submit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>
</body>

</html>
