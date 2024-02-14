<?php
namespace App\DTO\Menu;

final class IsTitleMenuDTO
{
    public string $Title;

    public function __construct(string $Title)
    {
        $this->Title = $Title;
    }
}
