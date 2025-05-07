<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailGudangRuangan extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_gudang_ruangan';
    protected $primaryKey = 'master_lokasi_detail_gudang_ruangan_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_id',
        'tipe_ruangan_id',
        'luasan',
        'kategori_gudang',
        'tipe_berbayar'
    ];

    // Relasi ke MasterLokasiDetail
    public function masterLokasiDetail()
    {
        return $this->belongsTo(MasterLokasiDetail::class, 'master_lokasi_detail_id', 'master_lokasi_detail_id');
    }

    // Relasi ke KategoriGudang
    public function kategoriGudang()
    {
        return $this->belongsTo(KategoriGudang::class, 'kategori_gudang', 'kategori_gudang_id');
    }

    // Relasi ke TipeRuangan
    public function tipeRuangan()
    {
        return $this->belongsTo(TipeRuangan::class, 'tipe_ruangan_id', 'tipe_ruangan_id');
    }
}
