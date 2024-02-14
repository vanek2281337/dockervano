<?php
namespace App\DTO\Ingridient;

final class CreateIngridientDTO
{
    public int $CategoryId;
    public string $Title;

    public function __construct(int $CategoryId, string $Title)
    {
        $this->CategoryId = $CategoryId;
        $this->Title = $Title;
    }
}
