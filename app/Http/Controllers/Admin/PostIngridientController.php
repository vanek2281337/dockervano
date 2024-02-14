<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Services\IngridientServices;
use App\DTO\Ingridient\CreateIngridientDTO;
use App\DTO\Ingridient\DeleteIngridientDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIngridientRequest;
use Illuminate\Http\Request;

class PostIngridientController extends Controller
{
    public function create(CreateIngridientRequest $request, IngridientServices $service)
    {
        $service->actionCreate(
            new CreateIngridientDTO(
                $request['category_id'],
                $request['title']
            )
        );
        return back()->with('success', 'Данные сохранены!');
    }

    public function delete(Request $request, IngridientServices $service)
    {
        $service->actionDelete(
            new DeleteIngridientDTO(
                $request->id
            )
        );
        return back()->with('success', 'Данные удалены!');
    }
}
