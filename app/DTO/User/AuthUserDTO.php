<?php
namespace App\DTO\User;

final class AuthUserDTO
{
    public string $Phone;
    public string $Code;

    public function __construct(string $Phone, string $Code)
    {
        $this->Phone = $Phone;
        $this->Code = $Code;
    }
}
