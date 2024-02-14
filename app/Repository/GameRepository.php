<?php

namespace App\Repository;

use App\Domain\IRepository\IGameRepository;
use App\DTO\Game\AddBonusGameDTO;
use App\DTO\Game\AddMarkGameDTO;
use App\DTO\Game\ShowMarkGameDTO;
use App\DTO\Game\ShowBonusGameDTO;
use App\Models\Game;
use App\Models\GameToBonus;

class GameRepository implements IGameRepository
{
    public function Create(AddMarkGameDTO $context)
    {
        $model = new Game();
        $model->UserId = $context->UserId;
        $model->Mark = $context->Mark;
        $model->save();
        return $model;
    }
    
    public function ShowGameMark(ShowMarkGameDTO $context)
    {
        return Game::where('UserId', $context->UserId)->get();
    }

    public function AddMark(AddMarkGameDTO $context)
    {
        $model = Game::where('UserId', $context->UserId)->first();
        $model->Mark = $context->Mark;
        $model->save();
        return $model;
    }

    public function AddBonus(AddBonusGameDTO $context)
    {
        $model = new GameToBonus();
        $model->UserId = $context->UserId;
        $model->Money = $context->Money;
        $model->save();
        return $model;
    }

    public function ShowBonus(ShowBonusGameDTO $context)
    {
        return GameToBonus::where('UserId', $context->UserId)->first();
    }
}
