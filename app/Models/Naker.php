<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Naker extends Model
{
    use HasFactory;

    protected $table = 'naker.master_employee';
    protected $primaryKey = 'nik';
    public $timestamps = false;

    public static function getPICbyReg($reg)
    {
        return DB::table('naker.master_employee as me')
            ->leftJoin('naker.employee_mapping as em', 'me.nik', '=', 'em.nik')
            ->leftJoin('naker.master_om as om', 'em.object_id', '=', 'om.object_id')
            ->join('naker.area_ta as a', 'om.psa', '=', 'a.ta_area')
            ->join('naker.area_ta as b', 'a.parent', '=', 'b.ta_area')
            ->join('naker.area_ta as c', 'b.parent', '=', 'c.ta_area')
            ->join('naker.area_ta as d', 'c.parent', '=', 'd.ta_area')
            ->whereIn('me.status_naker', [1, 4])
            ->where('em.pgs', 1)
            ->where('d.ta_area', $reg)
            ->select([
                'om.object_id',
                'me.nik',
                'me.name',
                'om.position_name',
                'om.directorate',
                'om.unit',
                'om.sub_unit',
                'om.psa',
                'b.ta_area as witel',
                'c.ta_area as teritory',
                'd.ta_area as regional',
                'om.cost_center_id',
                'me.no_gsm',
                'me.email'
            ])
            ->get();
    }
}
