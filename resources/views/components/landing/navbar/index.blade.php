<nav id="navmenu" class="navmenu">
    <ul>
        <li><x-landing.navbar.nav-link href="{{ route('welcome')}}">Beranda</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('about')}}">Profil</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('service')}}">Layanan</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('inovasi')}}">Inovasi</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('staf')}}">Staff</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('blog')}}">Berita</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('gallery')}}">Galeri</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('contact')}}">Kontak</x-landing.navbar.nav-link></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>