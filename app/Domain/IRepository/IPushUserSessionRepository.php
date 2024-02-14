<?php
namespace App\Domain\IRepository;

use App\DTO\PushUserSession\CreatePushUserSessionDTO;
use App\DTO\PushUserSession\ShowPushUserSessionDTO;
use App\DTO\PushUserSession\UpdatePushUserSessionDTO;

interface IPushUserSessionRepository
{
    public function Create(CreatePushUserSessionDTO $context);
    public function Show(ShowPushUserSessionDTO $context);
    public function Update(UpdatePushUserSessionDTO $context);
}