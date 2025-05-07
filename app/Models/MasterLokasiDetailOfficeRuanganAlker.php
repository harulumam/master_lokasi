<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailOfficeRuanganAlker extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_office_ruangan_alker';
    protected $primaryKey = 'master_lokasi_detail_office_ruangan_alker_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_office_ruangan_id',
        'master_product_id',
        'qty'
    ];


    public function officeRuangan()
    {
        return $this->belongsTo(MasterLokasiDetailOfficeRuangan::class, 'master_lokasi_detail_office_ruangan_id', 'master_lokasi_detail_office_ruangan_id');
    }

    public function product()
    {
        return $this->belongsTo(MasterProduct::class, 'master_product_id', 'master_product_id');
    }
}
