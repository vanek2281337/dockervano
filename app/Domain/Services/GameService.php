<?php

namespace App\Domain\Services;

use App\Domain\IServices\IGameService;
use App\DTO\Game\AddBonusGameDTO;
use App\DTO\Game\ShowBonusGameDTO;
use App\DTO\Game\AddMarkGameDTO;
use App\DTO\Game\ShowMarkGameDTO;
use App\Repository\GameRepository;

class GameService implements IGameService
{
    private GameRepository $repository;

    public function __construct()
    {
        $this->repository = new GameRepository();
    }

    public function AddMarkAction(AddMarkGameDTO $context)
    {
        $GameMarkToUser = $this->repository->ShowGameMark(
            new ShowMarkGameDTO(
                $context->UserId
            )
        );

        if (count($GameMarkToUser) == 0)
        {
            return $this->repository->Create(
                new AddMarkGameDTO(
                    $context->UserId,
                    $context->Mark
                )
            );
        }
        else
        {
            return $this->repository->AddMark(
                new AddMarkGameDTO(
                    $context->UserId,
                    $context->Mark
                )
            );
        }
    }

    public function AddBonusAction(AddBonusGameDTO $context)
    {
        return $this->repository->AddBonus($context);
    }

    public function ShowBonusAction(ShowBonusGameDTO $context)
    {
        return $this->repository->ShowBonus($context);
    }

    public function ShowMarkAction(ShowMarkGameDTO $context)
    {
        return $this->repository->ShowGameMark($context);
    }
}
