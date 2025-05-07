<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $table = 't_kategori_barang';
    protected $primaryKey = 'kategori_barang_id';
    public $timestamps = false;

    public function jenisBarang()
    {
        return $this->hasMany(JenisBarang::class, 'kategori_barang_id', 'kategori_barang_id');
    }
}
