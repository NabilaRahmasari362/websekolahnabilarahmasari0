<div class="form-group">
    <label for="nama">Nama Produk</label>
    <input type="text" id="nama" name="nama" value="{{ old('nama', $produk->nama ?? '') }}" placeholder="Contoh: Kaos SMKN 4 Bogor" required>
    @error('nama')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-row">
    <div class="form-group">
        <label for="harga">Harga (Rp)</label>
        <input type="number" id="harga" name="harga" min="0" value="{{ old('harga', $produk->harga ?? '') }}" placeholder="Contoh: 75000" required>
        @error('harga')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" id="stok" name="stok" min="0" value="{{ old('stok', $produk->stok ?? 0) }}" placeholder="Contoh: 20" required>
        @error('stok')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi (opsional)</label>
    <textarea id="deskripsi" name="deskripsi" rows="5" placeholder="Bahan, ukuran, atau info produk lainnya...">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="gambar">Foto Produk (jpg, png, webp - maks 5 MB)</label>

    @if (isset($produk) && $produk->gambar)
        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="" class="admin-preview">
        <small class="form-hint">Kosongkan jika tidak ingin mengganti foto.</small>
    @endif

    <input type="file" id="gambar" name="gambar" accept="image/*">
    @error('gambar')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>