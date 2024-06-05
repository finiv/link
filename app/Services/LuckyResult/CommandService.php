<?php

namespace App\Services\LuckyResult;

use App\DTO\LuckyParams;
use App\Models\LuckyResult;
use App\Models\RegistrationLink;

class CommandService
{
    public function iamfeelinglucky(RegistrationLink $registrationLink): LuckyParams
    {
        $user = $registrationLink->user;
        $randomNumber = rand(1, 1000);
        $winAmount = 0;
        $result = makeResult($randomNumber);

        if ($result === 'Win') {
            $winAmount = makeAmount($randomNumber);
        }

        $this->create($user->id, $randomNumber, $result, $winAmount);

        return new LuckyParams($randomNumber, $result, $winAmount);
    }

    public function create(int $userId, int $randomNumber, string $result, float $winAmount): LuckyResult // could be private func in this context but I left public
    {
        return LuckyResult::create([
            'user_id' => $userId,
            'random_number' => $randomNumber,
            'result' => $result,
            'win_amount' => $winAmount,
        ]);
    }
}
