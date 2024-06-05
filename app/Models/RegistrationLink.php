<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationLink extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'unique_link', 'expires_at']; // actually could be without user_id

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isPassed(): bool
    {
        return $this->expires_at < Carbon::now()->toDateTimeString();
    }
}
