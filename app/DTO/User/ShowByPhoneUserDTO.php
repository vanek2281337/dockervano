<?php
namespace App\DTO\User;

final class ShowByPhoneUserDTO
{
    public string $Phone;

    public function __construct(string $Phone)
    {
        $this->Phone = $Phone;
    }
}
