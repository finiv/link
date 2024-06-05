<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'phone'];

    public function registrationLinks(): HasMany
    {
        return $this->hasMany(RegistrationLink::class);
    }

    public function luckyResults(): HasMany
    {
        return $this->hasMany(LuckyResult::class);
    }
}
