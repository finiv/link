<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LuckyResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'random_number', 'result', 'win_amount'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
