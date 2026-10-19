<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::latest()->get();

        return view('admin.pesan.index', compact('pesans'));
    }

    // Tampilkan detail pesan, sekaligus tandai sudah dibaca
    public function show(Pesan $pesan)
    {
        $pesan->update(['sudah_dibaca' => true]);

        return view('admin.pesan.show', compact('pesan'));
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();

        return redirect()->route('admin.pesan.index')
            ->with('sukses', 'Pesan berhasil dihapus.');
    }
}