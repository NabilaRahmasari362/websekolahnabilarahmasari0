@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Kelola Berita</h1>
        <a href="{{ route('admin.berita.create') }}" class="btn-admin">+ Tambah Berita</a>
    </div>

    @if (session('sukses'))
        <div class="admin-alert">{{ session('sukses') }}</div>
    @endif

    <div class="admin-card">
        @if ($beritas->isEmpty())
            <p class="admin-empty">Belum ada berita. Klik "Tambah Berita" untuk membuat yang pertama.</p>
        @else
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beritas as $berita)
                        <tr>
                            <td>
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" class="admin-thumb">
                                @else
                                    <span class="admin-thumb admin-thumb-empty"></span>
                                @endif
                            </td>
                            <td class="admin-judul">{{ $berita->judul }}</td>
                            <td>{{ $berita->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="admin-actions">
                                    <a href="{{ route('admin.berita.edit', $berita) }}" class="btn-admin-outline">Edit</a>

                                    <form method="POST" action="{{ route('admin.berita.destroy', $berita) }}" onsubmit="return confirm('Hapus berita ini?')">
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