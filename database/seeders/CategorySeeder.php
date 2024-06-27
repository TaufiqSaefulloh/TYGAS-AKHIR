<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Branding Desain dan Pemasaran ',
                'image' => 'public/assets/img/kategori-branding.png',
                'deskripsi' => 'Pelatihan tentang bagaimana membangun suatu brand, membuat desain produk, kemasan dan logo,serta menerapkan strategi pemasaran',
            ],
            [
                'judul' => 'Pembiayaan',
                'image' => 'public/assets/img/kategori-pembiayaan.png',
                'deskripsi' => 'Penyusunan rencana bisnis, proposal usaha, fasilitasi dan mediasi ke lembaga keuangan bank dan non bank, pengelolaan keuangan',
            ],
            [
                'judul' => 'Produksi',
                'image' => 'public/assets/img/kategori-produksi.png',
                'deskripsi' => 'Pelatihan ini berisi tentang pengembangan produk, deversifikasi
                produk, standarisasi dan sertifikasi produk, aplikasi teknologi.',
            ],
            [
                'judul' => 'Sumber Daya Manusia',
                'image' => 'public/assets/img/kategori-sdm.png',
                'deskripsi' => 'Pelatihan tentang Perkoperasian, Kewirausahaan dan Magang, untuk meningkatkan kualitas individu ',
            ],
            [
                'judul' => 'IT',
                'image' => 'public/assets/img/kategori-IT.png',
                'deskripsi' => 'Fokus pelatihan untuk membantu KUMKM dalam dasar-dasar dan penerapan IT dalam berbisnis.',
            ],
            [
                'judul' => 'Jaringan Kerjasama',
                'image' => 'public/assets/img/kategori-jaringan.png',
                'deskripsi' => 'Fokus terhapada mediasi berkembangnya jaringan layanan pengembangan usaha KUMKM dengan para pemangku kepentingan',
            ],
            [
                'judul' => 'Kelembagaan',
                'image' => 'public/assets/img/kategori-kelembagaan.png',
                'deskripsi' => ' pembentukan dan pemantapan kelembagaan koperasi dan UMKM, penguatan sentra UKM/klaster/Kawasan, pendataan, pendaftaran dan perijinan KUMKM, advokasi pelindungan KUMKM',
            ],
        ]; 
        // DB::table('categories')->insert($data);
        foreach ($data as $category) {
            // Upload gambar dan simpan ke penyimpanan
            $imagePath = $this->uploadImage($category['image']);
            
            // Simpan data kategori beserta path gambar ke dalam basis data
            DB::table('categories')->insert([
                'judul' => $category['judul'],
                'image' => $imagePath,
                'deskripsi' => $category['deskripsi'],
            ]);
        }
    }
    private function uploadImage($image): string
    {
        // Ambil path tempat penyimpanan yang diatur di konfigurasi
        $storagePath = Storage::disk('public')->putFile('categories', $image);

        // Kembalikan path lengkap ke gambar yang diunggah
        return $storagePath;
    }
}
