<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'email' => 'plutkumkm.jawatengah@gmail.com',
                'instagram' => 'https://www.instagram.com/plutjawatengah/',
                'facebook' => 'https://www.facebook.com/Plutjateng?locale=id_ID',
            ],
        ];
        DB::table('contacts')->insert($data);
    }
}
