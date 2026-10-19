<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    protected $table = 'profil_perusahaans';

    protected $fillable = [
        'nama',
        'tagline',
        'tentang',
        'visi',
        'misi',
        'alamat',
        'telepon',
        'whatsapp',
        'email',
        'gambar',
    ];

    /**
     * Ambil satu-satunya baris profil.
     * Jika tabel masih kosong, kembalikan objek berisi nilai bawaan
     * supaya halaman publik tidak error.
     */
    public static function ambil(): self
    {
        return static::first() ?? new static([
            'nama'     => 'PT Solusi Koneksi Anda',
            'tagline'  => 'Mitra Teknologi dan Konektivitas Anda',
            'tentang'  => '',
            'visi'     => '',
            'misi'     => '',
            'alamat'   => '',
            'telepon'  => '',
            'whatsapp' => '',
            'email'    => '',
        ]);
    }

    /** Misi disimpan satu poin per baris; ubah menjadi array untuk ditampilkan. */
    public function daftarMisi(): array
    {
        return array_values(array_filter(
            array_map('trim', preg_split('/\r\n|\r|\n/', (string) $this->misi))
        ));
    }
}