@extends('layouts.admin')

@section('content')
<div class="admin-head">
    <h1 class="admin-title">Tambah Prestasi</h1>
    <a href="{{ route('admin.prestasi.index') }}" class="btn-admin-outline">← Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @include('Admin.prestasi._form')
    </form>
</div>
@endsection