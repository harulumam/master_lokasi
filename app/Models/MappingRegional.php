<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingRegional extends Model
{
    use HasFactory;

    protected $table = 't_mapping_regional_lama_regional_baru';

    protected $primaryKey = 'mapping_regional_id';

    public $timestamps = false;

    protected $fillable = [
        'regional_id_lama',
        'regional_lama',
        'regional_id_baru',
        'regional_baru',
    ];
}
