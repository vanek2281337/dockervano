<?php
namespace App\Domain\Services;

use Illuminate\Http\Request;
use App\Domain\IServices\IPushUserSessionValidationServices;


class PushUserSessionValidationServices implements IPushUserSessionValidationServices
{
    /**
     * Правила и сообщения валидации для 
     * создания категорий меню в системе.
    */
    public const PUSH_SESSION_VALIDATOR = [
        "UserId" => "required",
        "Value" => "required",
    ];
    
    public const PUSH_SESSION_ERROR_MESSAGE = [
        // REQUIRED
        "UserId.required" => "Укажите ID пользователя.",
        "Value.required" => "Укажите значение.",
    ];

    public function UpdateActionValidate(Request $request)
    {
        return $request->validate(self::PUSH_SESSION_VALIDATOR, self::PUSH_SESSION_ERROR_MESSAGE);
    }
}