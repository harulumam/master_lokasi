<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRegional extends Model
{
    use HasFactory;

    protected $table = 'master_data.t_master_regional';
    protected $primaryKey = 'id_regional';
    public $timestamps = false;

    public function teritori()
    {
        return $this->hasMany(MasterTeritori::class, 'id_regional');
    }
}
