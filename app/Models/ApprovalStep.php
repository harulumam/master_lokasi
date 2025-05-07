<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalStep extends Model
{
    use HasFactory;

    protected $table = 't_approval_step';

    protected $primaryKey = 'approval_step_id';

    public $timestamps = false;

    public function approvalGroup()
    {
        return $this->belongsTo(ApprovalGroup::class, 'approval_group_id');
    }
}
