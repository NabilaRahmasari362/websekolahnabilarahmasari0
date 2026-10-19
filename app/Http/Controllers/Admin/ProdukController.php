<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// CRUD Produk / Layanan
class ProdukController extends Controller
{
    private function aturan(): array
    {
        return [
            'nama'      => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'harga'     => 'nullable|integer|min:0',   // kosong = "Hubungi kami"
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8508',
        ];
    }

    public function index()
    {
        $produks = Produk::latest()->get();

        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->aturan());

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()->route('admin.produk.index')
            ->with('sukses', 'Produk / layanan berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate($this->aturan());

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')
            ->with('sukses', 'Produk / layanan berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')
            ->with('sukses', 'Produk / layanan berhasil dihapus.');
    }
}