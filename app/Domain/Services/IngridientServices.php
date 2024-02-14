<?php
namespace App\Domain\Services;

use App\Domain\IServices\IIngridientServices;
use App\Repository\IngridientRepository;
use App\DTO\Ingridient\CreateIngridientDTO;
use App\DTO\Ingridient\DeleteIngridientDTO;

class IngridientServices implements IIngridientServices
{
    private IngridientRepository $repository;
    public function __construct()
    {
        $this->repository = new IngridientRepository();
    }

    public function actionCreate(CreateIngridientDTO $context)
    {
        return $this->repository->Create($context);
    }

    public function actionDelete(DeleteIngridientDTO $context)
    {
        return $this->repository->Delete($context);
    }

    public function actionAll()
    {
        return $this->repository->All();
    }
}