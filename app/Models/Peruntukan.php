<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peruntukan extends Model
{
    use HasFactory;

    protected $table = 't_peruntukan';
    protected $primaryKey = 'peruntukan_id';
    public $timestamps = false;
}
