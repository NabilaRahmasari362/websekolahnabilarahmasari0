@extends('layouts.app')

@section('title', 'Galeri Kegiatan')

@section('content')

    {{-- HERO --}}
    <section class="gallery-hero"
        style="background-image: url('{{ asset('images/background 2.jfif') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container gallery-hero-inner">
            <div class="gallery-hero-text">
                <h1 class="gallery-hero-title">Galeri Kegiatan</h1>
                <p class="gallery-hero-desc">
                    Dokumentasi kegiatan dan aktivitas tim PT Solusi Koneksi Anda bersama pelanggan dan mitra.
                </p>
            </div>
            <div class="gallery-hero-photos">
                <img src="{{ asset('images/galeri 3.png') }}" alt="Kegiatan perusahaan" class="hero-photo hero-photo-back">
                <img src="{{ asset('images/galeri 2.png') }}" alt="Kegiatan tim" class="hero-photo hero-photo-front">
            </div>
        </div>
    </section>

    {{-- GRID FOTO (dinamis dari database) --}}
    <section class="gallery-section container">
        @if ($galeris->isEmpty())
            <p class="admin-empty">Belum ada foto galeri yang ditambahkan.</p>
        @else
            <div class="gallery-grid">
                @foreach ($galeris as $foto)
                    <figure class="gallery-item">
                        <img src="{{ asset('storage/' . $foto->gambar) }}"
                             alt="{{ $foto->keterangan ?: 'Dokumentasi kegiatan perusahaan' }}" loading="lazy">
                        @if ($foto->keterangan)
                            <figcaption class="gallery-caption">{{ $foto->keterangan }}</figcaption>
                        @endif
                    </figure>
                @endforeach
            </div>
        @endif
    </section>

    {{-- CTA --}}
    <section class="gallery-cta">
        <div>
            <h2 class="gallery-cta-title">Ingin Berkonsultasi dengan Kami?</h2>
            <p class="cta-gap"></p>
            <a href="{{ route('kontak') }}" class="btn-primary">Hubungi Kami <span>→</span></a>
        </div>
    </section>

@endsection