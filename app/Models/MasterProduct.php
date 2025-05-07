<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProduct extends Model
{
    use HasFactory;

    protected $table = 't_master_product';
    protected $primaryKey = 'master_product_id';
    public $timestamps = false;

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id', 'id_jenis_barang');
    }
}
