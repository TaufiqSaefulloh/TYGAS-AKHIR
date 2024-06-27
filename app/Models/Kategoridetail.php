<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Kategoridetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_kategori',
        'judul',
        'video',
        'video1',
        'video2',
        'video3',
        'deskripsi',
        'file_pdf',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
