<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class MasterWitel extends Model
{
    use HasFactory;

    protected $table = 'master_data.t_master_witel';
    protected $primaryKey = 'id_witel';
    public $timestamps = false;

    public function teritori()
    {
        return $this->belongsTo(MasterTeritori::class, 'id_teritori');
    }

    public static function getWitelData($id)
    {
        $data = self::join('master_data.t_master_teritori as a', 'a.id_teritori', '=', 't_master_witel.id_teritori')
            ->join('master_data.t_master_regional as t', 't.id_regional', '=', 'a.id_regional')
            ->whereNotNull('t_master_witel.id_area_ta')
            ->when($id == 0, function ($query) {
                $query->whereRaw('1 = 0');
            }, function ($query) use ($id) {
                $query->where('t.id_regional', $id);
            })
            ->select(
                't_master_witel.id_witel',
                't_master_witel.id_area_ta',
                't_master_witel.nama_witel',
                't_master_witel.id_witel_sap',
                't_master_witel.is_active',
                't.id_regional'
            )
            ->get();

        if ($id == 1499) {
            $data->push((object) [
                'id_witel' => 0,
                'id_area_ta' => null,
                'nama_witel' => 'HO',
                'id_witel_sap' => null,
                'is_active' => "Y",
                'id_regional' => 0
            ]);
        }

        return $data;
    }
}
