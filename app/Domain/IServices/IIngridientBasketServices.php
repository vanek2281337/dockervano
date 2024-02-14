<?php

namespace App\Domain\IServices;

use App\DTO\IngridientBasket\CreateIngridientBasketDTO;
use App\DTO\IngridientBasket\ShowIngridientBasketDTO;

interface IIngridientBasketServices
{
    public function CreateAction(CreateIngridientBasketDTO $context);
    public function ShowAction(ShowIngridientBasketDTO $context);
}
