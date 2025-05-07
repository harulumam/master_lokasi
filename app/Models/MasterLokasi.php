<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasi extends Model
{
    use HasFactory;

    protected $table = 't_master_lokasi';

    protected $primaryKey = 'master_lokasi_id';

    public $timestamps = false;

    protected $fillable = [
        'master_lokasi_name',
        'regional_id',
        'witel_id',
        'alamat',
        'latitude',
        'longitude',
        'current_step_id',
        'group_id',
        'action_id',
        'created_by',
        'is_active'
    ];

    public function approvalStep()
    {
        return $this->belongsTo(ApprovalStep::class, 'current_step_id');
    }

    public function approvalGroup()
    {
        return $this->belongsTo(ApprovalGroup::class, 'group_id');
    }

    public function approvalAction()
    {
        return $this->belongsTo(ApprovalAction::class, 'action_id');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'created_by', 'nik');
    }

    public function regional()
    {
        return $this->belongsTo(MasterRegional::class, 'regional_id', 'id_regional');
    }

    public function witel()
    {
        return $this->belongsTo(MasterWitel::class, 'witel_id', 'id_witel');
    }

    public function lokasiDetails()
    {
        return $this->hasMany(MasterLokasiDetail::class, 'master_lokasi_id');
    }

}
