<?php
namespace App\DTO\User;

final class CreateUserDTO
{
    public string|null $FirstName;
    public string|null $LastName;
    public string $Phone;
    public string $Role;
    public string|null $Code;

    public function __construct(string|null $FirstName, string|null $LastName, string $Phone, string $Role, string|null $Code)
    {
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Phone = $Phone;
        $this->Role = $Role;
        $this->Code = $Code;
    }
}
