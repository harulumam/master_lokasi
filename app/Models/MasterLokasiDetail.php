<?php

// app/Models/MasterLokasiDetail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasiDetail extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi_detail';

    protected $primaryKey = 'master_lokasi_detail_id';

    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_id',
        'jenis_bangunan_id'
    ];

    public function jenisBangunan()
    {
        return $this->belongsTo(JenisBangunan::class, 'jenis_bangunan_id');
    }

    public function masterLokasi()
    {
        return $this->belongsTo(MasterLokasi::class, 'master_lokasi_id');
    }
}
