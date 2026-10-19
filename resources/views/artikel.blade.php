@extends('layouts.app')

@section('title', 'Artikel / Informasi Terkini')

@section('content')

    @php
        $fotoBanner = 'images/background 2.jfif';
    @endphp

    {{-- HERO --}}
    <section class="jurusan-hero" style="background-image: url('{{ asset($fotoBanner) }}')">
        <div class="container">
            <h1 class="jurusan-hero-title">Artikel / Informasi Terkini</h1>
            <p class="jurusan-hero-desc">
                Kabar, tips, dan wawasan terbaru seputar layanan dan teknologi dari kami.
            </p>
        </div>
    </section>

    {{-- DAFTAR ARTIKEL (dinamis dari database) --}}
    <section class="news-section container">
        <div class="news-grid news-grid-3">
            @forelse ($beritas as $berita)
                <article class="news-card">
                    @if ($berita->gambar)
                        <a href="{{ route('artikel.detail', $berita) }}">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="news-img" loading="lazy">
                        </a>
                    @endif
                    <div class="news-body">
                        <p class="artikel-tanggal">{{ $berita->created_at->locale('id')->translatedFormat('d F Y') }}</p>
                        <h2 class="news-title">
                            <a href="{{ route('artikel.detail', $berita) }}">{{ $berita->judul }}</a>
                        </h2>
                        <p class="artikel-ringkas">{{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 110) }}</p>
                        <a href="{{ route('artikel.detail', $berita) }}" class="artikel-baca">Baca selengkapnya →</a>
                    </div>
                </article>
            @empty
                <p class="admin-empty">Belum ada artikel yang ditambahkan.</p>
            @endforelse
        </div>
    </section>

@endsection