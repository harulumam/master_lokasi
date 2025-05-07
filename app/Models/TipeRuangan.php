<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeRuangan extends Model
{
    use HasFactory;

    protected $table = 't_tipe_ruangan';
    protected $primaryKey = 'tipe_ruangan_id';
    public $timestamps = false;
}
