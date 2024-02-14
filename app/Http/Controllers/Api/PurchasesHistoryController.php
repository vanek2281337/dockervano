<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Domain\Services\PurchasesHistoryServices;
use Illuminate\Http\Request;
use App\DTO\PurchasesHistory\CreatePurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowByUserPurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowPurchasesHistoryDTO;
use App\DTO\PurchasesHistory\UpdateStatusPurchasesHistoryDTO;
use App\Domain\Services\PurchasesHistoryValidationServices;

class PurchasesHistoryController extends Controller
{
    public function create(Request $request, PurchasesHistoryServices $srvice, PurchasesHistoryValidationServices $validation)
    {
        $is_valid = $validation->CreateActionValidate($request);
        if (key_exists('errors', $is_valid))
        {
            return response()->json([
                "response" =>  $is_valid
            ]);
        }
        return response()->json([
            "response" => $srvice->CreateAction(
                new CreatePurchasesHistoryDTO(
                    $request->UserId,
                    $request->Status,
                    $request->Price,
                    $request->Values, // [{'MenuId': 0, 'Count': 0}, ...]
                    date('d.m.Y'),
                    date('H:i')
                )
            )
        ]);
    }

    public function show(string $order_code, PurchasesHistoryServices $srvice)
    {
        return response()->json([
            "response" => $srvice->ShowAction(
                new ShowPurchasesHistoryDTO($order_code)
            )
        ]);
    }

    public function all(int $user_id=null, PurchasesHistoryServices $srvice)
    {
        if ($user_id)
        {
            return response()->json([
                "response" => [
                    $srvice->ShowByUserAction(
                        new ShowByUserPurchasesHistoryDTO($user_id)
                    )
                ]
            ]);
        }
        else
        {
            return response()->json([
                "response" => $srvice->AllAction()
            ]);
        }
    }

    public function update(Request $request, PurchasesHistoryServices $srvice, PurchasesHistoryValidationServices $validation)
    {
        $is_valid = $validation->CreateActionValidate($request);
        if (key_exists('errors', $is_valid))
        {
            return response()->json([
                "response" =>  $is_valid
            ]);
        }
        return response()->json([
            "response" => $srvice->UpdateAction(
                new UpdateStatusPurchasesHistoryDTO(
                    $request->Id,
                    $request->UserId,
                    $request->Status,
                    $request->Price,
                    $request->Values, // [{'MenuId': 0, 'Count': 0}, ...]
                    date('d.m.Y'),
                    date('H:i')
                )
            )
        ]);
    }
}
