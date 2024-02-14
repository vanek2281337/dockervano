<?php

namespace App\Repository;

use App\Domain\IRepository\IIngridientBasketRepository;
use App\DTO\IngridientBasket\CreateIngridientBasketDTO;
use App\DTO\IngridientBasket\ShowIngridientBasketDTO;
use App\Models\IngridientBasket;

class IngridientBasketRepository implements IIngridientBasketRepository
{
    public function Create(CreateIngridientBasketDTO $context)
    {
        $model = new IngridientBasket();
        $model->IngridientCode = $context->IngridientCode;
        $model->IngridientId = $context->IngridientId;
        $model->Count = $context->Count;
        $model->save();
        return $model;
    }

    public function Show(ShowIngridientBasketDTO $context)
    {
        return IngridientBasket::where('IngridientCode', $context->IngridientCode)
            ->get();
    }
}
