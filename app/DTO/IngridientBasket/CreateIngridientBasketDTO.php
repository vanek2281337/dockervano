<?php

namespace App\DTO\IngridientBasket;

class CreateIngridientBasketDTO
{
    public string $IngridientCode;
    public int $IngridientId;
    public int $Count;

    public function __construct(string $IngridientCode, int $IngridientId, int $Count)
    {
        $this->IngridientCode = $IngridientCode;
        $this->IngridientId = $IngridientId;
        $this->Count = $Count;
    }
}
