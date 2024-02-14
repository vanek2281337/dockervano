<?php

namespace App\Domain\IRepository;

use App\DTO\IngridientBasket\CreateIngridientBasketDTO;
use App\DTO\IngridientBasket\ShowIngridientBasketDTO;

interface IIngridientBasketRepository
{
    public function Create(CreateIngridientBasketDTO $context);
    public function Show(ShowIngridientBasketDTO $context);
}
