<?php

namespace App\Models;

use AdminHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'avatar',
        'status',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function scopeActive($query)
    {
        return $query->where('status', AdminHelper::ACTIVE);
    }
    public function getAuthPassword(): string
    {
        return $this->password ?: '';
    }
}
