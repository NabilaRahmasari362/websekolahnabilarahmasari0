@extends('layouts.admin')

@section('content')
    <div class="admin-head">
        <h1 class="admin-title">Ringkasan Admin</h1>
    </div>

    <p class="admin-welcome">Selamat datang kembali, Administrator. Berikut ringkasan konten website.</p>

    <div class="dash-grid">

        {{-- Produk / Layanan --}}
        <a href="{{ route('admin.produk.index') }}" class="dash-card">
            <div class="dash-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.653v-1.941c0-.75-.371-1.451-.99-1.87L15.144 5.42a2.25 2.25 0 00-1.254-.383H10.11c-.44 0-.87.13-1.254.383L3.99 8.685C3.371 9.104 3 9.805 3 10.556v1.94c0 .657.279 1.263.75 1.654m16.5 0a2.25 2.25 0 01-1.5.573H5.25a2.25 2.25 0 01-1.5-.573m16.5 0v-.359c0-.615-.25-1.203-.693-1.63l-4.09-3.923"/></svg>
            </div>
            <div class="dash-number">{{ \App\Models\Produk::count() }}</div>
            <div class="dash-label">Produk / Layanan</div>
        </a>

        {{-- Artikel --}}
        <a href="{{ route('admin.berita.index') }}" class="dash-card">
            <div class="dash-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
            </div>
            <div class="dash-number">{{ \App\Models\Berita::count() }}</div>
            <div class="dash-label">Artikel</div>
        </a>

        {{-- Foto Galeri --}}
        <a href="{{ route('admin.galeri.index') }}" class="dash-card">
            <div class="dash-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/></svg>
            </div>
            <div class="dash-number">{{ \App\Models\Galeri::count() }}</div>
            <div class="dash-label">Foto Galeri</div>
        </a>

        {{-- Pesan Baru --}}
        <a href="{{ route('admin.pesan.index') }}" class="dash-card">
            <div class="dash-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
            </div>
            <div class="dash-number">{{ \App\Models\Pesan::where('sudah_dibaca', false)->count() }}</div>
            <div class="dash-label">Pesan Baru</div>
        </a>

    </div>
@endsection