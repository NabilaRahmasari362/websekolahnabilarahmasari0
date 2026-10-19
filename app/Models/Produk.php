<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model "Produk / Layanan" (nama class tetap Produk agar route & view lama tetap jalan)
class Produk extends Model
{
    protected $table = 'produks';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar',
    ];
}