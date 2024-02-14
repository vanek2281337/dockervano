<?php
namespace App\Domain\Services;

use Illuminate\Http\Request;
use App\Domain\IServices\IMenuValidationServices;


class MenuValidationServices implements IMenuValidationServices
{
    /**
     * Правила и сообщения валидации для 
     * создания категорий меню в системе.
    */
    public const MENU_VALIDATOR = [
        "CategoryId" => "required",
        "Title" => "required|min:4|max:180",
        "Description" => "required|min:10",
        "Image" => "required",
        "Price" => "required",
    ];
    
    public const MENU_ERROR_MESSAGE = [
        // REQUIRED
        "CategoryId.required" => "Укажите категорию.",
        "Title.required" => "Укажите название категории.",
        "Description.required" => "Укажите название категории.",
        "Image.required" => "Изображение должно быть обязательным.",
        "Price.required" => "Укажите цену.",
        // MIN
        "Title.min" => "Наименование позиции не должено быть меньше :min символов.",
        "Description.min" => "Описание не должено быть меньше :min символов.",
        // MAX
        "Title.max" => "Название категории не должено быть больше :max символов.",
    ];

    public function CreateActionValidate(Request $request)
    {
        return $request->validate(self::MENU_VALIDATOR, self::MENU_ERROR_MESSAGE);
    }

    public function UpdateActionValidate(Request $request)
    {
        return $request->validate(self::MENU_VALIDATOR, self::MENU_ERROR_MESSAGE);
    }
}