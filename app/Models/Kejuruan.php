<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kejuruan extends Model
{
    protected $table = 'kejuruans';

    protected $fillable = ['nama', 'deskripsi', 'gambar'];
}