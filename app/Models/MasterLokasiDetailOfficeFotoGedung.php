<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailOfficeFotoGedung extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_office_foto_gedung';
    protected $primaryKey = 'master_lokasi_detail_office_foto_gedung_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_office_id',
        'path'
    ];

    public function office()
    {
        return $this->belongsTo(MasterLokasiDetailOffice::class, 'master_lokasi_detail_office_id', 'master_lokasi_detail_office_id');
    }
}
