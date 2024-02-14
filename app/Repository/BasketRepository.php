<?php
namespace App\Repository;

use App\Models\Basket;
use App\Domain\IRepository\IBasketRepository;
use App\DTO\Basket\CreateBasketDTO;
use App\DTO\Basket\DeleteBasketDTO;
use App\DTO\Basket\CountUpdateBasketDTO;

class BasketRepository implements IBasketRepository
{
    public function Create(CreateBasketDTO $context)
    {
        $model = new Basket();
        $model->UserId = $context->UserId;
        $model->MenuId = $context->MenuId;
        $model->Price = $context->Price;
        $model->Count = $context->Count;
        $model->IngridientCode = $context->IngridientCode;
        $model->Values = $context->Values;
        $model->save();
        return $model;
    }

    public function All()
    {
        return Basket::latest()->get();
    }

    public function Delete(DeleteBasketDTO $context)
    {
        $model = Basket::find($context->Id);
        $model->delete();
        return $model;
    }

    public function CountUpdate(CountUpdateBasketDTO $context)
    {
        $model = Basket::find($context->Id);
        $model->Count = $context->Count;
        $model->save();
        return $model;
    }
}
