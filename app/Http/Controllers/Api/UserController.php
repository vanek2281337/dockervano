<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Services\UserServices;
use App\DTO\User\CodeUserDTO;
use App\DTO\User\CreateUserDTO;
use App\DTO\User\AuthUserDTO;
use App\DTO\User\ShowByPhoneUserDTO;
use App\DTO\User\UpdateUserDTO;

class UserController extends Controller
{
    /**
     * Code a newly created resource in storage.
    */
    public function code(Request $request, UserServices $service)
    {
        return response()->json([
            "response" => $service->CodeAction(
                new CodeUserDTO($request->Phone, null)
            )
        ]);
    }

    /**
     * Create a newly created resource in storage.
    */
    public function create(Request $request, UserServices $service)
    {
        return response()->json([
            "response" => $service->CreateAction(
                new CreateUserDTO(
                    null,
                    null,
                    $request->Phone,
                    $request->Role ? $request->Role : "Клиент",
                    null
                )
            )
        ]);
    }

    /**
     * Auth a newly created resource in storage.
    */
    public function auth(Request $request, UserServices $service)
    {
        return response()->json([
            "response" => $service->AuthAction(
                new AuthUserDTO(
                    $request->Phone,
                    $request->Code,
                )
            )
        ]);
    }

    /**
     * showByPhone a newly created resource in storage.
    */
    public function showByPhone(string $phone, UserServices $service)
    {
        return response()->json([
            "response" => $service->ShowByPhoneAction(
                new ShowByPhoneUserDTO($phone)
            )
        ]);
    }

    /**
     * updateInfo a newly created resource in storage.
    */
    public function update(Request $request, UserServices $service)
    {
        return response()->json([
            "response" => $service->UpdateAction(
                new UpdateUserDTO(
                    $request->Id,
                    $request->FirstName,
                    $request->LastName,
                    $request->Phone,
                    "Клиент",
                )
            )
        ]);
    }
}
