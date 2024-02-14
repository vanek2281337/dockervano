<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\IngridientBasketServices;
use App\DTO\IngridientBasket\CreateIngridientBasketDTO;
use App\DTO\IngridientBasket\ShowIngridientBasketDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IngridientBasketController extends Controller
{
    public function create(Request $request, IngridientBasketServices $service)
    {
        return response()->json([
            "response" => $service->CreateAction(
                new CreateIngridientBasketDTO(
                    $request->IngridientCode,
                    $request->IngridientId,
                    $request->Count
                )
            )
        ]);
    }

    public function show(string $IngridientCode, IngridientBasketServices $service)
    {
        return response()->json([
            "response" => $service->ShowAction(
                new ShowIngridientBasketDTO(
                    $IngridientCode
                )
            )
        ]);
    }
}
