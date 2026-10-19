@csrf

<div class="form-group">
    <label for="judul">Judul Prestasi</label>
    <input type="text" id="judul" name="judul" value="{{ old('judul', $prestasi->judul ?? '') }}" required>
    @error('judul')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="gambar">Gambar</label>

    @if (!empty($prestasi->gambar))
        <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="{{ $prestasi->judul }}" class="admin-preview">
    @endif

    <input type="file" id="gambar" name="gambar" accept="image/*">
    <span class="form-hint">Format JPG, PNG, atau WEBP. Maksimal 2 MB.</span>
    @error('gambar')
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>

<div class="admin-actions">
    <button type="submit" class="btn-admin">Simpan</button>
    <a href="{{ route('admin.prestasi.index') }}" class="btn-admin-outline">Batal</a>
</div>