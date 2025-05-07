<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailGudangStaff extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_gudang_staff';
    protected $primaryKey = 'master_lokasi_detail_gudang_staff_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_gudang_id',
        'nik',
    ];

    public function gudang()
    {
        return $this->belongsTo(MasterLokasiDetailGudang::class, 'master_lokasi_detail_gudang_id', 'master_lokasi_detail_gudang_id');
    }
}
