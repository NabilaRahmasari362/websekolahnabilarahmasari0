@extends('layouts.app')

@section('title', 'Produk / Layanan')

@section('content')

    @php
        // Nomor WhatsApp diambil dari profil perusahaan (bisa diubah lewat admin)
        $profil = \App\Models\ProfilPerusahaan::ambil();
    @endphp

    {{-- HERO --}}
    <section class="jurusan-hero"
        style="background-image: url('{{ asset('images/background 2.jfif') }}');">

        <div class="container">
            <h1 class="jurusan-hero-title">Produk / Layanan</h1>

            <p class="jurusan-hero-desc">
                Solusi konektivitas dan teknologi informasi dari
                {{ $profil->nama }} untuk mendukung kebutuhan usaha Anda.
            </p>
        </div>
    </section>

    {{-- DAFTAR PRODUK / LAYANAN (dinamis dari database) --}}
    <section class="produk-section container">
        @if ($produks->isEmpty())
            <p class="produk-empty">Belum ada produk / layanan saat ini.</p>
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
                            <h2 class="produk-nama">{{ $p->nama }}</h2>
                            <p class="produk-harga">
                                @if ($p->harga)
                                    Rp{{ number_format($p->harga, 0, ',', '.') }}
                                @else
                                    Hubungi kami
                                @endif
                            </p>
                            @if ($p->deskripsi)
                                <p class="produk-desc">{{ \Illuminate\Support\Str::limit($p->deskripsi, 90) }}</p>
                            @endif

                            @if ($profil->whatsapp)
                                @php
                                    $pesanWa = "Halo, saya ingin bertanya tentang {$p->nama} di website {$profil->nama}.";
                                @endphp
                                <a href="https://wa.me/{{ preg_replace('/\D+/', '', $profil->whatsapp) }}?text={{ urlencode($pesanWa) }}"
                                   target="_blank" rel="noopener" class="produk-beli">
                                    Tanya via WhatsApp
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>

@endsection