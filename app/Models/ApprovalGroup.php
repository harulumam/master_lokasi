<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalGroup extends Model
{
    use HasFactory;

    protected $table = 't_approval_group';

    protected $primaryKey = 'approval_group_id';

    public $timestamps = false;

    public function approvalSteps()
    {
        return $this->hasMany(ApprovalStep::class, 'approval_group_id');
    }
}
