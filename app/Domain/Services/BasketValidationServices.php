<?php
namespace App\Domain\Services;

use Illuminate\Http\Request;
use App\Domain\IServices\IBasketValidationServices;


class BasketValidationServices implements IBasketValidationServices
{
    /**
     * Правила и сообщения валидации для 
     * создания категорий меню в системе.
    */
    public const BASKET_VALIDATOR = [
        "UserId" => "required",
        "MenuId" => "required",
        "Price" => "required",
        "Count" => "required",
    ];
    
    public const BASKET_ERROR_MESSAGE = [
        // REQUIRED
        "UserId.required" => "Укажите ID пользователя.",
        "MenuId.required" => "Укажите ID позиции.",
        "Price.required" => "Укажите цену.",
        "Count.required" => "Укажите количество позиций."
    ];

    public function CreateActionValidate(Request $request)
    {
        return $request->validate(self::BASKET_VALIDATOR, self::BASKET_ERROR_MESSAGE);
    }

}