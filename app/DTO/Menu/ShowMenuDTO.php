<?php
namespace App\DTO\Menu;

final class ShowMenuDTO
{
    public int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
