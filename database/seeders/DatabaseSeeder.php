<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Produk;
use App\Models\ProfilPerusahaan;
use App\Models\User;
use Illuminate\Database\Seeder;

// Data awal PT Solusi Koneksi Anda (data contoh, bisa diubah lewat halaman admin).
// Gambar contoh diambil dari storage/app/public/seed/ (disediakan di Tahap 4).
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /* ---------- Akun admin ---------- */
        User::updateOrCreate(
            ['email' => 'admin@solusikoneksi.test'],
            ['name' => 'Administrator', 'password' => 'admin123']  // otomatis di-hash oleh model User
        );

        /* ---------- Profil perusahaan (hanya 1 baris) ---------- */
        ProfilPerusahaan::updateOrCreate(['id' => 1], [
            'nama'     => 'PT Solusi Koneksi Anda',
            'tagline'  => 'Mitra Teknologi dan Konektivitas Anda',
            'tentang'  => "PT Solusi Koneksi Anda adalah perusahaan penyedia solusi teknologi informasi dan konektivitas yang melayani kebutuhan bisnis, instansi, dan masyarakat. Kami hadir untuk memastikan setiap pelanggan tetap terhubung, aman, dan produktif.\n\nDidukung tim profesional dan berpengalaman, kami menyediakan layanan mulai dari internet dedicated, instalasi jaringan, pengembangan website dan aplikasi, hingga dukungan teknis berkelanjutan.",
            'visi'     => 'Menjadi mitra teknologi terpercaya yang menghubungkan bisnis dan masyarakat dengan solusi yang andal dan inovatif.',
            'misi'     => "Menyediakan layanan konektivitas yang stabil dan terjangkau.\nMemberikan solusi teknologi yang sesuai kebutuhan pelanggan.\nMenjaga kualitas layanan melalui dukungan teknis yang cepat dan ramah.\nMengembangkan sumber daya manusia yang kompeten dan berintegritas.",
            'alamat'   => 'Jl. Contoh Raya No. 10, Kota Bogor, Jawa Barat 16100',
            'telepon'  => '0251 123 4567',
            'whatsapp' => '6281234567890',
            'email'    => 'info@solusikoneksi.test',
            'gambar'   => 'seed/profil.svg',
        ]);

        /* ---------- Produk / Layanan ---------- */
        // Hanya diisi jika tabel masih kosong, supaya seeder aman dijalankan ulang.
        if (Produk::count() === 0) {
            Produk::insert([
                [
                    'nama'       => 'Internet Dedicated Bisnis',
                    'deskripsi'  => 'Koneksi internet khusus dengan bandwidth terjamin, stabil 24 jam, cocok untuk kantor dan usaha.',
                    'harga'      => 1500000,
                    'gambar'     => 'seed/layanan1.svg',
                    'created_at' => now()->subDays(3), 'updated_at' => now()->subDays(3),
                ],
                [
                    'nama'       => 'Instalasi dan Konfigurasi Jaringan',
                    'deskripsi'  => 'Perancangan, pemasangan kabel, dan konfigurasi jaringan LAN/WiFi untuk kantor, sekolah, dan gedung.',
                    'harga'      => 2500000,
                    'gambar'     => 'seed/layanan2.svg',
                    'created_at' => now()->subDays(2), 'updated_at' => now()->subDays(2),
                ],
                [
                    'nama'       => 'Pengembangan Website dan Aplikasi',
                    'deskripsi'  => 'Pembuatan website company profile, toko online, dan aplikasi sesuai kebutuhan bisnis Anda.',
                    'harga'      => null,
                    'gambar'     => 'seed/layanan3.svg',
                    'created_at' => now()->subDays(1), 'updated_at' => now()->subDays(1),
                ],
                [
                    'nama'       => 'Maintenance dan Dukungan IT',
                    'deskripsi'  => 'Perawatan berkala perangkat dan jaringan serta dukungan teknis cepat saat terjadi gangguan.',
                    'harga'      => null,
                    'gambar'     => 'seed/layanan4.svg',
                    'created_at' => now(), 'updated_at' => now(),
                ],
            ]);
        }

        /* ---------- Artikel / Informasi Terkini ---------- */
        if (Berita::count() === 0) {
            Berita::insert([
                [
                    'judul'      => 'Tips Memilih Layanan Internet yang Tepat untuk Bisnis Anda',
                    'isi'        => "Koneksi internet yang stabil adalah tulang punggung operasional bisnis modern. Sebelum memilih penyedia layanan, perhatikan kebutuhan bandwidth, jumlah pengguna, dan jaminan ketersediaan layanan (SLA).\n\nPastikan juga penyedia layanan menawarkan dukungan teknis yang responsif, karena gangguan koneksi yang lama dapat menghambat pekerjaan dan merugikan usaha.",
                    'gambar'     => 'seed/artikel1.svg',
                    'created_at' => now()->subDays(5), 'updated_at' => now()->subDays(5),
                ],
                [
                    'judul'      => 'Pentingnya Keamanan Jaringan bagi Perusahaan',
                    'isi'        => "Serangan siber dapat menyasar perusahaan dari berbagai ukuran. Langkah dasar seperti memperbarui perangkat, memakai kata sandi yang kuat, dan memisahkan jaringan tamu dari jaringan internal sudah sangat membantu mengurangi risiko.\n\nTim kami siap membantu audit dan penguatan keamanan jaringan sesuai kebutuhan perusahaan Anda.",
                    'gambar'     => 'seed/artikel2.svg',
                    'created_at' => now()->subDays(3), 'updated_at' => now()->subDays(3),
                ],
                [
                    'judul'      => 'PT Solusi Koneksi Anda Resmikan Layanan Dukungan IT 24 Jam',
                    'isi'        => "Untuk meningkatkan kepuasan pelanggan, PT Solusi Koneksi Anda kini membuka layanan dukungan IT sepanjang hari. Pelanggan dapat menghubungi tim teknis melalui telepon maupun WhatsApp kapan saja.\n\nLayanan ini diharapkan membuat gangguan dapat ditangani lebih cepat sehingga operasional pelanggan tetap berjalan lancar.",
                    'gambar'     => 'seed/artikel3.svg',
                    'created_at' => now()->subDay(), 'updated_at' => now()->subDay(),
                ],
            ]);
        }

        /* ---------- Galeri Kegiatan ---------- */
        if (Galeri::count() === 0) {
            $kegiatan = [
                'Instalasi jaringan di kantor pelanggan',
                'Pelatihan teknisi internal',
                'Kunjungan ke klien',
                'Pemasangan perangkat WiFi',
                'Rapat koordinasi tim',
                'Kegiatan gathering karyawan',
            ];

            foreach ($kegiatan as $i => $ket) {
                Galeri::create([
                    'gambar'     => 'seed/galeri' . ($i + 1) . '.svg',
                    'keterangan' => $ket,
                ]);
            }
        }
    }
}