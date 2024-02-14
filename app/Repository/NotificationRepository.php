<?php
namespace App\Repository;

use App\Domain\IRepository\INotificationRepository;
use App\DTO\Notification\CreateNotificationDTO;
use App\DTO\Notification\ShowNotificationDTO;
use App\DTO\Notification\UpdateNotificationDTO;
use App\DTO\Notification\DeleteNotificationDTO;
use App\Models\Notification;

class NotificationRepository implements INotificationRepository
{
    public function Create(CreateNotificationDTO $context)
    {
        $model = new Notification();
        $model->Title = $context->Title;
        $model->Description = $context->Description;
        $model->Image = $context->Image;
        $model->save();
        return $model;
    }

    public function Show(ShowNotificationDTO $context)
    {
        return Notification::find($context->Id)
            ->latest()
            ->get();
    }

    public function All()
    {
        return Notification::latest()->get();
    }

    public function Update(UpdateNotificationDTO $context)
    {
        $model = Notification::find($context->Id);
        $model->Title = $context->Title;
        $model->Description = $context->Description;
        $model->Image = $context->Image;
        $model->save();
        return $model;
    }

    public function Delete(DeleteNotificationDTO $context)
    {
        $model = Notification::find($context->Id);
        $model->delete();
        return $model;
    }
}