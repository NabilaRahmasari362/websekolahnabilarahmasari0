@extends('layouts.app')

@section('title', $berita->judul)

@section('content')

    <section class="artikel-detail container">
        <a href="{{ route('artikel') }}" class="artikel-kembali">← Kembali ke daftar artikel</a>

        <h1 class="artikel-judul">{{ $berita->judul }}</h1>
        <p class="artikel-tanggal">{{ $berita->created_at->locale('id')->translatedFormat('d F Y') }}</p>

        @if ($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="artikel-gambar">
        @endif

        <div class="artikel-isi">
            {!! nl2br(e($berita->isi)) !!}
        </div>
    </section>

    @if ($lainnya->isNotEmpty())
        <section class="news-section container">
            <h2 class="section-title">Artikel Lainnya</h2>
            <div class="news-grid news-grid-3">
                @foreach ($lainnya as $item)
                    <article class="news-card">
                        @if ($item->gambar)
                            <a href="{{ route('artikel.detail', $item) }}">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="news-img" loading="lazy">
                            </a>
                        @endif
                        <div class="news-body">
                            <h3 class="news-title">
                                <a href="{{ route('artikel.detail', $item) }}">{{ $item->judul }}</a>
                            </h3>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

@endsection