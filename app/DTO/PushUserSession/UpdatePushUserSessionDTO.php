<?php
namespace App\DTO\PushUserSession;

final class UpdatePushUserSessionDTO
{
    public int $Id;
    public int $UserId;
    public string $Value;

    public function __construct(int $Id, int $UserId, string $Value)
    {
        $this->Id = $Id;
        $this->UserId = $UserId;
        $this->Value = $Value;
    }
}
