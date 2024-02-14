<?php
namespace App\DTO\MenuCategory;

final class CreateMenuCategoryDTO
{
    public string $Title;

    public function __construct(string $Title)
    {
        $this->Title = $Title;
    }
}
