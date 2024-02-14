<?php

namespace App\Domain\IServices;

use App\DTO\UserRole\CreateUserRoleDTO;

interface IUserRoleService
{
    public function CreateAction(CreateUserRoleDTO $context);
}
