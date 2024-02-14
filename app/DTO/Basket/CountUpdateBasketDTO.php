<?php
namespace App\DTO\Basket;

final class CountUpdateBasketDTO
{
    public int $Id;
    public int $Count;

    public function __construct(int $Id, int $Count)
    {
        $this->Id = $Id;
        $this->Count = $Count;
    }
}
