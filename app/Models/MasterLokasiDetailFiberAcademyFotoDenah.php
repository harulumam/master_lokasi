<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailFiberAcademyFotoDenah extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_fiberacademy_foto_denah';
    protected $primaryKey = 'master_lokasi_detail_fa_foto_denah_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_fa_id',
        'path'
    ];

    public function fiberAcademy()
    {
        return $this->belongsTo(MasterLokasiDetailFiberAcademy::class, 'master_lokasi_detail_fa_id', 'master_lokasi_detail_fa_id');
    }
}
