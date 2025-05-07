<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailGudangRuanganAlker extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_gudang_ruangan_alker';
    protected $primaryKey = 'master_lokasi_detail_gudang_ruangan_alker_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_gudang_ruangan_id',
        'master_product_id',
        'qty',
        'serial_number'
    ];

    // Relasi ke MasterLokasiDetailGudangRuangan
    public function gudangRuangan()
    {
        return $this->belongsTo(MasterLokasiDetailGudangRuangan::class, 'master_lokasi_detail_gudang_ruangan_id', 'master_lokasi_detail_gudang_ruangan_id');
    }

    // Relasi ke MasterProduct
    public function product()
    {
        return $this->belongsTo(MasterProduct::class, 'master_product_id', 'master_product_id');
    }
}
