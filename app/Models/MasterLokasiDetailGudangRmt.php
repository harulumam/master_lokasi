<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailGudangRmt extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_gudang_rmt';
    protected $primaryKey = 'master_lokasi_detail_gudang_rmt_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_id',
        'nama_gudang_rmt',
        'alamat_gudang_rmt',
        'latitude',
        'longitude'
    ];

    // Relasi ke MasterLokasiDetail
    public function lokasiDetail()
    {
        return $this->belongsTo(MasterLokasiDetail::class, 'master_lokasi_detail_id', 'master_lokasi_detail_id');
    }
}
