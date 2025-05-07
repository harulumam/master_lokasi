<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailFiberAcademy extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_fiberacademy';
    protected $primaryKey = 'master_lokasi_detail_fa_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_id',
        'latitude',
        'longitude',
        'kode_fa',
        'nama_fa',
        'tipe_jenis_bangunan_id',
        'peruntukan_id',
        'luasan',
        'nik_penanggung_jawab'
    ];


    public function lokasiDetail()
    {
        return $this->belongsTo(MasterLokasiDetail::class, 'master_lokasi_detail_id', 'master_lokasi_detail_id');
    }

    public function tipeBangunan()
    {
        return $this->belongsTo(TipeJenisBangunan::class, 'tipe_jenis_bangunan_id', 'tipe_jenis_bangunan_id');
    }

    public function peruntukan()
    {
        return $this->belongsTo(Peruntukan::class, 'peruntukan_id', 'peruntukan_id');
    }
}
