<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\GameService;
use App\DTO\Game\AddBonusGameDTO;
use App\DTO\Game\AddMarkGameDTO;
use App\DTO\Game\ShowMarkGameDTO;
use App\DTO\Game\ShowBonusGameDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function addMark(Request $request, GameService $service)
    {
        return $service->AddMarkAction(
            new AddMarkGameDTO(
                $request->UserId,
                $request->Mark
            )
        );
    }

    public function addBonus(Request $request, GameService $service)
    {
        return $service->AddBonusAction(
            new AddBonusGameDTO(
                $request->Money,
                $request->UserId
            )
        );
    }
    public function showMark(int $user_id, GameService $service)
    {
        return $service->ShowMarkAction(
            new ShowMarkGameDTO(
                $user_id,
            )
        );
    }

    public function showBonus(int $user_id, GameService $service)
    {
        return $service->ShowBonusAction(
            new ShowBonusGameDTO(
                $user_id,
            )
        );
    }
}
