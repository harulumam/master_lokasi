<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTeritori extends Model
{
    use HasFactory;

    protected $table = 'master_data.t_master_teritori';
    protected $primaryKey = 'id_teritori';
    public $timestamps = false;

    public function regional()
    {
        return $this->belongsTo(MasterRegional::class, 'id_regional');
    }

    public function witel()
    {
        return $this->hasMany(MasterWitel::class, 'id_teritori');
    }
}
