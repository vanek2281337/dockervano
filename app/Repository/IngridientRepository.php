<?php
namespace App\Repository;

use App\Models\Ingidient;
use App\Domain\IRepository\IIngridientRepository;
use App\DTO\Ingridient\CreateIngridientDTO;
use App\DTO\Ingridient\DeleteIngridientDTO;

class IngridientRepository implements IIngridientRepository
{
    public function Create(CreateIngridientDTO $context)
    {
        $model = new Ingidient();
        $model->CategoryId = $context->CategoryId;
        $model->Title = $context->Title;
        $model->save();
        return $model;
    }

    public function Delete(DeleteIngridientDTO $context)
    {
        $model = Ingidient::find($context->Id);
        $model->delete();
        return $model;
    }

    public function All()
    {
        return Ingidient::get();
    }
}