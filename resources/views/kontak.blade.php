@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')

    @php
        // Data kontak diambil dari profil perusahaan (bisa diubah lewat admin)
        $profil = \App\Models\ProfilPerusahaan::ambil();
    @endphp

    {{-- HERO --}}
    <section class="kontak-hero">
        <img src="{{ asset('images/hero-kontak.svg') }}" alt="" class="kontak-hero-img">
        <div class="kontak-hero-overlay">
            <div class="container">
                <h1 class="kontak-hero-title">Hubungi Kami</h1>
                <p class="kontak-hero-desc">
                    Punya pertanyaan atau butuh penawaran layanan? Tim kami siap membantu memberikan informasi yang Anda butuhkan.
                </p>
            </div>
        </div>
    </section>

    {{-- ISI --}}
    <section class="kontak-section container">
        <div class="kontak-grid">

            {{-- KOLOM KIRI: informasi + peta --}}
            <div class="kontak-left">
                <div class="kontak-info">
                    <h2 class="kontak-heading">Informasi Kontak</h2>

                    <div class="kontak-item">
                        <span class="kontak-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                        </span>
                        <div>
                            <p class="kontak-label">Alamat Kantor</p>
                            <p class="kontak-text">{{ $profil->alamat }}</p>
                        </div>
                    </div>

                    <div class="kontak-item">
                        <span class="kontak-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a1.5 1.5 0 001.5-1.5v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                        </span>
                        <div>
                            <p class="kontak-label">Telepon</p>
                            <p class="kontak-text kontak-strong">{{ $profil->telepon }}</p>
                        </div>
                    </div>

                    <div class="kontak-item">
                        <span class="kontak-icon">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="22" height="22"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                        </span>
                        <div>
                            <p class="kontak-label">Email</p>
                            <p class="kontak-text">{{ $profil->email }}</p>
                        </div>
                    </div>
                </div>

                {{-- PETA GOOGLE MAPS --}}
                <div class="kontak-map">
                    <span class="kontak-map-tag">Lokasi Kami</span>
                    <iframe
                        src="https://maps.google.com/maps?q=Jl.%20Raya%20Pajajaran%20Bogor&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        title="Peta lokasi {{ $profil->nama }}"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            {{-- KOLOM KANAN: formulir --}}
            <div class="kontak-form-card">
                <h2 class="kontak-heading">Kirim Pesan</h2>
                <p class="kontak-form-intro">Silakan isi formulir di bawah ini untuk pertanyaan, permintaan penawaran, atau dukungan teknis.</p>

                @if (session('sukses'))
                    <div class="kontak-alert kontak-alert-ok">{{ session('sukses') }}</div>
                @endif

                @if ($errors->any())
                    <div class="kontak-alert kontak-alert-err">Mohon lengkapi formulir dengan benar, lalu kirim lagi.</div>
                @endif

                <form method="POST" action="{{ route('kontak.kirim') }}" class="kontak-form">
                    @csrf

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@contoh.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subjek">Subjek</label>
                        <select id="subjek" name="subjek" required>
                            <option value="" disabled {{ old('subjek') ? '' : 'selected' }}>Pilih Subjek Pesan</option>
                            @foreach (['Pertanyaan Umum', 'Permintaan Penawaran', 'Dukungan Teknis', 'Kerja Sama', 'Lainnya'] as $opsi)
                                <option value="{{ $opsi }}" {{ old('subjek') === $opsi ? 'selected' : '' }}>{{ $opsi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="6" placeholder="Tuliskan pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-kirim">
                            Kirim Pesan
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="18" height="18"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

@endsection