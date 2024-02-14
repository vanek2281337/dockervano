<?php
namespace App\Domain\IServices;

use App\DTO\Ingridient\CreateIngridientDTO;
use App\DTO\Ingridient\DeleteIngridientDTO;

interface IIngridientServices
{
    public function actionCreate(CreateIngridientDTO $context);
    public function actionDelete(DeleteIngridientDTO $context);
    public function actionAll();
}