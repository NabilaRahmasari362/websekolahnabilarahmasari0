@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Kelola Kejuruan</h1>
        <a href="{{ route('admin.kejuruan.create') }}" class="btn-admin">+ Tambah Jurusan</a>
    </div>

    @if (session('sukses'))
        <div class="admin-alert">{{ session('sukses') }}</div>
    @endif

    <div class="admin-card">
        @if ($kejuruans->isEmpty())
            <p class="admin-empty">Belum ada jurusan. Klik "Tambah Jurusan" untuk membuat yang pertama.</p>
        @else
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kejuruans as $kejuruan)
                        <tr>
                            <td>
                                @if ($kejuruan->gambar)
                                    <img src="{{ asset('storage/' . $kejuruan->gambar) }}" alt="" class="admin-thumb">
                                @else
                                    <span class="admin-thumb admin-thumb-empty"></span>
                                @endif
                            </td>
                            <td class="admin-judul">{{ $kejuruan->nama }}</td>
                            <td>
                                <div class="admin-actions">
                                    <a href="{{ route('admin.kejuruan.edit', $kejuruan) }}" class="btn-admin-outline">Edit</a>

                                    <form method="POST" action="{{ route('admin.kejuruan.destroy', $kejuruan) }}" onsubmit="return confirm('Hapus jurusan ini?')">
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