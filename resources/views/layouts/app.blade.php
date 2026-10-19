<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@hasSection('title')@yield('title') | @endif{{ $profil->nama }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>

    {{-- NAVBAR: semua halaman saling terhubung lewat menu ini --}}
    <header class="site-header">
        <div class="nav-inner">
            <a href="{{ route('beranda') }}" class="brand">
                <img src="{{ asset('images/Logo SK (2).png') }}" alt="Logo {{ $profil->nama }}" class="brand-logo">
                <div>
                    <h1 class="brand-name">{{ strtoupper($profil->nama) }}</h1>
                    <p class="brand-tagline">{{ $profil->tagline }}</p>
                </div>
            </a>

            <div class="nav-right">
                <nav class="nav-links">
                    <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil Perusahaan</a>
                    <a href="{{ route('produk') }}" class="{{ request()->routeIs('produk') ? 'active' : '' }}">Produk / Layanan</a>
                    <a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel*') ? 'active' : '' }}">Artikel</a>
                    <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'active' : '' }}">Galeri</a>
                    <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak Kami</a>
                </nav>

                <a href="{{ route('login') }}" class="btn-login">Login</a>
            </div>
        </div>
    </header>

    {{-- ISI HALAMAN --}}
    @yield('content')

    {{-- FOOTER --}}
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid has-jurusan">
                <div>
                    <div class="footer-brand">
                        <span class="footer-logo">
                            <svg fill="currentColor" viewBox="0 0 24 24" width="22" height="22">
                                <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 2c1.1 0 2.1.2 3 .6-.4.9-1 1.7-1.7 2.4A6 6 0 0112 7a6 6 0 01-1.3-.1c-.7-.7-1.3-1.5-1.7-2.4.9-.3 1.9-.5 3-.5zM4.3 9.5c.9.5 1.9.9 3 1.1A14 14 0 007 12c0 1 .1 2 .3 2.9-1.1.2-2.1.6-3 1.1A8 8 0 014 12c0-.9.1-1.7.3-2.5zM12 20a8 8 0 01-3.9-1c.6-.9 1.2-1.6 2-2.1a6 6 0 003.8 0c.8.5 1.4 1.2 2 2.1A8 8 0 0112 20z"/>
                            </svg>
                        </span>
                        <h2>{{ strtoupper($profil->nama) }}</h2>
                    </div>
                    <p class="footer-address">{{ $profil->tagline }}. {{ $profil->alamat }}</p>
                </div>

                <div>
                    <h3 class="footer-heading">Menu</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('beranda') }}">Home</a></li>
                        <li><a href="{{ route('profil') }}">Profil Perusahaan</a></li>
                        <li><a href="{{ route('produk') }}">Produk / Layanan</a></li>
                        <li><a href="{{ route('artikel') }}">Artikel</a></li>
                        <li><a href="{{ route('galeri') }}">Galeri</a></li>
                        <li><a href="{{ route('kontak') }}">Kontak Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="footer-heading">Kontak</h3>
                    <ul class="footer-contact">
                        <li>
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                            <span>{{ $profil->alamat }}</span>
                        </li>
                        <li>
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a1.5 1.5 0 001.5-1.5v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                            <a href="tel:{{ preg_replace('/\s+/', '', $profil->telepon) }}">{{ $profil->telepon }}</a>
                        </li>
                        <li>
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                            <span>{{ $profil->email }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <p class="footer-copy">© {{ date('Y') }} {{ $profil->nama }}. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>