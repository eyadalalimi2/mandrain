<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'phone',
        'password',
        'is_active',
        'last_login_at',
        'avatar',
        'role',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'last_login_at' => 'datetime',
    ];

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar && !str_starts_with($this->avatar, 'http')) {
            return asset('storage/' . $this->avatar);
        }
        return asset('admin/images/default-avatar.png');
    }
}
