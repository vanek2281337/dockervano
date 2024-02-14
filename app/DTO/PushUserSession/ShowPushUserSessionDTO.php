<?php
namespace App\DTO\PushUserSession;

final class ShowPushUserSessionDTO
{
    public int $UserId;

    public function __construct(int $UserId)
    {
        $this->UserId = $UserId;
    }
}
