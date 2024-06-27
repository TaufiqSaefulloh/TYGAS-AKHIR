<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'JUGURAN Part 3 - Strategi Pembiayaan Cerdas, UMKM Tancap Gas',
                'image' => 'public/assets/img/img-event1.png',
                'tanggal' => 'Rabu, 24 April 2024',
                'waktu' => '08.00 WIB-selesai',
                'lokasi' => 'Kantor PLUT',

                'link_pendaftaran' => 'https://www.youtube.com/watch?v=-4A6SXIXjGs&list=RDH-GZ5wu2ufU&index=22',
                'tentang' => 'PLUT-KUMKM mengundang Anda untuk menghadiri "JUGURAN Part 3 - Strategi Pembiayaan Cerdas, UMKM Tancap Gas!" Acara ini merupakan kesempatan emas bagi para pelaku UMKM di Banyumas untuk mendapatkan wawasan dan pengetahuan mendalam mengenai strategi pembiayaan yang efektif. Pelatihan ini akan membantu UMKM untuk lebih tanggap dan siap dalam menghadapi tantangan bisnis dengan solusi pembiayaan yang tepat.',
                'hal' => 'Cara pembuatan dan transaksi menggunakan QRIS UMKM',
                'narasumber' => 'Bambang yudoyono',
                'syarat' => 'membawa KTP',
                'biaya' => 'Event ini GRATIS dan terbuka untuk semua UMKM di Banyumas dengan catatan melengkapi syarat dan mendapatkan kuota.',
            ],
        ];
        // DB::table('events')->insert($data);
        foreach ($data as $event) {
            // Upload gambar dan simpan ke penyimpanan
            $imagePath = $this->uploadImage($event['image']);

            // Simpan data kategori beserta path gambar ke dalam basis data
            DB::table('events')->insert([
                'judul' => $event['judul'],
                'image' => $imagePath,
                'tanggal' => $event['tanggal'],
                'waktu' => $event['waktu'],
                'lokasi' => $event['lokasi'],

                'link_pendaftaran' => $event['link_pendaftaran'],
                'tentang' => $event['tentang'],
                'hal' => $event['hal'],
                'narasumber' => $event['narasumber'],
                'syarat' => $event['syarat'],
                'biaya' => $event['biaya'],
            ]);
        }
    }
    private function uploadImage($image): string
    {
        // Ambil path tempat penyimpanan yang diatur di konfigurasi
        $storagePath = Storage::disk('public')->putFile('events', $image);

        // Kembalikan path lengkap ke gambar yang diunggah
        return $storagePath;
    }
}
