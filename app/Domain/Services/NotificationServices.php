<?php
namespace App\Domain\Services;

use App\Domain\IServices\INotificationServices;
use App\Repository\NotificationRepository;
use App\DTO\Notification\CreateNotificationDTO;
use App\DTO\Notification\ShowNotificationDTO;
use App\DTO\Notification\UpdateNotificationDTO;
use App\DTO\Notification\DeleteNotificationDTO;

class NotificationServices implements INotificationServices
{
    public NotificationRepository $repository;

    public function __construct()
    {
        $this->repository = new NotificationRepository();
    }

    public function CreateAction(CreateNotificationDTO $context)
    {
        return $this->repository->Create($context);
    }

    public function ShowAction(ShowNotificationDTO $context)
    {
        return $this->repository->Show($context);
    }

    public function AllAction()
    {
        return $this->repository->All();
    }

    public function UpdateAction(UpdateNotificationDTO $context)
    {
        return $this->repository->Update($context);
    }

    public function DeleteAction(DeleteNotificationDTO $context)
    {
        return $this->repository->Delete($context);
    }
}