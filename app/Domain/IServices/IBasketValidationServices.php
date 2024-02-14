<?php
namespace App\Domain\IServices;

use Illuminate\Http\Request;


interface IBasketValidationServices
{
    public function CreateActionValidate(Request $request);
}