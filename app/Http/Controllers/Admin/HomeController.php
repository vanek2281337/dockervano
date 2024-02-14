<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Services\IngridientServices;
use App\Domain\Services\MenuCategoryServices;
use App\Domain\Services\MenuServices;
use App\Domain\Services\PurchasesHistoryServices;
use App\Domain\Services\UserServices;
use App\DTO\Menu\ShowMenuDTO;
use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (session()->get('user'))
        {
            return redirect()->route('admin');
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function admin()
    {
        if (session()->get('user'))
        {
            return view('admin');
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function send_code()
    {
        return view('login');
    }

    public function login(string|null $phone = null)
    {
        return view('login' ,[
            "user_phone" => $phone
        ]);
    }

    public function menu_category(MenuCategoryServices $service)
    {
        if (session()->get('user'))
        {
            return view('menu_category', [
                'menu_category_list' => $service->actionAll()
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function menu_category_create()
    {
        if (session()->get('user'))
        {
            return view('menu_category_create');
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function ingridients(IngridientServices $service, MenuCategory $menuCategory)
    {
        if (session()->get('user'))
        {
            $data = array();

            foreach ($service->actionAll() as $item)
            {
                array_push($data, [
                    "id" => $item->id,
                    "title" => $item->Title,
                    "category" => $menuCategory::find($item->CategoryId)
                ]);
            }
            return view('ingridients', [
                'ingridients' => $data
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function ingridients_create(MenuCategoryServices $menuCategoryService)
    {
        if (session()->get('user'))
        {
            return view('ingridient_create', [
                'category_list' => $menuCategoryService->actionAll()
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function menu(MenuServices $service, MenuCategory $menuCategory)
    {
        if (session()->get('user'))
        {
            $data = array();

            foreach ($service->actionAll() as $item)
            {
                array_push($data, [
                    "id" => $item->id,
                    "title" => $item->Title,
                    "description" => $item->Description,
                    "image" => $item->Image,
                    "price" => $item->Price,
                    "category" => $menuCategory::find($item->CategoryId)
                ]);
            }

            return view('menu', [
                'menu_list' => $data
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function menu_create(MenuCategory $menuCategory)
    {
        if (session()->get('user'))
        {
            return view('menu_create', [
                "category_list" => $menuCategory::get()
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function menu_update(int $id, MenuServices $service, MenuCategory $menuCategory)
    {
        if (session()->get('user'))
        {
            $row = $service->actionShow(new ShowMenuDTO($id));
            return view('menu_update', [
                "menu" => [
                    "id" => $row->id,
                    "category_id" => $row->CategoryId,
                    "title" => $row->Title,
                    "description" => $row->Description,
                    "image" => $row->Image,
                    "price" => $row->Price
                ],
                "category_list" => $menuCategory::get()
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function users_client(User $users)
    {
        if (session()->get('user'))
        {
            return view('users', [
                "users" => $users::where('Role', 'Клиент')->get()
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function users_employee(User $users)
    {
        if (session()->get('user'))
        {
            return view('users', [
                "users" => $users::where('Role', '!=', 'Клиент')
                    ->get()
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function users_create()
    {
        if (session()->get('user'))
        {
            return view('users_create');
        }
        else
        {
            return redirect()->route('admin.send_code');
        }   
    }

    public function users_update(int $id, User $user)
    {
        if (session()->get('user'))
        {
            return view('users_update', [
                "user" => $user::find($id)
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function food_order(PurchasesHistoryServices $service, User $user)
    {
        if (session()->get('user'))
        {
            $arr = array();
            foreach ($service->AllAction() as $item)
            {
                if ($item->Status == "Готово")
                {
                    array_push($arr, [
                        "id" => $item->id,
                        "users" => $user::find($item->UserId),
                        "status" => $item->Status,
                        "price" => $item->Price,
                        "values" => json_decode($item->Values, true),
                        "set_date" => $item->SetDate,
                        "set_time" => $item->SetTime
                    ]);
                }
                
            }
            return view('food_order', [
                "purchases_history" => $arr
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }

    public function orders(PurchasesHistoryServices $service, User $user)
    {
        if (session()->get('user'))
        {
            $cooking = array();
            foreach ($service->AllAction() as $item)
            {
                if ($item->Status == "Заказ готовится")
                {
                    array_push($cooking, [
                        "id" => $item->id,
                        "users" => $user::find($item->UserId),
                        "status" => $item->Status,
                        "price" => $item->Price,
                        "values" => json_decode($item->Values, true),
                        "set_date" => $item->SetDate,
                        "set_time" => $item->SetTime
                    ]);
                }
                
            }

            $delivered = array();
            foreach ($service->AllAction() as $item)
            {
                if ($item->Status == "Курьер в пути")
                {
                    array_push($delivered, [
                        "id" => $item->id,
                        "status" => $item->Status,
                    ]);
                }
                
            }
            return view('orders', [
                "delivered" => $delivered,
                "cooking" => $cooking
            ]);
        }
        else
        {
            return redirect()->route('admin.send_code');
        }
    }
}
