<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetailGudang extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail_gudang';
    protected $primaryKey = 'master_lokasi_detail_gudang_id';
    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_detail_id',
        'latitude',
        'longitude',
        'kode_gudang',
        'nama_gudang',
        'kategori_gudang',
        'tipe_jenis_bangunan_id',
        'peruntukan_id',
        'luasan',
        'nik_penanggung_jawab',
        'nik_pic_reg',
        'nik_pic_ss',
        'nik_teamleader',
    ];

    public function lokasiDetail()
    {
        return $this->belongsTo(MasterLokasiDetail::class, 'master_lokasi_detail_id');
    }

    public function kategoriGudang()
    {
        return $this->belongsTo(KategoriGudang::class, 'kategori_gudang');
    }

    public function tipeBangunan()
    {
        return $this->belongsTo(TipeJenisBangunan::class, 'tipe_jenis_bangunan_id');
    }

    public function peruntukan()
    {
        return $this->belongsTo(Peruntukan::class, 'peruntukan_id');
    }
}
