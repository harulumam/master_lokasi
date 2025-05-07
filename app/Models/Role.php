<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Role extends Model
{
    use HasFactory;

    protected $table = 't_role';
    protected $primaryKey = 'role_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'role_name',
        'status',
    ];

    protected $casts = [
        'role_name' => 'string',
        'status' => 'string',
    ];

    /**
     * Relasi ke model User (jika Anda ingin melihat pengguna dengan role ini).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(Users::class, 'role_id', 'role_id'); // Sesuaikan nama model User jika berbeda
    }
}
