<?php
namespace App\Domain\IServices;

use App\DTO\Menu\CreateMenuDTO;
use App\DTO\Menu\UpdateMenuDTO;
use App\DTO\Menu\ShowToCategoryDTO;
use App\DTO\Menu\ShowMenuDTO;
use App\DTO\Menu\DeleteMenuDTO;

interface IMenuServices
{
    public function actionCreate(CreateMenuDTO $context);
    public function actionUpdate(UpdateMenuDTO $context);
    public function actionShowToCategory(ShowToCategoryDTO $context);
    public function actionShow(ShowMenuDTO $context);
    public function actionAll();
    public function actionDelete(DeleteMenuDTO $context);
}