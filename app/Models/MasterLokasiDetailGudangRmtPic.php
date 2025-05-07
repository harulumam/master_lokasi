<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailGudangRmtPic extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_gudang_rmt_pic';
    protected $primaryKey = 't_master_lokasi_detail_gudang_rmt_pic_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_gudang_rmt_id',
        'nik_pic_gudang'
    ];

    // Relasi ke MasterLokasiDetailGudangRmt
    public function gudangRmt()
    {
        return $this->belongsTo(MasterLokasiDetailGudangRmt::class, 'master_lokasi_detail_gudang_rmt_id', 'master_lokasi_detail_gudang_rmt_id');
    }
}
