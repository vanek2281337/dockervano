<?php
namespace App\Repository;

use Illuminate\Support\Facades\Hash;
use App\Domain\IRepository\IUserRepository;
use App\DTO\User\CreateUserDTO;
use App\DTO\User\AuthUserDTO;
use App\DTO\User\ShowByPhoneUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\DTO\User\CodeUserDTO;
use App\Models\User;

class UserRepository implements IUserRepository
{
    public function Code(CodeUserDTO $context)
    {
        $user = User::where('Phone', $context->Phone)->latest()->get();
        $model = User::find($user[0]->id);
        $model->Code = Hash::make($context->Code);
        $model->save();
        return $model;
    }

    public function Create(CreateUserDTO $context)
    {
        $model = new User();
        $model->FirstName = null;
        $model->LastName = null;
        $model->Phone = $context->Phone;
        $model->Role = $context->Role;
        $model->Code = null;
        $model->save();
        return $model;
    }

    public function Auth(AuthUserDTO $context)
    {
        $model = User::where('Phone', $context->Phone)->latest()->get();
        return [
            "user" => $model[0],
            "bearerTocken" => User::createBearerTocken(
                User::find($model[0]->id)
            )
        ];
    }

    public function ShowByPhone(ShowByPhoneUserDTO $context)
    {
        return User::where('Phone', $context->Phone)
            ->latest()
            ->get();
    }

    public function Update(UpdateUserDTO $context)
    {
        $model = User::find($context->Id);

        if ($context->FirstName)
        {
            $model->FirstName = $context->FirstName;
        }

        if ($context->LastName)
        {
            $model->LastName = $context->LastName;
        }
        

        if ($context->Phone)
        {
            $model->Phone = $context->Phone;
        }

        if ($context->Role)
        {
            $model->Role = $context->Role;
        }

        $model->save();
        return $model;
    }
}