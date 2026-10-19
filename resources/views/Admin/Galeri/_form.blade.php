<div class="form-group">
    <label for="keterangan">Keterangan (opsional)</label>
    <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan', $galeri->keterangan ?? '') }}" placeholder="Contoh: Praktek Uji Kompetensi TJKT">
    @error('keterangan')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="gambar">Foto (jpg, png, webp - maks 2 MB)</label>

    @if (isset($galeri) && $galeri->gambar)
        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="" class="admin-preview">
        <small class="form-hint">Kosongkan jika tidak ingin mengganti foto.</small>
    @endif

    <input type="file" id="gambar" name="gambar" accept="image/*">
    @error('gambar')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>