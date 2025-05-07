<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailGudangFotoAlker extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_gudang_ruangan_alker_foto';
    protected $primaryKey = 'master_lokasi_detail_gudang_ruangan_alker_foto_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_gudang_ruangan_alker_id',
        'path'
    ];

    // Relasi ke tabel MasterLokasiDetailGudangRuanganAlker
    public function alker()
    {
        return $this->belongsTo(MasterLokasiDetailGudangRuanganAlker::class, 'master_lokasi_detail_gudang_ruangan_alker_id');
    }
}
