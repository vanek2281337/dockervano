<?php
namespace App\Domain\Services;

use App\Domain\IServices\IBasketServices;
use App\Domain\Services\UserServices;
use App\Repository\BasketRepository;
use App\DTO\Basket\CreateBasketDTO;
use App\DTO\Basket\DeleteBasketDTO;
use App\DTO\Basket\CountUpdateBasketDTO;

class BasketServices implements IBasketServices
{
    private BasketRepository $repository;
    private UserServices $randomString;

    public function __construct()
    {
        $this->repository = new BasketRepository();
        $this->randomString = new UserServices();
    }

    public function actionCreate(CreateBasketDTO $context)
    {
        $context->IngridientCode = $this->randomString->generateRandomString(12);
        return $this->repository->Create($context);;
    }

    public function actionAll()
    {
        return $this->repository->All();
    }

    public function actionDelete(DeleteBasketDTO $context)
    {
        return $this->repository->Delete($context);
    }

    public function actionCountUpdate(CountUpdateBasketDTO $context)
    {
        return $this->repository->CountUpdate($context);
    }
}
