<?php

namespace App\DTO\Game;

class AddMarkGameDTO
{
    public int $UserId;
    public int $Mark;

    public function __construct(int $UserId, int $Mark)
    {
        $this->UserId = $UserId;
        $this->Mark = $Mark;
    }
}
