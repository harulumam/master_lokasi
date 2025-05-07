<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 't_jenis_barang';
    protected $primaryKey = 'id_jenis_barang';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_barang_id', 'kategori_barang_id');
    }

    public function masterProducts()
    {
        return $this->hasMany(MasterProduct::class, 'jenis_barang_id');
    }
}
