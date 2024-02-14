<?php

namespace App\Domain\Services;

use App\Domain\IServices\IIngridientBasketServices;
use App\DTO\IngridientBasket\CreateIngridientBasketDTO;
use App\DTO\IngridientBasket\ShowIngridientBasketDTO;
use App\Repository\IngridientBasketRepository;

class IngridientBasketServices implements IIngridientBasketServices
{
    public IngridientBasketRepository $repository;
    public function __construct()
    {
        $this->repository = new IngridientBasketRepository();
    }

    public function CreateAction(CreateIngridientBasketDTO $context)
    {
        return $this->repository->Create($context);
    }

    public function ShowAction(ShowIngridientBasketDTO $context)
    {
        return $this->repository->Show($context);
    }
}
