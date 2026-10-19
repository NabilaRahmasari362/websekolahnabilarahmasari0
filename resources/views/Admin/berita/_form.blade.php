<div class="form-group">
    <label for="judul">Judul Berita</label>
    <input type="text" id="judul" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" placeholder="Tulis judul berita" required>
    @error('judul')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="isi">Isi Berita</label>
    <textarea id="isi" name="isi" rows="8" placeholder="Tulis isi berita di sini..." required>{{ old('isi', $berita->isi ?? '') }}</textarea>
    @error('isi')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="gambar">Gambar (jpg, png, webp - maks 2 MB)</label>

    @if (isset($berita) && $berita->gambar)
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" class="admin-preview">
        <small class="form-hint">Kosongkan jika tidak ingin mengganti gambar.</small>
    @endif

    <input type="file" id="gambar" name="gambar" accept="image/*">
    @error('gambar')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>