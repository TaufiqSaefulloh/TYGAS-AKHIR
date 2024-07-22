<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'nama_pemilik_usaha',
        'nik',
        'no_kk',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'agama',
        'kelurahan_desa',
        'kecamatan',
        'kabupaten_kota',
        'jenis_produk',
    ];
}
