@extends('layouts.admin')

@section('content')
    <div class="admin-head">
        <h1 class="admin-title">Profil Perusahaan</h1>
    </div>

    <p class="admin-welcome">Perubahan di sini langsung tampil di halaman Profil Perusahaan pada website.</p>

    @if (session('sukses'))
        <div class="admin-alert">{{ session('sukses') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.profil.update') }}" enctype="multipart/form-data" class="admin-form">
        @csrf
        @method('PUT')

        <div class="admin-card profil-card">
            <h2 class="profil-card-title">Identitas</h2>

            <div class="form-group">
                <label for="nama">Nama Perusahaan</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $profil->nama) }}" required>
                @error('nama') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="tagline">Tagline</label>
                <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $profil->tagline) }}">
                @error('tagline') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="gambar">Gambar Profil</label>
                @if ($profil->gambar)
                    <img class="admin-preview" src="{{ asset('storage/' . $profil->gambar) }}" alt="Gambar profil saat ini">
                @endif
                <input type="file" id="gambar" name="gambar" accept="image/png,image/jpeg,image/webp">
                <span class="form-hint">JPG, PNG, atau WEBP, maksimal 2 MB. Kosongkan jika tidak ingin mengganti gambar.</span>
                @error('gambar') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="admin-card profil-card">
            <h2 class="profil-card-title">Tentang, Visi, dan Misi</h2>

            <div class="form-group">
                <label for="tentang">Tentang Perusahaan</label>
                <textarea id="tentang" name="tentang">{{ old('tentang', $profil->tentang) }}</textarea>
                @error('tentang') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="visi">Visi</label>
                <textarea id="visi" name="visi">{{ old('visi', $profil->visi) }}</textarea>
                @error('visi') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="misi">Misi</label>
                <textarea id="misi" name="misi">{{ old('misi', $profil->misi) }}</textarea>
                <span class="form-hint">Satu poin misi per baris.</span>
                @error('misi') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="admin-card profil-card">
            <h2 class="profil-card-title">Kontak</h2>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $profil->alamat) }}">
                @error('alamat') <span class="form-error">{{ $message }}</span> @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $profil->telepon) }}">
                    @error('telepon') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $profil->whatsapp) }}">
                    @error('whatsapp') <span class="form-error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $profil->email) }}">
                @error('email') <span class="form-error">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="btn-admin">Simpan Perubahan</button>
    </form>
@endsection