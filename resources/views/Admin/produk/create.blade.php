@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Tambah Produk</h1>
        <a href="{{ route('admin.produk.index') }}" class="btn-admin-outline">&larr; Kembali</a>
    </div>

    <form method="POST" action="{{ route('admin.produk.store') }}" enctype="multipart/form-data" class="admin-card admin-form">
        @csrf
        @include('admin.produk._form')

        <div class="form-actions">
            <button type="submit" class="btn-kirim">Simpan</button>
        </div>
    </form>

@endsection