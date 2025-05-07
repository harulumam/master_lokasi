<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailFiberacademyRuangan extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_fiberacademy_ruangan';
    protected $primaryKey = 'master_lokasi_detail_fa_ruangan_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_id',
        'tipe_ruangan_id',
        'luasan',
        'tipe_berbayar'
    ];


    public function masterLokasiDetail()
    {
        return $this->belongsTo(MasterLokasiDetail::class, 'master_lokasi_detail_id', 'master_lokasi_detail_id');
    }

    public function tipeRuangan()
    {
        return $this->belongsTo(TipeRuangan::class, 'tipe_ruangan_id', 'tipe_ruangan_id');
    }
}
