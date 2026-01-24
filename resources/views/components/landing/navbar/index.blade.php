<nav id="navmenu" class="navmenu">
    <ul>
        <li><x-landing.navbar.nav-link href="{{ route('welcome')}}">Beranda</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('about')}}">Tentang Kami</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('service')}}">Layanan</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('staf')}}">Staf</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('blog')}}">Berita</x-landing.navbar.nav-link></li>
        <li><x-landing.navbar.nav-link href="{{ route('contact')}}">Contact</x-landing.navbar.nav-link></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>