<?php

namespace App\DTO\Game;

class ShowMarkGameDTO
{
    public int $UserId;
    public function __construct(int $UserId)
    {
        $this->UserId = $UserId;
    }
}
