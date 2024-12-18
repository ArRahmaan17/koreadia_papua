<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RoleUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'user_id',
    ];

    public function roles(): HasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
