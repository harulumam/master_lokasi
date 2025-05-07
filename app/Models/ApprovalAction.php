<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalAction extends Model
{
    use HasFactory;

    protected $table = 't_approval_action';

    protected $primaryKey = 'action_id';

    public $timestamps = false;
}
