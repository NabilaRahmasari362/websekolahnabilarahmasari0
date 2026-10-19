<?php

namespace App\Providers;

use App\Models\ProfilPerusahaan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Kirim data profil perusahaan ke layout publik (navbar & footer),
        // sehingga nama, alamat, telepon, dan email tidak perlu ditulis berulang.
        View::composer('layouts.app', function ($view) {
            $view->with('profil', Schema::hasTable('profil_perusahaans')
                ? ProfilPerusahaan::ambil()
                : new ProfilPerusahaan(['nama' => 'PT Solusi Koneksi Anda']));
        });
    }
}