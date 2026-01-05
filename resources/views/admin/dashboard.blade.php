<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Puskesmas Binong</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar-open {
            width: 16rem;
        }
        .sidebar-closed {
            width: 0;
        }
        .transition-width {
            transition: width 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar-open bg-green-700 text-white transition-width overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-8">
                    <h1 class="text-xl font-bold">Puskesmas Binong</h1>
                </div>
                
                <nav class="space-y-2">
                    <a href="#" class="menu-item active w-full flex items-center space-x-3 px-4 py-3 rounded-lg" data-menu="dashboard">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="#" class="menu-item w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-green-100 hover:bg-green-600" data-menu="kategori">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span>Kategori Blog</span>
                    </a>
                    
                    <a href="#" class="menu-item w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-green-100 hover:bg-green-600" data-menu="blog">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span>Blog</span>
                    </a>
                    
                    <a href="#" class="menu-item w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-green-100 hover:bg-green-600" data-menu="layanan">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>Layanan</span>
                    </a>
                    
                    <a href="#" class="menu-item w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-green-100 hover:bg-green-600" data-menu="staf">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span>Staf</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button id="toggleSidebar" class="text-gray-600 hover:text-gray-900">
                            <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-700">Admin</p>
                            <p class="text-xs text-gray-500">Puskesmas Binong</p>
                        </div>
                        <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-semibold">
                            A
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <div class="max-w-7xl mx-auto">
                    <!-- Welcome Card -->
                    <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-lg shadow-lg p-6 mb-6 text-white">
                        <h3 class="text-2xl font-bold mb-2">Selamat Datang di Dashboard Admin</h3>
                        <p class="text-green-100">Kelola konten website Puskesmas Binong dengan mudah</p>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">Total Berita</p>
                                    <p class="text-3xl font-bold text-gray-800 mt-1">24</p>
                                </div>
                                <div class="bg-green-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">Total Layanan</p>
                                    <p class="text-3xl font-bold text-gray-800 mt-1">12</p>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">Total Staf</p>
                                    <p class="text-3xl font-bold text-gray-800 mt-1">18</p>
                                </div>
                                <div class="bg-purple-100 p-3 rounded-full">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Latest Content Sections -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Latest News -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    Berita Terbaru
                                </h3>
                            </div>
                            <div class="p-6">
                                <ul class="space-y-4">
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Peluncuran Program Imunisasi Balita 2026</h4>
                                        <p class="text-xs text-gray-500">3 Jan 2026</p>
                                    </li>
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Peningkatan Layanan Posyandu di Wilayah Binong</h4>
                                        <p class="text-xs text-gray-500">2 Jan 2026</p>
                                    </li>
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Workshop Kesehatan Ibu dan Anak</h4>
                                        <p class="text-xs text-gray-500">30 Des 2025</p>
                                    </li>
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Sosialisasi PHBS di Sekolah-Sekolah</h4>
                                        <p class="text-xs text-gray-500">28 Des 2025</p>
                                    </li>
                                    <li class="pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Pemeriksaan Kesehatan Gratis untuk Lansia</h4>
                                        <p class="text-xs text-gray-500">27 Des 2025</p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Latest Services -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Layanan Terbaru
                                </h3>
                            </div>
                            <div class="p-6">
                                <ul class="space-y-4">
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Poli Gigi</h4>
                                        <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">Rawat Jalan</span>
                                    </li>
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Konseling Gizi</h4>
                                        <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">Konsultasi</span>
                                    </li>
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Pemeriksaan Ibu Hamil</h4>
                                        <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">KIA</span>
                                    </li>
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Imunisasi Lengkap</h4>
                                        <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">Imunisasi</span>
                                    </li>
                                    <li class="pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Laboratorium Sederhana</h4>
                                        <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded">Penunjang</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Latest Staff -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    Staf Terbaru
                                </h3>
                            </div>
                            <div class="p-6">
                                <ul class="space-y-4">
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">dr. Ahmad Fauzi</h4>
                                        <p class="text-xs text-gray-500">Dokter Umum</p>
                                    </li>
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Siti Nurhaliza, S.Kep</h4>
                                        <p class="text-xs text-gray-500">Perawat</p>
                                    </li>
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Budi Santoso, S.Farm</h4>
                                        <p class="text-xs text-gray-500">Apoteker</p>
                                    </li>
                                    <li class="border-b border-gray-100 pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">drg. Lina Marlina</h4>
                                        <p class="text-xs text-gray-500">Dokter Gigi</p>
                                    </li>
                                    <li class="pb-3">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Rina Wijaya, Amd.Keb</h4>
                                        <p class="text-xs text-gray-500">Bidan</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Toggle Sidebar
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const menuIcon = document.getElementById('menuIcon');
        let sidebarOpen = true;

        toggleBtn.addEventListener('click', function() {
            sidebarOpen = !sidebarOpen;
            if (sidebarOpen) {
                sidebar.classList.remove('sidebar-closed');
                sidebar.classList.add('sidebar-open');
            } else {
                sidebar.classList.remove('sidebar-open');
                sidebar.classList.add('sidebar-closed');
            }
        });

        // Menu Active State
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                menuItems.forEach(menu => {
                    menu.classList.remove('active', 'bg-green-800', 'text-white');
                    menu.classList.add('text-green-100', 'hover:bg-green-600');
                });
                this.classList.remove('text-green-100', 'hover:bg-green-600');
                this.classList.add('active', 'bg-green-800', 'text-white');
            });
        });
    </script>
</body>
</html>