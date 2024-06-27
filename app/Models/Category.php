<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategoridetail;
use App\Models\Userkategori;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'image',
        'deskripsi'
    ];

    public function kategoridetails(){
        return $this->hasMany(Kategoridetail::class);
    }
}
