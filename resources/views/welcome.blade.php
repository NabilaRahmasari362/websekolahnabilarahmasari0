@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- HERO --}}
    <section class="hero">
        <img src="{{ asset('images/background 2.jfif') }}" class="hero-img" alt="{{ $profil->nama }}">
        <div class="hero-overlay">
            <div class="container">
                <span class="hero-badge">{{ $profil->tagline }}</span>
                <h1 class="hero-title">Selamat Datang di<br>{{ $profil->nama }}</h1>
                <p class="hero-desc">
                    Kami menyediakan solusi konektivitas dan teknologi informasi yang andal agar bisnis dan masyarakat tetap terhubung, aman, dan produktif.
                </p>
                <a href="{{ route('profil') }}" class="btn-primary">
                    Profil Perusahaan <span>→</span>
                </a>
            </div>
        </div>
    </section>

    {{-- KEUNGGULAN --}}
    <section class="features-section container">
        <div class="features-grid">

            <div class="feature-card">
                <div class="icon-box">
                    <svg fill="currentColor" viewBox="0 0 24 24" width="28" height="28">
                        <path d="M12 3C7.5 3 3.6 5 1 8l2 2c2.1-2.4 5.2-4 9-4s6.9 1.6 9 4l2-2c-2.6-3-6.5-5-11-5zm0 6c-3 0-5.600 1.200-7.500 3.200l2 2C8 12.600 9.900 11.800 12 11.800s4 .8 5.500 2.400l2-2C17.600 10.200 15 9 12 9zm0 6c-1.300 0-2.500.5-3.400 1.400L12 20l3.400-3.600C14.500 15.500 13.300 15 12 15z"/>
                    </svg>
                </div>
                <h3 class="feature-title">Konektivitas Andal</h3>
                <p class="feature-desc">Jaringan stabil dengan jaminan ketersediaan layanan.</p>
            </div>

            <div class="feature-card">
                <div class="icon-box">
                    <svg fill="currentColor" viewBox="0 0 24 24" width="28" height="28">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
                <h3 class="feature-title">Tim Profesional</h3>
                <p class="feature-desc">Teknisi berpengalaman dan bersertifikasi.</p>
            </div>

            <div class="feature-card">
                <div class="icon-box">
                    <svg fill="currentColor" viewBox="0 0 24 24" width="28" height="28">
                        <path d="M4 4h7v7H4V4zm9 0h7v7h-7V4zM4 13h7v7H4v-7zm9 0h7v7h-7v-7z"/>
                    </svg>
                </div>
                <h3 class="feature-title">Layanan Lengkap</h3>
                <p class="feature-desc">Dari jaringan, website, hingga dukungan IT.</p>
            </div>

            <div class="feature-card">
                <div class="icon-box">
                    <svg fill="currentColor" viewBox="0 0 24 24" width="28" height="28">
                        <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm.5 5v5.2l4.3 2.5-.8 1.3-5-3V7h1.5z"/>
                    </svg>
                </div>
                <h3 class="feature-title">Dukungan Cepat</h3>
                <p class="feature-desc">Respons cepat saat Anda membutuhkan bantuan.</p>
            </div>

        </div>
    </section>

    {{-- PRODUK / LAYANAN UNGGULAN (dinamis dari database) --}}
    <section class="produk-section container">
        <h2 class="section-title">Produk / Layanan Kami</h2>
        <p class="section-subtitle">Solusi yang kami tawarkan untuk mendukung usaha Anda.</p>

        @if ($produks->isEmpty())
            <p class="produk-empty">Belum ada produk / layanan.</p>
        @else
            <div class="produk-grid">
                @foreach ($produks as $p)
                    <article class="produk-card">
                        @if ($p->gambar)
                            <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->nama }}" class="produk-img">
                        @else
                            <div class="produk-img produk-img-empty"></div>
                        @endif
                        <div class="produk-body">
                            <h3 class="produk-nama">{{ $p->nama }}</h3>
                            @if ($p->deskripsi)
                                <p class="produk-desc">{{ \Illuminate\Support\Str::limit($p->deskripsi, 90) }}</p>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
            <p class="lihat-semua"><a href="{{ route('produk') }}">Lihat semua layanan →</a></p>
        @endif
    </section>

    {{-- ARTIKEL TERBARU (dinamis dari database) --}}
    <section class="news-section container">
        <h2 class="section-title">Artikel / Informasi Terkini</h2>
        <p class="section-subtitle">Kabar dan wawasan terbaru seputar layanan dan teknologi.</p>

        <div class="news-grid news-grid-3">
            @forelse ($beritas as $berita)
                <div class="news-card">
                    @if ($berita->gambar)
                        <a href="{{ route('artikel.detail', $berita) }}">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="news-img">
                        </a>
                    @endif
                    <div class="news-body">
                        <h3 class="news-title">
                            <a href="{{ route('artikel.detail', $berita) }}">{{ $berita->judul }}</a>
                        </h3>
                    </div>
                </div>
            @empty
                <p>Belum ada artikel.</p>
            @endforelse
        </div>
        <p class="lihat-semua"><a href="{{ route('artikel') }}">Lihat semua artikel →</a></p>
    </section>

    {{-- VISI MISI (dari tabel profil perusahaan) --}}
    <section class="visimisi-section">
        <div class="container">
            <div class="visimisi-wrapper">
                <img src="{{ asset('images/visimisi.svg') }}" alt="Visi dan Misi" class="visimisi-img">

                <div class="visimisi-content">
                    <h2 class="visimisi-title">Visi & Misi Kami</h2>

                    <div class="info-item">
                        <div class="info-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="info-heading">Visi</h3>
                            <p class="info-text">{{ $profil->visi }}</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="info-heading">Misi</h3>
                            <ul class="info-list">
                                @foreach ($profil->daftarMisi() as $misi)
                                    <li>{{ $misi }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="cta-section container">
        <h2 class="cta-title">Butuh Solusi Teknologi untuk Usaha Anda?</h2>
        <p class="cta-desc">
            Hubungi tim {{ $profil->nama }} sekarang dan konsultasikan kebutuhan Anda secara gratis.
        </p>
        <a href="{{ route('kontak') }}" class="btn-primary">Hubungi Kami <span>→</span></a>
    </section>

@endsection