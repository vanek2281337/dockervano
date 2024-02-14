<?php
namespace App\Domain\IServices;

use App\DTO\Basket\CreateBasketDTO;
use App\DTO\Basket\DeleteBasketDTO;
use App\DTO\Basket\CountUpdateBasketDTO;

interface IBasketServices
{
    public function actionCreate(CreateBasketDTO $context);
    public function actionAll();
    public function actionDelete(DeleteBasketDTO $context);
    public function actionCountUpdate(CountUpdateBasketDTO $context);
}