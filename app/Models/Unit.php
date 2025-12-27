<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'code',
        'factor',
        'is_active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
