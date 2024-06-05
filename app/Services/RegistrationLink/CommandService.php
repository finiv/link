<?php

namespace App\Services\RegistrationLink;

use App\Models\RegistrationLink;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CommandService
{
    public function create(User $user): string
    {
        $user->registrationLinks()->create([
            'unique_link' => $link = Str::random(32),
            'expires_at' => Carbon::now()->addDays(7)
        ]);

        return $link;
    }

    public function updateLink(RegistrationLink $link): RegistrationLink
    {
        $link->update(['unique_link' => Str::random(32), 'expires_at' => Carbon::now()->addDays(7)]);

        return $link;
    }

    public function deactivate(RegistrationLink $link): void
    {
        $link->update(['expires_at' => Carbon::now()]); // or could be now() sub 1 minute or could be force or soft deleted
    }
}
