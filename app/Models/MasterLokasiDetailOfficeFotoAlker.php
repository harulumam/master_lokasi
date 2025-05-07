<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailOfficeFotoAlker extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_office_ruangan_alker_foto';
    protected $primaryKey = 'master_lokasi_detail_office_ruangan_alker_foto_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_office_ruangan_alker_id',
        'path'
    ];

    public function alker()
    {
        return $this->belongsTo(MasterLokasiDetailOfficeRuanganAlker::class, 'master_lokasi_detail_office_ruangan_alker_id', 'master_lokasi_detail_office_ruangan_alker_id');
    }
}
