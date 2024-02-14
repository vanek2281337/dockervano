<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Services\MenuServices;
use App\DTO\Menu\CreateMenuDTO;
use App\DTO\Menu\DeleteMenuDTO;
use App\DTO\Menu\UpdateMenuDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;

class PostMenuController extends Controller
{
    public function create(Request $image, CreateMenuRequest $request, MenuServices $service)
    {
        $request->validated();
        $service->actionCreate(
            new CreateMenuDTO(
                $request['category_id'],
                $request['title'],
                $request['description'],
                $image->file('image')
                    ->store('uploads', 'public'),
                $request['price'],
                null
            )
        );
        return redirect()
            ->route('admin.menu')
            ->with('success', 'Данные добавлены!');
    }

    public function update(Request $image, UpdateMenuRequest $request, MenuServices $service)
    {
        $request->validated();
        $service->actionUpdate(
            new UpdateMenuDTO(
                $request['id'],
                $request['category_id'],
                $request['title'],
                $request['description'],
                $image->image ? $image->file('image')->store('uploads', 'public') : $request['image_old'],
                $request['price'],
                null
            )
        );
        return redirect()
            ->route('admin.menu')
            ->with('success', 'Данные изменены!');
    }

    public function delete(Request $request, MenuServices $service)
    {
        $service->actionDelete(
            new DeleteMenuDTO($request->id)
        );
        return redirect()
            ->route('admin.menu')
            ->with('success', 'Данные удалены!');
    }
}
