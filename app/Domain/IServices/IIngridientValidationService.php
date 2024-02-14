<?php
namespace App\Domain\IServices;

use Illuminate\Http\Request;


interface IIngridientValidationService
{
    public function CreateActionValidate(Request $request);
}