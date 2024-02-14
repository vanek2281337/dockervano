<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Services\IngridientServices;
use App\DTO\Ingridient\CreateIngridientDTO;
use App\DTO\Ingridient\DeleteIngridientDTO;
use App\Domain\Services\IngridientValidationService;

class IngridientController extends Controller
{
    /**
     * Create a newly created resource in storage.
    */
    public function create(Request $request, IngridientServices $service, IngridientValidationService $validation)
    {
        $is_valid = $validation->CreateActionValidate($request);
        if (key_exists('errors', $is_valid))
        {
            return response()->json([
                "response" =>  $is_valid
            ]);
        }
        return response()->json([
            "response" => $service->actionCreate(
                new CreateIngridientDTO(
                    $request->CategoryId,
                    $request->Title
                )
            )
        ]);
    }

    /**
     * Delete a newly created resource in storage.
    */
    public function delete(int $ingridient_id, IngridientServices $service)
    {
        return response()->json([
            "response" => $service->actionDelete(
                new DeleteIngridientDTO(
                    $ingridient_id
                )
            )
        ]);
    }

    /**
     * All a newly created resource in storage.
    */
    public function all(IngridientServices $service)
    {
        return response()->json([
            "response" => $service->actionAll()
        ]);
    }
}
