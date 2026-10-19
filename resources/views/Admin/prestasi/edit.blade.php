@extends('layouts.admin')

@section('content')
<div class="admin-head">
    <h1 class="admin-title">Edit Prestasi</h1>
    <a href="{{ route('admin.prestasi.index') }}" class="btn-admin-outline">← Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.prestasi.update', $prestasi) }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @method('PUT')
        @include('Admin.prestasi._form')
    </form>
</div>
@endsection