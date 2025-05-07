<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class Users extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 't_users';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [
        'nik',
        'role_id',
        'status',
    ];

    protected $casts = [
        'nik' => 'integer',
        'role_id' => 'integer',
        'created_date' => 'datetime',
        'status' => 'string',
    ];

    /**
     * Relasi ke model Role (misalnya jika Anda memiliki tabel role).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
}
