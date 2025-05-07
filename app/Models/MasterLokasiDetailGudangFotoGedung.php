<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailGudangFotoGedung extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_gudang_foto_gedung';
    protected $primaryKey = 'master_lokasi_detail_gudang_foto_gedung_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_gudang_id',
        'path'
    ];

    // Relasi ke tabel `t_master_lokasi_detail_gudang`
    public function gudang()
    {
        return $this->belongsTo(MasterLokasiDetailGudang::class, 'master_lokasi_detail_gudang_id', 'master_lokasi_detail_gudang_id');
    }
}
