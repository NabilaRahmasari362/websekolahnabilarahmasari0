<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kejuruan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KejuruanController extends Controller
{
    private function aturan(): array
    {
        return [
            'nama'      => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function index()
    {
        $kejuruans = Kejuruan::latest()->get();

        return view('admin.kejuruan.index', compact('kejuruans'));
    }

    public function create()
    {
        return view('admin.kejuruan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->aturan());

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('kejuruan', 'public');
        }

        Kejuruan::create($data);

        return redirect()->route('admin.kejuruan.index')
            ->with('sukses', 'Jurusan berhasil ditambahkan.');
    }

    public function edit(Kejuruan $kejuruan)
    {
        return view('admin.kejuruan.edit', compact('kejuruan'));
    }

    public function update(Request $request, Kejuruan $kejuruan)
    {
        $data = $request->validate($this->aturan());

        if ($request->hasFile('gambar')) {
            if ($kejuruan->gambar) {
                Storage::disk('public')->delete($kejuruan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('kejuruan', 'public');
        }

        $kejuruan->update($data);

        return redirect()->route('admin.kejuruan.index')
            ->with('sukses', 'Jurusan berhasil diperbarui.');
    }

    public function destroy(Kejuruan $kejuruan)
    {
        if ($kejuruan->gambar) {
            Storage::disk('public')->delete($kejuruan->gambar);
        }

        $kejuruan->delete();

        return redirect()->route('admin.kejuruan.index')
            ->with('sukses', 'Jurusan berhasil dihapus.');
    }
}