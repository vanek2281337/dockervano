<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Services\MenuCategoryServices;
use App\DTO\MenuCategory\CreateMenuCategoryDTO;
use App\DTO\MenuCategory\DeleteMenuCategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMenuCategoryRequest;
use Illuminate\Http\Request;

class PostMenuCategoryController extends Controller
{
    public function create(CreateMenuCategoryRequest $request, MenuCategoryServices $service)
    {
        $request->validated();
        $service->actionCreate(
            new CreateMenuCategoryDTO(
                $request['title']
            )
        );
        return redirect()
            ->route('admin.menu_category')
            ->with('success', 'Данные сохранены!');
    }

    public function delete(Request $request, MenuCategoryServices $service)
    {
        $service->actionDelete(
            new DeleteMenuCategoryDTO(
                $request['id']
            )
        );
        return redirect()
            ->route('admin.menu_category')
            ->with('success', 'Данные удалены!');
    }
}
