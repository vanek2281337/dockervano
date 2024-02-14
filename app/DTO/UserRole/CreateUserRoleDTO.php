<?php

namespace App\DTO\UserRole;

class CreateUserRoleDTO
{
    public string $Name;
    public int $UserId;

    public function __construct(string $Name, int $UserId)
    {
        $this->Name = $Name;
        $this->UserId = $UserId;
    }
}
