<?php
namespace App\Domain\Services;

use App\Domain\IServices\IMenuServices;
use App\DTO\Menu\CreateMenuDTO;
use App\DTO\Menu\UpdateMenuDTO;
use App\DTO\Menu\IsTitleMenuDTO;
use App\DTO\Menu\ShowToCategoryDTO;
use App\DTO\Menu\ShowMenuDTO;
use App\DTO\Menu\DeleteMenuDTO;
use App\DTO\Menu\IsMenuDTO;
use App\DTO\MenuCategory\ShowMenuCategoryDTO;
use App\Repository\MenuRepository;
use App\Repository\MenuCategoryRepository;

class MenuServices implements IMenuServices
{
    public MenuRepository $repository;
    public MenuCategoryRepository $repositoryCategory;

    public function __construct()
    {
        $this->repository = new MenuRepository();
        $this->repositoryCategory = new MenuCategoryRepository();
    }

    public function actionCreate(CreateMenuDTO $context)
    {
        $IsTitle = $this->repository->IsTitle(new IsTitleMenuDTO($context->Title));
        $isCategory = $this->repositoryCategory->Show(new ShowMenuCategoryDTO($context->CategoryId));
        
        if ($IsTitle)
        {
            return ["errors" => "Название позиции должно быть уникальным!"];
        }
        
        if ($isCategory == false)
        {
            return ["errors" => "Категория не существует!"];
        }

        $context->Slug = \Illuminate\Support\Str::slug($context->Title, '_');
        return $this->repository->Create($context);
    }

    public function actionUpdate(UpdateMenuDTO $context)
    {
        $IsMenu = $this->repository->IsMenu(new IsMenuDTO($context->id));
        $IsTitle = $this->repository->IsTitle(new IsTitleMenuDTO($context->Title));
        $isCategory = $this->repositoryCategory->Show(new ShowMenuCategoryDTO($context->CategoryId));

        if ($IsMenu)
        {   
            if ($isCategory == false)
            {
                return ["errors" => "Категория не существует!"];
            }
            $context->Slug = \Illuminate\Support\Str::slug($context->Title, '_');
            return $this->repository->Update($context);
        }
        else
        {
            return ["errors" => "Не удалось найти данную позицию!"];
        }
    }

    public function actionShowToCategory(ShowToCategoryDTO $context)
    {
        return $this->repository->ShowToCategory($context);
    }

    public function actionShow(ShowMenuDTO $context)
    {
        return $this->repository->Show($context);
    }

    public function actionAll()
    {
        return $this->repository->All();
    }

    public function actionDelete(DeleteMenuDTO $context)
    {
        return $this->repository->Delete($context);
    }
}