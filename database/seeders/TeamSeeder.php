<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'AGUS RAHMAT NURWIDODO, S.E.',
                'image' => 'assets/img/konsultan-agus.png',
                'bidang' => 'Konsultan Bidang Jaringan Kerja Sama',
            ],
            [
                'nama' => 'ADE SETIYAWAN, S.T.',
                'image' => 'assets/img/konsultan-ade.png',
                'bidang' => 'Konsultan Bidang Branding, Desain dan Pemasaran',
            ],
            [
                'nama' => 'AGUS MUSTOFA, S.M., M.M.',
                'image' => 'assets/img/konsultan-agusmustofa.png',
                'bidang' => 'Konsultan Branding, Desain dan Pemasaran',
            ],
            [
                'nama' => 'TRIAS ADI PRAMONO, S.E.',
                'image' => 'assets/img/konsultan-trias.png',
                'bidang' => 'Konsultan Bidang Pembiayaan',
            ],
            [
                'nama' => 'RINA YULIANTI, S.H.',
                'image' => 'assets/img/konsultan-rina.png',
                'bidang' => 'Konsultan Bidang Kelembagaan',
            ],
            [
                'nama' => 'RAHAYU BUDI ARTHANI, S.Pd',
                'image' => 'assets/img/konsultan-ayu.png',
                'bidang' => 'Konsultan Bidang IT',
            ],
            [
                'nama' => 'YANUAR DIAH LAVETI, S.Pd.',
                'image' => 'assets/img/konsultan-yanuar.png',
                'bidang' => 'Konsultan Bidang Sumber Daya Manusia',
            ],
        ];

        DB::table('teams')->insert($data);
    }
}
