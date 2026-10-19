<div class="form-group">
    <label for="nama">Nama Jurusan</label>
    <input type="text" id="nama" name="nama" value="{{ old('nama', $kejuruan->nama ?? '') }}" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
    @error('nama')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" rows="5" placeholder="Jelaskan fokus pembelajaran jurusan ini...">{{ old('deskripsi', $kejuruan->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="gambar">Gambar (jpg, png, webp - maks 2 MB)</label>

    @if (isset($kejuruan) && $kejuruan->gambar)
        <img src="{{ asset('storage/' . $kejuruan->gambar) }}" alt="" class="admin-preview">
        <small class="form-hint">Kosongkan jika tidak ingin mengganti gambar.</small>
    @endif

    <input type="file" id="gambar" name="gambar" accept="image/*">
    @error('gambar')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>