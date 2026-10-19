@extends('layouts.app')

@section('content')

    {{-- HERO --}}
    <section class="profile-hero">
        <img src="{{ asset('images/profil-hero.jpg') }}" class="profile-hero-img" alt="Profil SMKN 4 Bogor">
        <div class="profile-hero-overlay">
            <div class="container">
                <h1 class="profile-hero-title">Profil Sekolah</h1>
            </div>
        </div>
    </section>

    {{-- TENTANG KAMI --}}
    <section class="about-section container">
        <div class="about-grid">
            <div class="about-content">
                <span class="section-badge">TENTANG KAMI</span>
                <h2 class="about-title">Membangun Generasi Unggul dan Berkarakter</h2>

                <p class="about-text">
                    SMKN 4 Bogor merupakan sekolah menengah kejuruan yang berkomitmen untuk menghasilkan lulusan yang kompeten, berkarakter, dan siap bersaing di dunia kerja maupun dunia industri.
                </p>
                <p class="about-text">
                    Kami menyediakan pendidikan berkualitas dengan dukungan tenaga pendidik profesional dan fasilitas modern yang sesuai dengan standar industri terkini. Fokus kami tidak hanya pada keahlian teknis, tetapi juga pengembangan etika kerja dan jiwa kewirausahaan.
                </p>

                <div class="about-stats">
                    <div class="stat-item">
                        <h3 class="stat-number">4</h3>
                        <p class="stat-label">JURUSAN</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="stat-number">1.6k+</h3>
                        <p class="stat-label">SISWA</p>
                    </div>
                    <div class="stat-item">
                        <h3 class="stat-number">80+</h3>
                        <p class="stat-label">GURU</p>
                    </div>
                </div>
            </div>

            <div class="about-image">
                <img src="{{ asset('images/profil-siswa.jpg') }}" alt="Kegiatan siswa SMKN 4 Bogor">
            </div>
        </div>
    </section>

    {{-- PRESTASI TERBARU --}}
    <section class="prestasi-section">
        <div class="container">
            <h2 class="section-title">Prestasi Terbaru</h2>

            <div class="prestasi-list">
                @forelse ($prestasis as $prestasi)
                    <div class="prestasi-item">
                        <div class="prestasi-thumb">
                            @if ($prestasi->gambar)
                                <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="{{ $prestasi->judul }}">
                            @endif
                        </div>
                        <h3 class="prestasi-title">{{ $prestasi->judul }}</h3>
                    </div>
                @empty
                    <p class="admin-empty">Belum ada prestasi yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- IDENTITAS SEKOLAH --}}
    <section class="identitas-section container">
        <h2 class="identitas-title">Identitas Sekolah</h2>

        <div class="identitas-card">
            <div class="identitas-grid">

                {{-- Kolom kiri --}}
                <div class="identitas-col">
                    <div class="identitas-item">
                        <div class="identitas-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/></svg>
                        </div>
                        <div>
                            <p class="identitas-label">NAMA SEKOLAH</p>
                            <p class="identitas-value">SMKN 4 BOGOR</p>
                        </div>
                    </div>

                    <div class="identitas-item">
                        <div class="identitas-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                        </div>
                        <div>
                            <p class="identitas-label">ALAMAT</p>
                            <p class="identitas-value">Kec. Bogor Selatan Kota Bogor - Jawa Barat 16137</p>
                        </div>
                    </div>
                </div>

                {{-- Kolom kanan --}}
                <div class="identitas-col">
                    <div class="identitas-item">
                        <div class="identitas-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                        </div>
                        <div>
                            <p class="identitas-label">EMAIL RESMI</p>
                            <p class="identitas-value">smkn4@smkn4bogor.sch.id</p>
                        </div>
                    </div>

                    <div class="identitas-item">
                        <div class="identitas-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a1.5 1.5 0 001.5-1.5v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                        </div>
                        <div>
                            <p class="identitas-label">TELEPON</p>
                            <p class="identitas-value">0821 226 2442</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection