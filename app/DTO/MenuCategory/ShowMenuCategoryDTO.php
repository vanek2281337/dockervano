<?php
namespace App\DTO\MenuCategory;

final class ShowMenuCategoryDTO
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
