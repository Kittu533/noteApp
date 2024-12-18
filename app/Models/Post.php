<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'nama_matkul', // Nama Mata Kuliah
        'batas_waktu', // Batas Waktu Pengerjaan
        'image', // Jika ada field image
    ];
}
