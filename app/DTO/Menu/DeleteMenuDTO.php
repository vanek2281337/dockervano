<?php
namespace App\DTO\Menu;

final class DeleteMenuDTO
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
