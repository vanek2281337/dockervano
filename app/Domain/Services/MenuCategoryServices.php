<?php
namespace App\Domain\Services;

use App\DTO\MenuCategory\CreateMenuCategoryDTO;
use App\DTO\MenuCategory\DeleteMenuCategoryDTO;
use App\Domain\IServices\IMenuCategoryServices;
use App\Repository\MenuCategoryRepository;

class MenuCategoryServices implements IMenuCategoryServices
{
    public MenuCategoryRepository $repository;
    public function __construct()
    {
        $this->repository = new MenuCategoryRepository();    
    }

    public function actionCreate(CreateMenuCategoryDTO $context)
    {
        return $this->repository->Create($context);
    }

    public function actionDelete(DeleteMenuCategoryDTO $context)
    {
        return $this->repository->Delete($context);
    }

    public function actionAll()
    {
        return $this->repository->All();
    }
}