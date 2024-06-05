<?php

namespace App\Services\LuckyResult;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class QueryService
{
    public function getHistory(User $user, int $length = 3): Collection
    {
        return $user->luckyResults()->latest()->take($length)->get();
    }
}
