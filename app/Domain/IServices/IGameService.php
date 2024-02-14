<?php

namespace App\Domain\IServices;

use App\DTO\Game\AddBonusGameDTO;
use App\DTO\Game\AddMarkGameDTO;

interface IGameService
{
    public function AddMarkAction(AddMarkGameDTO $context);
    public function AddBonusAction(AddBonusGameDTO $context);
}
