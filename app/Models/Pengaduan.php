<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $fillable = [
        'kode_pengaduan',
        'nama',
        'nik',
        'no_hp',
        'judul',
        'isi',
        'foto',
        'status',
        'tanggapan'
    ];
}

