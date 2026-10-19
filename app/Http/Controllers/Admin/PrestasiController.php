<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    private function aturan(): array
    {
        return [
            'judul'  => 'required|string|max:200',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function index()
    {
        $prestasis = Prestasi::latest()->get();

        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->aturan());

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('prestasi', 'public');
        }

        Prestasi::create($data);

        return redirect()->route('admin.prestasi.index')
            ->with('sukses', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $data = $request->validate($this->aturan());

        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar) {
                Storage::disk('public')->delete($prestasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')
            ->with('sukses', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->gambar) {
            Storage::disk('public')->delete($prestasi->gambar);
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')
            ->with('sukses', 'Prestasi berhasil dihapus.');
    }
}