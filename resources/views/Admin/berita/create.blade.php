@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Tambah Berita</h1>
        <a href="{{ route('admin.berita.index') }}" class="btn-admin-outline">&larr; Kembali</a>
    </div>

    <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data" class="admin-card admin-form">
        @csrf
        @include('admin.berita._form')

        <div class="form-actions">
            <button type="submit" class="btn-kirim">Simpan</button>
        </div>
    </form>

@endsection