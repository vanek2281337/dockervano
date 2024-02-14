<?php
namespace App\Repository;

use App\Domain\IRepository\IMenuRepository;
use App\DTO\Menu\CreateMenuDTO;
use App\DTO\Menu\UpdateMenuDTO;
use App\DTO\Menu\ShowToCategoryDTO;
use App\DTO\Menu\ShowMenuDTO;
use App\DTO\Menu\DeleteMenuDTO;
use App\DTO\Menu\IsTitleMenuDTO;
use App\DTO\Menu\IsMenuDTO;
use App\Models\Menu;

class MenuRepository implements IMenuRepository
{
    public function Create(CreateMenuDTO $context)
    {
        $model = new Menu();
        $model->CategoryId = $context->CategoryId;
        $model->Title = $context->Title;
        $model->Description = $context->Description;
        $model->Image = $context->Image;
        $model->Price = $context->Price;
        $model->Slug = $context->Slug;
        $model->save();
        return $model;
    }
    public function Update(UpdateMenuDTO $context)
    {
        $model = Menu::find($context->id);
        $model->CategoryId = $context->CategoryId;
        $model->Title = $context->Title;
        $model->Description = $context->Description;
        $model->Image = $context->Image;
        $model->Price = $context->Price;
        $model->Slug = $context->Slug;
        $model->save();
        return $model;
    }

    public function ShowToCategory(ShowToCategoryDTO $context)
    {
        $model = Menu::where('CategoryId', $context->CategoryId)
            ->latest()
            ->get();
        return $model;
    }

    public function Show(ShowMenuDTO $context)
    {
        $model = Menu::find($context->id);
        return $model;
    }

    public function All()
    {
        $model = Menu::latest()->get();
        return $model;
    }

    public function Delete(DeleteMenuDTO $context)
    {
        $model = Menu::find($context->id)
            ->delete();
        return $model;
    }

    public function IsTitle(IsTitleMenuDTO $context)
    {
        $model = Menu::where('Title', $context->Title)
            ->latest()
            ->get();
        return count($model) > 0 ? true : false;
    }

    public function IsMenu(IsMenuDTO $context)
    {
        $model = Menu::find($context->id)
            ->latest()
            ->get();
        return count($model) > 0 ? true : false;
    }
}