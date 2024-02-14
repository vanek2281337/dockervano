<?php
namespace App\Repository;

use App\DTO\PushUserSession\CreatePushUserSessionDTO;
use App\DTO\PushUserSession\ShowPushUserSessionDTO;
use App\DTO\PushUserSession\UpdatePushUserSessionDTO;
use App\Domain\IRepository\IPushUserSessionRepository;
use App\Models\PushUserSession;

class PushUserSessionRepository implements IPushUserSessionRepository
{
    public function Create(CreatePushUserSessionDTO $context)
    {
        $model = new PushUserSession();
        $model->UserId = $context->UserId;
        $model->Value = $context->Value;
        $model->save();
        return $model;
    }

    public function Show(ShowPushUserSessionDTO $context)
    {
        return PushUserSession::where('UserId',$context->UserId)
            ->latest()
            ->get();
    }

    public function Update(UpdatePushUserSessionDTO $context)
    {
        $model = PushUserSession::find($context->Id);
        $model->UserId = $context->UserId;
        $model->Value = $context->Value;
        $model->save();
        return $model;
    }
}