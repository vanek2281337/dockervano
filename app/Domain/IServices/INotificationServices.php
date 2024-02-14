<?php
namespace App\Domain\IServices;

use App\DTO\Notification\CreateNotificationDTO;
use App\DTO\Notification\ShowNotificationDTO;
use App\DTO\Notification\UpdateNotificationDTO;
use App\DTO\Notification\DeleteNotificationDTO;

interface INotificationServices
{
    public function CreateAction(CreateNotificationDTO $context);
    public function ShowAction(ShowNotificationDTO $context);
    public function AllAction();
    public function UpdateAction(UpdateNotificationDTO $context);
    public function DeleteAction(DeleteNotificationDTO $context);
}