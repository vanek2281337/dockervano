<?php
namespace App\DTO\Ingridient;

final class DeleteIngridientDTO
{
    public int $Id;

    public function __construct(int $Id)
    {
        $this->Id = $Id;
    }
}
