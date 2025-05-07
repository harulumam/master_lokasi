<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeJenisBangunan extends Model
{
    use HasFactory;

    protected $table = 't_tipe_jenis_bangunan';
    protected $primaryKey = 'tipe_jenis_bangunan_id';
    public $timestamps = false;
}
