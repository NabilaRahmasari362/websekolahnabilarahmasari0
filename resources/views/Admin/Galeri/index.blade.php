@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Kelola Galeri</h1>
        <a href="{{ route('admin.galeri.create') }}" class="btn-admin">+ Tambah Foto</a>
    </div>

    @if (session('sukses'))
        <div class="admin-alert">{{ session('sukses') }}</div>
    @endif

    <div class="admin-card">
        @if ($galeris->isEmpty())
            <p class="admin-empty">Belum ada foto. Klik "Tambah Foto" untuk mengunggah yang pertama.</p>
        @else
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeris as $galeri)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="" class="admin-thumb">
                            </td>
                            <td class="admin-judul">{{ $galeri->keterangan ?: '—' }}</td>
                            <td>
                                <div class="admin-actions">
                                    <a href="{{ route('admin.galeri.edit', $galeri) }}" class="btn-admin-outline">Edit</a>

                                    <form method="POST" action="{{ route('admin.galeri.destroy', $galeri) }}" onsubmit="return confirm('Hapus foto ini?')">
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