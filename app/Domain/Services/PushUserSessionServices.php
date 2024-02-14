<?php
namespace App\Domain\Services;

use Illuminate\Http\Request;

use App\Domain\IServices\IPushUserSessionServices;
use App\DTO\PushUserSession\CreatePushUserSessionDTO;
use App\DTO\PushUserSession\ShowPushUserSessionDTO;
use App\DTO\PushUserSession\UpdatePushUserSessionDTO;
use App\Repository\PushUserSessionRepository;

class PushUserSessionServices implements IPushUserSessionServices
{
    private PushUserSessionRepository $repository;
    public function __construct()
    {
        $this->repository = new PushUserSessionRepository();
    }

    public function CreateAction(CreatePushUserSessionDTO $context)
    {
        return $this->repository->Create($context);
    }

    public function ShowAction(ShowPushUserSessionDTO $context)
    {
        return $this->repository->Show($context);
    }

    public function UpdateAction(UpdatePushUserSessionDTO $context)
    {
        return $this->repository->Update($context);
    }
}