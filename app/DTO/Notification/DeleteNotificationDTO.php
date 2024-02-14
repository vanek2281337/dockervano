<?php
namespace App\DTO\Notification;

final class DeleteNotificationDTO
{
    public int $Id;

    public function __construct(int $Id)
    {
        $this->Id = $Id;
    }
}
