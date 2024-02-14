<?php

namespace App\DTO\IngridientBasket;

class ShowIngridientBasketDTO
{
    public string $IngridientCode;

    public function __construct(string $IngridientCode)
    {
        $this->IngridientCode = $IngridientCode;
    }
}
