<?php

namespace App\Repository;

use App\Domain\IRepository\IUserRoleRepository;
use App\DTO\UserRole\CreateUserRoleDTO;
use App\Models\UserRole;

class UserRoleRepository implements IUserRoleRepository
{
    public function Create(CreateUserRoleDTO $context)
    {
        $model = new UserRole();
        $model->Name = $context->Name;
        $model->UserId = $context->UserId;
        $model->save();
        return $model;
    }
}
