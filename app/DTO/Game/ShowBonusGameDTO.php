<?php

namespace App\DTO\Game;

class ShowBonusGameDTO
{
    public int $UserId;

    public function __construct(int $UserId)
    {
        $this->UserId = $UserId;
    }
}
