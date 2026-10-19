<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Tabel profil perusahaan: hanya berisi 1 baris (halaman statis).
// Admin hanya boleh MENGUBAH baris ini, tidak menambah atau menghapus.
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tagline')->nullable();
            $table->text('tentang')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();      // satu poin misi per baris
            $table->string('alamat')->nullable();
            $table->string('telepon', 30)->nullable();
            $table->string('whatsapp', 30)->nullable(); // format 62xxxxxxxxxx
            $table->string('email')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_perusahaans');
    }
};