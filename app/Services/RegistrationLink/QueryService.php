<?php

namespace App\Services\RegistrationLink;

use App\Models\RegistrationLink;

class QueryService
{
    public function find(string $link): RegistrationLink
    {
        return RegistrationLink::where('unique_link', $link)->firstOrFail();
    }
}
