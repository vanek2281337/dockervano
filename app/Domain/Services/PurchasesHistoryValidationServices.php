<?php
namespace App\Domain\Services;

use Illuminate\Http\Request;
use App\Domain\IServices\IPurchasesHistoryValidationServices;


class PurchasesHistoryValidationServices implements IPurchasesHistoryValidationServices
{
    /**
     * Правила и сообщения валидации для 
     * создания категорий меню в системе.
    */
    public const INGRIDIENT_VALIDATOR = [
        "UserId" => "required",
        "Price" => "required",
        "Values" => "required|min:2",
    ];
    
    public const INGRIDIENT_ERROR_MESSAGE = [
        // REQUIRED
        "UserId.required" => "Укажите ID пользователя.",
        "Price.required" => "Укажите цену.",
        "Values.required" => "Values является обязательным.",
        // MIN
        "Values.min" => "Values не должено быть меньше :min символов."
    ];

    public function CreateActionValidate(Request $request)
    {
        return $request->validate(self::INGRIDIENT_VALIDATOR, self::INGRIDIENT_ERROR_MESSAGE);
    }
}