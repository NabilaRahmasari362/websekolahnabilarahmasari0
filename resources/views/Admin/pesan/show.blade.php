@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Detail Pesan</h1>
        <a href="{{ route('admin.pesan.index') }}" class="btn-admin-outline">&larr; Kembali</a>
    </div>

    <div class="admin-card admin-form">
        <div class="form-group">
            <label>Nama Pengirim</label>
            <p class="pesan-detail-value">{{ $pesan->nama }}</p>
        </div>

        <div class="form-group">
            <label>Alamat Email</label>
            <p class="pesan-detail-value">{{ $pesan->email }}</p>
        </div>

        <div class="form-group">
            <label>Subjek</label>
            <p class="pesan-detail-value">{{ $pesan->subjek }}</p>
        </div>

        <div class="form-group">
            <label>Tanggal Dikirim</label>
            <p class="pesan-detail-value">{{ $pesan->created_at->format('d F Y, H:i') }} WIB</p>
        </div>

        <div class="form-group">
            <label>Isi Pesan</label>
            <p class="pesan-detail-isi">{{ $pesan->pesan }}</p>
        </div>

        <div class="form-actions">
            <a href="mailto:{{ $pesan->email }}?subject=Re: {{ $pesan->subjek }}" class="btn-kirim">Balas via Email</a>
        </div>
    </div>

@endsection