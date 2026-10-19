@extends('layouts.app')

{{-- Footer sederhana (logo + copyright) khusus halaman ini --}}
@section('footer_simple', 'aktif')

@section('content')

    {{-- HERO --}}
    <section class="jurusan-hero">
        <div class="container">
            <h1 class="jurusan-hero-title">Jurusan SMKN4 Bogor</h1>
            <p class="jurusan-hero-desc">
                Persiapkan masa depan cerah melalui kurikulum berbasis industri dan fasilitas modern yang menunjang keahlian praktis Anda.
            </p>
        </div>
    </section>

    {{-- DAFTAR JURUSAN --}}
    <section class="jurusan-section container">
        @forelse ($kejuruans as $kejuruan)
            <article class="jurusan-card">
                <div class="jurusan-info">
                    <span class="jurusan-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" width="22" height="22">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7l-5 5 5 5M16 7l5 5-5 5"/>
                        </svg>
                    </span>
                    <h2 class="jurusan-title">{{ $kejuruan->nama }}</h2>
                    @if ($kejuruan->deskripsi)
                        <p class="jurusan-desc">{{ $kejuruan->deskripsi }}</p>
                    @endif
                </div>

                @if ($kejuruan->gambar)
                    <img src="{{ asset('storage/' . $kejuruan->gambar) }}" alt="{{ $kejuruan->nama }}" class="jurusan-photo" loading="lazy">
                @else
                    <div class="jurusan-photo"></div>
                @endif
            </article>
        @empty
            <p class="admin-empty">Belum ada jurusan yang ditambahkan.</p>
        @endforelse
    </section>

@endsection