<?php

namespace App\Domain\Services;

use App\Domain\IServices\IUserRoleService;
use App\DTO\UserRole\CreateUserRoleDTO;
use App\Repository\UserRoleRepository;

class UserRoleService implements IUserRoleService
{
    public UserRoleRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRoleRepository();
    }

    public function CreateAction(CreateUserRoleDTO $context)
    {
        return $this->repository->Create($context);
    }
}
