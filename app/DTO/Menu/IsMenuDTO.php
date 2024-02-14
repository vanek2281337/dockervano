<?php
namespace App\DTO\Menu;

final class IsMenuDTO
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
