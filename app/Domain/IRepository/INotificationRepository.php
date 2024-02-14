<?php
namespace App\Domain\IRepository;

use App\DTO\Notification\CreateNotificationDTO;
use App\DTO\Notification\ShowNotificationDTO;
use App\DTO\Notification\UpdateNotificationDTO;
use App\DTO\Notification\DeleteNotificationDTO;

interface INotificationRepository
{
    public function Create(CreateNotificationDTO $context);
    public function Show(ShowNotificationDTO $context);
    public function All();
    public function Update(UpdateNotificationDTO $context);
    public function Delete(DeleteNotificationDTO $context);
}