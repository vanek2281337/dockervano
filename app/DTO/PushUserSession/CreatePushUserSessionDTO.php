<?php
namespace App\DTO\PushUserSession;

final class CreatePushUserSessionDTO
{
    public int $UserId;
    public string $Value;

    public function __construct(int $UserId, string $Value)
    {
        $this->UserId = $UserId;
        $this->Value = $Value;
    }
}
