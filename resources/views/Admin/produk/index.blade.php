@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Kelola Produk</h1>
        <a href="{{ route('admin.produk.create') }}" class="btn-admin">+ Tambah Produk</a>
    </div>

    @if (session('sukses'))
        <div class="admin-alert">{{ session('sukses') }}</div>
    @endif

    <div class="admin-card">
        @if ($produks->isEmpty())
            <p class="admin-empty">Belum ada produk. Klik "Tambah Produk" untuk membuat yang pertama.</p>
        @else
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr>
                            <td>
                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="" class="admin-thumb">
                                @else
                                    <span class="admin-thumb admin-thumb-empty"></span>
                                @endif
                            </td>
                            <td class="admin-judul">{{ $produk->nama }}</td>
                            <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>
                                <div class="admin-actions">
                                    <a href="{{ route('admin.produk.edit', $produk) }}" class="btn-admin-outline">Edit</a>

                                    <form method="POST" action="{{ route('admin.produk.destroy', $produk) }}" onsubmit="return confirm('Hapus produk ini?')">
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