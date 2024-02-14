<?php

namespace App\Domain\IRepository;

use App\DTO\UserRole\CreateUserRoleDTO;

interface IUserRoleRepository
{
    public function Create(CreateUserRoleDTO $context);
}
