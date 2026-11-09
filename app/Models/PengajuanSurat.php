<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    protected $table = 'pengajuan_surat';
    protected $primaryKey = 'id_pengajuan';

    protected $fillable = [
        'kode_tiket',
        'nomor_surat',
        'id_user',
        'nik',
        'no_kk',
        'nama_pemohon',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'alamat',
        'rt',
        'rw',
        'no_hp',
        'id_jenis',
        'keperluan',
        'data_khusus',
        'status',
        'catatan_petugas',
        'file_surat',
        'file_hasil',
        'tanggal_pengajuan',
    ];

    protected $casts = [
        'data_khusus' => 'array',
        'tanggal_lahir' => 'date',
        'tanggal_pengajuan' => 'date',
    ];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'id_jenis', 'id_jenis');
    }

    public function dokumen()
    {
        return $this->hasMany(PengajuanDokumen::class, 'id_pengajuan', 'id_pengajuan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'Menunggu' => 'bg-amber-100 text-amber-800 border-amber-300',
            'Diproses' => 'bg-blue-100 text-blue-800 border-blue-300',
            'Selesai' => 'bg-emerald-100 text-emerald-800 border-emerald-300',
            'Ditolak' => 'bg-rose-100 text-rose-800 border-rose-300',
            default => 'bg-gray-100 text-gray-800 border-gray-300',
        };
    }
}

