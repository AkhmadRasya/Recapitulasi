<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'ringkasan',
        'isi',
        'gambar',
        'penulis',
        'tanggal_publikasi',
        'status',
        'views'
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
    ];
}

