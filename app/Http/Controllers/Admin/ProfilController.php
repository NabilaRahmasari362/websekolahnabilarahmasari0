<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Halaman Profil Perusahaan bersifat STATIS:
// admin hanya bisa mengubah (edit & update), tidak ada tambah / hapus.
class ProfilController extends Controller
{
    public function edit()
    {
        $profil = ProfilPerusahaan::ambil();

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nama'     => 'required|string|max:150',
            'tagline'  => 'nullable|string|max:200',
            'tentang'  => 'nullable|string',
            'visi'     => 'nullable|string',
            'misi'     => 'nullable|string',
            'alamat'   => 'nullable|string|max:255',
            'telepon'  => 'nullable|string|max:30',
            'whatsapp' => 'nullable|string|max:30',
            'email'    => 'nullable|email|max:150',
            'gambar'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Ambil baris yang sudah ada; kalau belum ada, buat baris pertama (hanya sekali).
        $profil = ProfilPerusahaan::first() ?? new ProfilPerusahaan();

        if ($request->hasFile('gambar')) {
            if ($profil->gambar) {
                Storage::disk('public')->delete($profil->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('profil', 'public');
        } else {
            unset($data['gambar']); // jangan menimpa gambar lama dengan kosong
        }

        $profil->fill($data)->save();

        return redirect()->route('admin.profil.edit')
            ->with('sukses', 'Profil perusahaan berhasil diperbarui.');
    }
}