<?php
namespace App\Domain\Services;

use Illuminate\Http\Request;
use App\Domain\IServices\IIngridientValidationService;


class IngridientValidationService implements IIngridientValidationService
{
    /**
     * Правила и сообщения валидации для 
     * создания категорий меню в системе.
    */
    public const INGRIDIENT_VALIDATOR = [
        "CategoryId" => "required",
        "Title" => "required|min:2|max:60",
    ];
    
    public const INGRIDIENT_ERROR_MESSAGE = [
        // REQUIRED
        "CategoryId.required" => "Укажите категорию.",
        "Title.required" => "Укажите название ингридиента.",
        // MIN
        "Title.min" => "Наименование ингридиента не должено быть меньше :min символов.",
        // MAX
        "Title.max" => "Название ингридиента не должено быть больше :max символов.",
    ];

    public function CreateActionValidate(Request $request)
    {
        return $request->validate(self::INGRIDIENT_VALIDATOR, self::INGRIDIENT_ERROR_MESSAGE);
    }
}