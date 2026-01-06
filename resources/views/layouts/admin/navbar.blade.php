<!-- Sidebar -->
<aside id="sidebar" class="sidebar-open bg-green-700 text-white transition-width overflow-hidden">
    <div class="p-6">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-xl font-bold">Puskesmas Binong</h1>
        </div>

        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="menu-item w-full flex items-center space-x-3 px-4 py-3 rounded-lg {{ Route::is('admin.dashboard') ? 'active bg-green-800 text-white' : 'text-green-100 hover:bg-green-600' }}" data-menu="dashboard">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.kategori_blog') }}" class="menu-item w-full flex items-center space-x-3 px-4 py-3 rounded-lg {{ Route::is('admin.kategori_blog') ? 'active bg-green-800 text-white' : 'text-green-100 hover:bg-green-600' }}" data-menu="kategori">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>Kategori Blog</span>
            </a>

            <a href="{{ route('admin.blog') }}" class="menu-item w-full flex items-center space-x-3 px-4 py-3 rounded-lg {{ Route::is('admin.blog') ? 'active bg-green-800 text-white' : 'text-green-100 hover:bg-green-600' }}" data-menu="blog">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span>Blog</span>
            </a>

            <a href="{{ route('admin.layanan') }}" class="menu-item w-full flex items-center space-x-3 px-4 py-3 rounded-lg {{ Route::is('admin.layanan') ? 'active bg-green-800 text-white' : 'text-green-100 hover:bg-green-600' }}" data-menu="layanan">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span>Layanan</span>
            </a>

            <a href="{{ route('admin.staf') }}" class="menu-item w-full flex items-center space-x-3 px-4 py-3 rounded-lg {{ Route::is('admin.staf') ? 'active bg-green-800 text-white' : 'text-green-100 hover:bg-green-600' }}" data-menu="staf">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span>Staf</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-8">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-green-100 hover:bg-green-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </div>
</aside>
