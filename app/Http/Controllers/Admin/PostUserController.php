<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Services\UserServices;
use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class PostUserController extends Controller
{
    public function create(Request $request_data, CreateUserRequest $request, UserServices $service)
    {
        $request->validated();
        $service->CreateAction(
            new CreateUserDTO(
                $request_data->first_name ? $request_data->first_name : null,
                $request_data->last_name ? $request_data->last_name : null,
                $request['phone'],
                $request['role'],
                null
            )
        );
        return back()->with('success', 'Данные добавлены!');
    }

    public function update(Request $request_data, UpdateUserRequest $request, UserServices $service)
    {
        $request->validated();
        $service->UpdateAction(
            new UpdateUserDTO(
                $request['id'],
                $request_data->first_name ? $request_data->first_name : null,
                $request_data->last_name ? $request_data->last_name : null,
                $request['phone'],
                $request['role']
            )
        );
        return back()->with('success', 'Данные обновлены!');
    }
}
