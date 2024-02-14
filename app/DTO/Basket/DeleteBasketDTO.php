<?php
namespace App\DTO\Basket;

final class DeleteBasketDTO
{
    public int $Id;

    public function __construct(int $Id)
    {
        $this->Id = $Id;
    }
}
