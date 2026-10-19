@extends('layouts.admin')

@section('content')
<div class="admin-head">
    <h1 class="admin-title">Kelola Prestasi</h1>
    <a href="{{ route('admin.prestasi.create') }}" class="btn-admin">+ Tambah Prestasi</a>
</div>

@if (session('sukses'))
    <div class="admin-alert">{{ session('sukses') }}</div>
@endif

<div class="admin-card">
    @if ($prestasis->isEmpty())
        <p class="admin-empty">Belum ada prestasi. Klik "Tambah Prestasi" untuk membuat yang pertama.</p>
    @else
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestasis as $p)
                    <tr>
                        <td>
                            @if ($p->gambar)
                                <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->judul }}" class="admin-thumb">
                            @else
                                <div class="admin-thumb admin-thumb-empty"></div>
                            @endif
                        </td>
                        <td class="admin-judul">{{ $p->judul }}</td>
                        <td>
                            <div class="admin-actions">
                                <a href="{{ route('admin.prestasi.edit', $p) }}" class="btn-admin-outline">Edit</a>
                                <form action="{{ route('admin.prestasi.destroy', $p) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus prestasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection