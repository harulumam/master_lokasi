<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBangunan extends Model
{
    use HasFactory;

    protected $table = 't_jenis_bangunan';
    protected $primaryKey = 'jenis_bangunan_id';
    public $timestamps = false;
}
