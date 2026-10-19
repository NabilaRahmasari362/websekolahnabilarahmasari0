@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Ubah Jurusan</h1>
        <a href="{{ route('admin.kejuruan.index') }}" class="btn-admin-outline">&larr; Kembali</a>
    </div>

    <form method="POST" action="{{ route('admin.kejuruan.update', $kejuruan) }}" enctype="multipart/form-data" class="admin-card admin-form">
        @csrf
        @method('PUT')
        @include('admin.kejuruan._form')

        <div class="form-actions">
            <button type="submit" class="btn-kirim">Simpan Perubahan</button>
        </div>
    </form>

@endsection