<?php

namespace App\Domain\IRepository;

use App\DTO\Game\AddBonusGameDTO;
use App\DTO\Game\AddMarkGameDTO;
use App\DTO\Game\ShowMarkGameDTO;

interface IGameRepository
{
    public function ShowGameMark(ShowMarkGameDTO $context);
    public function Create(AddMarkGameDTO $context);
    public function AddMark(AddMarkGameDTO $context);
    public function AddBonus(AddBonusGameDTO $context);
}
