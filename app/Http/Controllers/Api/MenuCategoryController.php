<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain\Services\MenuCategoryServices;
use App\Domain\Services\MenuCategoryValidationServices;
use App\DTO\MenuCategory\CreateMenuCategoryDTO;
use App\DTO\MenuCategory\DeleteMenuCategoryDTO;


class MenuCategoryController extends Controller
{
    /**
     * Create a newly created resource in storage.
    */
    public function create(Request $request, MenuCategoryServices $service, MenuCategoryValidationServices $validation)
    {
        $is_valid = $validation->CreateActionValidate($request);
        if (key_exists('errors', $is_valid))
        {
            return response()->json([
                "response" =>  $is_valid
            ]);
        }
        return response()->json([
            "response" => $service->actionCreate(
                new CreateMenuCategoryDTO($request->Title)
            )
        ]);
    }

    /**
     * Delete a resource in storage.
    */
    public function delete(int $category_id, MenuCategoryServices $service)
    {
        return response()->json([
            "response" => $service->actionDelete(
                new DeleteMenuCategoryDTO($category_id)
            )
        ]);
    }

    /**
     * All a resource in storage.
    */
    public function all(MenuCategoryServices $service)
    {
        return response()->json([
            "response" => $service->actionAll()
        ]);
    }
}
