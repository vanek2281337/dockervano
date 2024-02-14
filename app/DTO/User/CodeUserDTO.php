<?php
namespace App\DTO\User;

final class CodeUserDTO
{
    public string $Phone;
    public string|null $Code;

    public function __construct(string $Phone, string|null $Code)
    {
        $this->Phone = $Phone;
        $this->Code = $Code;
    }
}
