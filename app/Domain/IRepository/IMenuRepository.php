<?php
namespace App\Domain\IRepository;

use App\DTO\Menu\CreateMenuDTO;
use App\DTO\Menu\UpdateMenuDTO;
use App\DTO\Menu\ShowToCategoryDTO;
use App\DTO\Menu\ShowMenuDTO;
use App\DTO\Menu\DeleteMenuDTO;

interface IMenuRepository
{
    public function Create(CreateMenuDTO $context);
    public function Update(UpdateMenuDTO $context);
    public function ShowToCategory(ShowToCategoryDTO $context);
    public function Show(ShowMenuDTO $context);
    public function All();
    public function Delete(DeleteMenuDTO $context);
}