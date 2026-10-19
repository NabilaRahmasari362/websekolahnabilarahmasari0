<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KejuruanController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\AuthController;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kejuruan;
use App\Models\Pesan;
use App\Models\Prestasi;
use App\Models\Produk;
use App\Models\ProfilPerusahaan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/* ---------- HALAMAN PUBLIK ---------- */

// 1. Beranda
Route::get('/', function () {
    $profil  = ProfilPerusahaan::ambil();
    $beritas = Berita::latest()->take(3)->get();
    $produks = Produk::latest()->take(4)->get();

    return view('welcome', compact('profil', 'beritas', 'produks'));
})->name('beranda');


// 2. Profil Perusahaan
Route::get('/profil', function () {
    $profil = ProfilPerusahaan::ambil();

    return view('profil', compact('profil'));
})->name('profil');


// 3. Kejuruan / Jurusan
Route::get('/kejuruan', function () {
    $kejuruans = Kejuruan::latest()->get();

    return view('kejuruan', compact('kejuruans'));
})->name('kejuruan');


// 4. Produk / Layanan
Route::get('/produk', function () {
    $produks = Produk::latest()->get();

    return view('produk', compact('produks'));
})->name('produk');


// 5. Artikel
Route::get('/artikel', function () {
    $beritas = Berita::latest()->get();

    return view('artikel', compact('beritas'));
})->name('artikel');

Route::get('/artikel/{berita}', function (Berita $berita) {
    $lainnya = Berita::where('id', '!=', $berita->id)
        ->latest()
        ->take(3)
        ->get();

    return view('artikel-detail', compact('berita', 'lainnya'));
})->name('artikel.detail');


// 6. Galeri
Route::get('/galeri', function () {
    $galeris = Galeri::latest()->get();

    return view('galeri', compact('galeris'));
})->name('galeri');


// 7. Kontak
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/kontak', function (Request $request) {
    $data = $request->validate([
        'nama'   => 'required|string|max:100',
        'email'  => 'required|email|max:100',
        'subjek' => 'required|string|max:100',
        'pesan'  => 'required|string|max:2000',
    ]);

    Pesan::create($data);

    return redirect()->route('kontak')
        ->with('sukses', 'Terima kasih! Pesan Anda sudah kami terima.');
})->name('kontak.kirim');


// 8. Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.proses');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/* ---------- ADMIN (WAJIB LOGIN) ---------- */

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', function () {
            return view('admin.dashboard', [
                'totalBerita'    => Berita::count(),
                'totalProduk'    => Produk::count(),
                'totalGaleri'    => Galeri::count(),
                'totalPesanBaru' => Pesan::where('sudah_dibaca', false)->count(),
                'totalPrestasi'  => Prestasi::count(),
                'totalKejuruan'  => Kejuruan::count(),
            ]);
        })->name('dashboard');


        // Profil Perusahaan (hanya edit & update)
        Route::get('profil', [ProfilController::class, 'edit'])
            ->name('profil.edit');

        Route::put('profil', [ProfilController::class, 'update'])
            ->name('profil.update');


        // Artikel / Berita
        Route::resource('berita', BeritaController::class)
            ->parameters(['berita' => 'berita'])
            ->except(['show']);


        // Produk / Layanan
        Route::resource('produk', ProdukController::class)
            ->parameters(['produk' => 'produk'])
            ->except(['show']);


        // Prestasi
        Route::resource('prestasi', PrestasiController::class)
            ->parameters(['prestasi' => 'prestasi'])
            ->except(['show']);


        // Galeri
        Route::resource('galeri', GaleriController::class)
            ->parameters(['galeri' => 'galeri'])
            ->except(['show']);


        // Kejuruan / Jurusan
        Route::resource('kejuruan', KejuruanController::class)
            ->parameters(['kejuruan' => 'kejuruan'])
            ->except(['show']);


        // Pesan masuk
        Route::resource('pesan', PesanController::class)
            ->parameters(['pesan' => 'pesan'])
            ->only(['index', 'show', 'destroy']);

    });