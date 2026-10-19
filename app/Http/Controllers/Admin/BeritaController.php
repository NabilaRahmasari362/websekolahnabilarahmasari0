<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Aturan isian formulir (dipakai untuk tambah & ubah)
    private function aturan(): array
    {
        return [
            'judul'  => 'required|string|max:150',
            'isi'    => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    // READ: daftar artikel
    public function index()
    {
        $beritas = Berita::latest()->get();

        return view('admin.berita.index', compact('beritas'));
    }

    // CREATE: tampilkan formulir
    public function create()
    {
        return view('admin.berita.create');
    }

    // CREATE: simpan ke database
    public function store(Request $request)
    {
        $data = $request->validate($this->aturan());

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')
            ->with('sukses', 'Artikel berhasil ditambahkan.');
    }

    // UPDATE: tampilkan formulir ubah
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    // UPDATE: simpan perubahan
    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate($this->aturan());

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')
            ->with('sukses', 'Artikel berhasil diperbarui.');
    }

    // DELETE: hapus artikel (dan gambarnya)
    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('sukses', 'Artikel berhasil dihapus.');
    }
}