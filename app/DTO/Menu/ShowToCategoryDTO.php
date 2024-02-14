<?php
namespace App\DTO\Menu;

final class ShowToCategoryDTO
{
    public int $CategoryId;

    public function __construct(int $CategoryId)
    {
        $this->CategoryId = $CategoryId;
    }
}
