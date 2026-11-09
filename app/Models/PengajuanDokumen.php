<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanDokumen extends Model
{
    protected $table = 'pengajuan_dokumen';
    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan',
        'jenis_dokumen',
        'nama_dokumen',
        'file_path',
        'file_size',
        'created_at'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanSurat::class, 'id_pengajuan', 'id_pengajuan');
    }
}

