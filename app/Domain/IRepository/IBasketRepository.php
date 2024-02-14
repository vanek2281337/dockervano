<?php
namespace App\Domain\IRepository;

use App\DTO\Basket\CreateBasketDTO;
use App\DTO\Basket\DeleteBasketDTO;
use App\DTO\Basket\CountUpdateBasketDTO;

interface IBasketRepository
{
    public function Create(CreateBasketDTO $context);
    public function All();
    public function Delete(DeleteBasketDTO $context);
    public function CountUpdate(CountUpdateBasketDTO $context);
}