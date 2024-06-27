<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'plutjateng',
                'nomor_hp' => '085601786681',
                'email' => 'plut@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('plut1234'),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
