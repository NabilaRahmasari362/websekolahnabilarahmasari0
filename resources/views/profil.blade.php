@extends('layouts.app')

@section('title', 'Profil Perusahaan')

@section('content')

    {{-- HERO --}}
    <section class="profile-hero">
        <img src="{{ asset('images/background 2.jfif') }}" class="profile-hero-img" alt="Profil {{ $profil->nama }}">
        <div class="profile-hero-overlay">
            <div class="container">
                <h1 class="profile-hero-title">Profil Perusahaan</h1>
            </div>
        </div>
    </section>

    {{-- TENTANG KAMI (isi dari tabel profil_perusahaans, diubah lewat admin) --}}
    <section class="about-section container">
        <div class="about-grid">
            <div class="about-content">
                <span class="section-badge">TENTANG KAMI</span>
                <h2 class="about-title">{{ $profil->nama }}</h2>

                @foreach (preg_split('/\r\n\s*\r\n|\n\s*\n/', (string) $profil->tentang) as $paragraf)
                    @if (trim($paragraf) !== '')
                        <p class="about-text">{{ trim($paragraf) }}</p>
                    @endif
                @endforeach

                <div class="about-stats">
                    <div class="stat-item">
                        <h3 class="stat-number">{{ \App\Models\Produk::count() }}</h3>
                        <p class="stat-label">LAYANAN</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="stat-number">{{ \App\Models\Berita::count() }}</h3>
                        <p class="stat-label">ARTIKEL</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="stat-number">{{ \App\Models\Galeri::count() }}</h3>
                        <p class="stat-label">KEGIATAN</p>
                    </div>
                </div>
            </div>
            <div class="about-image">
                <img src="{{ $profil->gambar ? asset('storage/' . $profil->gambar) : asset('images/tentang.svg') }}" alt="{{ $profil->nama }}">
            </div>
        </div>
    </section>

    {{-- VISI & MISI --}}
    <section class="visimisi-section">
        <div class="container">
            <div class="visimisi-wrapper">
                <img src="{{ asset('images/visi misi.jpg') }}" alt="Visi dan Misi" class="visimisi-img">

                <div class="visimisi-content">
                    <h2 class="visimisi-title">Visi & Misi</h2>

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

    {{-- IDENTITAS PERUSAHAAN --}}
    <section class="identitas-section container">
        <h2 class="identitas-title">Identitas Perusahaan</h2>

        <div class="identitas-card">
            <div class="identitas-grid">

                <div class="identitas-col">
                    <div class="identitas-item">
                        <div class="identitas-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/></svg>
                        </div>
                        <div>
                            <p class="identitas-label">NAMA PERUSAHAAN</p>
                            <p class="identitas-value">{{ strtoupper($profil->nama) }}</p>
                        </div>
                    </div>

                    <div class="identitas-item">
                        <div class="identitas-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                        </div>
                        <div>
                            <p class="identitas-label">ALAMAT</p>
                            <p class="identitas-value">{{ $profil->alamat }}</p>
                        </div>
                    </div>
                </div>

                <div class="identitas-col">
                    <div class="identitas-item">
                        <div class="identitas-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                        </div>
                        <div>
                            <p class="identitas-label">EMAIL</p>
                            <p class="identitas-value">{{ $profil->email }}</p>
                        </div>
                    </div>

                    <div class="identitas-item">
                        <div class="identitas-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a1.5 1.5 0 001.5-1.5v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                        </div>
                        <div>
                            <p class="identitas-label">TELEPON</p>
                            <p class="identitas-value">{{ $profil->telepon }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection