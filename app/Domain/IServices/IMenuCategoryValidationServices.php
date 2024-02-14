<?php
namespace App\Domain\IServices;

use Illuminate\Http\Request;


interface IMenuCategoryValidationServices
{
    public function CreateActionValidate(Request $request);
}