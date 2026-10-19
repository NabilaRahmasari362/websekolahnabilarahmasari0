@extends('layouts.admin')

@section('content')

    <div class="admin-head">
        <h1 class="admin-title">Pesan Masuk</h1>
    </div>

    @if (session('sukses'))
        <div class="admin-alert">{{ session('sukses') }}</div>
    @endif

    <div class="admin-card">
        @if ($pesans->isEmpty())
            <p class="admin-empty">Belum ada pesan masuk dari formulir Kontak.</p>
        @else
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Pengirim</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesans as $pesan)
                        <tr>
                            <td>
                                @if ($pesan->sudah_dibaca)
                                    <span class="pesan-status pesan-status-dibaca">Dibaca</span>
                                @else
                                    <span class="pesan-status pesan-status-baru">Baru</span>
                                @endif
                            </td>
                            <td>
                                <p class="admin-judul">{{ $pesan->nama }}</p>
                                <small class="form-hint">{{ $pesan->email }}</small>
                            </td>
                            <td>{{ $pesan->subjek }}</td>
                            <td>{{ $pesan->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="admin-actions">
                                    <a href="{{ route('admin.pesan.show', $pesan) }}" class="btn-admin-outline">Lihat</a>

                                    <form method="POST" action="{{ route('admin.pesan.destroy', $pesan) }}" onsubmit="return confirm('Hapus pesan ini?')">
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