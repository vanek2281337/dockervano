<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Services\MenuServices;
use App\Domain\Services\MenuValidationServices;
use App\DTO\Menu\CreateMenuDTO;
use App\DTO\Menu\UpdateMenuDTO;
use App\DTO\Menu\ShowToCategoryDTO;
use App\DTO\Menu\ShowMenuDTO;
use App\DTO\Menu\DeleteMenuDTO;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Create a newly created resource in storage.
    */
    public function create(Request $request, MenuServices $service, MenuValidationServices $validation)
    {
        $is_valid = $validation->CreateActionValidate($request);
        if (key_exists('errors', $is_valid))
        {
            return $is_valid;
        }
        return response()->json([
            "response" => $service->actionCreate(
                new CreateMenuDTO(
                    $request->CategoryId,
                    $request->Title,
                    $request->Description,
                    $request->file('Image')
                        ->store('uploads', 'public'),
                    $request->Price,
                    null
                )
            )
        ]);
    }

    /**
     * Show to category a newly created resource in storage.
    */
    public function showToCategory(int $menu_category_id, MenuServices $service)
    {
        return response()->json([
            "response" => $service->actionShowToCategory(
                new ShowToCategoryDTO($menu_category_id)
            )
        ]);
    }

    /**
     * Show a newly created resource in storage.
    */
    public function show(int $menu_id, MenuServices $service)
    {
        return response()->json([
            "response" => $service->actionShow(
                new ShowMenuDTO($menu_id)
            )
        ]);
    }

    /**
     * All a newly created resource in storage.
    */
    public function all(MenuServices $service)
    {
        return response()->json([
            "response" => $service->actionAll()
        ]);
    }

    /**
     * Update a newly created resource in storage.
    */
    public function update(Request $request, MenuServices $service, MenuValidationServices $validation)
    {
        $is_valid = $validation->UpdateActionValidate($request);

        if (key_exists('errors', $is_valid))
        {
            return response()->json([
                "response" =>  $is_valid
            ]);
        }

        return response()->json([
            "response" => $service->actionUpdate(
                new UpdateMenuDTO(
                    $request->id,
                    $request->CategoryId,
                    $request->Title,
                    $request->Description,
                    $request->file('Image')
                        ->store('uploads', 'public'),
                    $request->Price,
                    null
                )
            )
        ]);
    }

    /**
     * Delete a newly created resource in storage.
    */
    public function delete(int $menu_id, MenuServices $service)
    {
        return response()->json([
            "response" => $service->actionDelete(
                new DeleteMenuDTO($menu_id)
            )
        ]);
    }
}
