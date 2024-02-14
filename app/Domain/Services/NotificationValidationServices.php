<?php
namespace App\Domain\Services;

use Illuminate\Http\Request;
use App\Domain\IServices\INotificationValidationServices;


class NotificationValidationServices implements INotificationValidationServices
{
    /**
     * Правила и сообщения валидации для 
     * создания категорий меню в системе.
    */
    public const INGRIDIENT_VALIDATOR = [
        "Title" => "required|min:4|max:180",
    ];
    
    public const INGRIDIENT_ERROR_MESSAGE = [
        // REQUIRED
        "Title.required" => "Укажите название уведомления.",
        // MIN
        "Title.min" => "Название уведомления не должено быть меньше :min символов.",
        // MAX
        "Title.max" => "Название уведомления не должено быть больше :max символов.",
    ];

    public function CreateActionValidate(Request $request)
    {
        return $request->validate(self::INGRIDIENT_VALIDATOR, self::INGRIDIENT_ERROR_MESSAGE);
    }

    public function UpdateActionValidate(Request $request)
    {
        return $request->validate(self::INGRIDIENT_VALIDATOR, self::INGRIDIENT_ERROR_MESSAGE);
    }
}