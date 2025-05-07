<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriGudang extends Model
{
    use HasFactory;

    protected $table = 't_kategori_gudang';
    protected $primaryKey = 'kategori_gudang_id';
    public $timestamps = false;
}
