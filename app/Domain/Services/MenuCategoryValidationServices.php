<?php
namespace App\Domain\Services;

use Illuminate\Http\Request;
use App\Domain\IServices\IMenuCategoryValidationServices;


class MenuCategoryValidationServices implements IMenuCategoryValidationServices
{
    /**
     * Правила и сообщения валидации для 
     * создания категорий меню в системе.
    */
    public const MENU_CATEGORY_VALIDATOR = [
        "Title" => "required|min:4|max:180",
    ];
    
    public const MENU_CATEGORY_ERROR_MESSAGE = [
        // REQUIRED
        "Title.required" => "Укажите название категории.",
        // MIN
        "Title.min" => "Название категории не должено быть меньше :min символов.",
        // MAX
        "Title.max" => "Название категории не должено быть больше :max символов.",
    ];

    public function CreateActionValidate(Request $request)
    {
        return $request->validate(self::MENU_CATEGORY_VALIDATOR, self::MENU_CATEGORY_ERROR_MESSAGE);
    }
}