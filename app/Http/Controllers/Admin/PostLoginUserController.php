<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Services\UserServices;
use App\DTO\User\AuthUserDTO;
use App\DTO\User\CodeUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginCodeRequest;
use App\Http\Requests\LoginRequest;
use Exception;

class PostLoginUserController extends Controller
{
    public function send_code(LoginRequest $request, UserServices $service)
    {
        $request->validated();
        $row = $service->CodeAction(
            new CodeUserDTO(
                $request['phone'],
                 null
            )
        );
        if ($row['code'] == 'ok')
        {
            return redirect()->route('admin.login', ['phone' => $request['phone']]);
        }
        else
        {
            return back()->with('error', 'Номер телефона не зарегистрирован в системе!');
        }
    }

    public function auth(LoginCodeRequest $request, UserServices $service)
    {
        $request->validated();
        try
        {
            $row = $service->AuthAction(
                new AuthUserDTO(
                    $request['phone'],
                    $request['code'],
                )
            );
            session([
                'user' => [
                    'id' => $row['user']['id'],
                    'first_name' => $row['user']['FirstName'],
                    'last_name' => $row['user']['LastName'],
                    'tocken' => 'Bearer '.$row['bearerTocken']
                ]
            ]);
            return redirect()->route('admin');
        }
        catch(Exception)
        {
            return back()->with('error', 'Номер телефона или код не верны!');
        }
    }

    public function logout()
    {
        session()->remove('user');
        return redirect()->route('admin.send_code');
    }
}
