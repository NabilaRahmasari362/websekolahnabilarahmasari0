@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Ubah Foto</h1>
        <a href="{{ route('admin.galeri.index') }}" class="btn-admin-outline">&larr; Kembali</a>
    </div>

    <form method="POST" action="{{ route('admin.galeri.update', $galeri) }}" enctype="multipart/form-data" class="admin-card admin-form">
        @csrf
        @method('PUT')
        @include('admin.galeri._form')

        <div class="form-actions">
            <button type="submit" class="btn-kirim">Simpan Perubahan</button>
        </div>
    </form>

@endsection