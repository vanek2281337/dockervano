<?php
namespace App\Domain\IRepository;

use App\DTO\Ingridient\CreateIngridientDTO;
use App\DTO\Ingridient\DeleteIngridientDTO;

interface IIngridientRepository
{
    public function Create(CreateIngridientDTO $context);
    public function Delete(DeleteIngridientDTO $context);
    public function All();
}