<?php
namespace App\Domain\IServices;

use Illuminate\Http\Request;

interface INotificationValidationServices
{
    public function CreateActionValidate(Request $request);
    public function UpdateActionValidate(Request $request);
}