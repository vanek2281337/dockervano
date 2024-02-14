<?php
namespace App\Repository;

use App\DTO\MenuCategory\CreateMenuCategoryDTO;
use App\DTO\MenuCategory\DeleteMenuCategoryDTO;
use App\DTO\MenuCategory\ShowMenuCategoryDTO;
use App\Domain\IRepository\IMenuCategoryRepository;
use App\Models\MenuCategory;


class MenuCategoryRepository implements IMenuCategoryRepository
{
    public function Create(CreateMenuCategoryDTO $context)
    {
        $model = new MenuCategory();
        $model->Title = $context->Title;
        $model->save();
        return $model;
    }

    public function Delete(DeleteMenuCategoryDTO $context)
    {
        $model = MenuCategory::find($context->id);
        $model->delete();
        return $model;
    }

    public function All()
    {
        return MenuCategory::latest()->get();
    }

    public function Show(ShowMenuCategoryDTO $context)
    {
        return MenuCategory::find($context->id) ? true : false;
    }    
}