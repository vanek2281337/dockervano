<?php
namespace App\Domain\IServices;

use App\DTO\MenuCategory\CreateMenuCategoryDTO;
use App\DTO\MenuCategory\DeleteMenuCategoryDTO;

interface IMenuCategoryServices
{
    public function actionCreate(CreateMenuCategoryDTO $context);
    public function actionDelete(DeleteMenuCategoryDTO $context);
    public function actionAll();
}