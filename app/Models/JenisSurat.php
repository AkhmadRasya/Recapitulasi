<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $table = 'jenis_surat';
    protected $primaryKey = 'id_jenis';
    public $timestamps = false;

    protected $fillable = [
        'id_jenis',
        'nama_surat',
        'keterangan'
    ];

    public function pengajuan()
    {
        return $this->hasMany(PengajuanSurat::class, 'id_jenis', 'id_jenis');
    }
}

