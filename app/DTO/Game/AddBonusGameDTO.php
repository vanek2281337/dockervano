<?php

namespace App\DTO\Game;

class AddBonusGameDTO
{
    public int $Money;
    public int $UserId;

    public function __construct(int $Money, int $UserId)
    {
        $this->Money = $Money;
        $this->UserId = $UserId;
    }
}
