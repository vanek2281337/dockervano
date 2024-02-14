<?php
namespace App\Domain\IServices;

use App\DTO\PushUserSession\CreatePushUserSessionDTO;
use App\DTO\PushUserSession\ShowPushUserSessionDTO;
use App\DTO\PushUserSession\UpdatePushUserSessionDTO;

interface IPushUserSessionServices
{
    public function CreateAction(CreatePushUserSessionDTO $context);
    public function ShowAction(ShowPushUserSessionDTO $context);
    public function UpdateAction(UpdatePushUserSessionDTO $context);
}