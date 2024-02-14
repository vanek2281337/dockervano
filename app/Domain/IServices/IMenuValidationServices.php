<?php
namespace App\Domain\IServices;

use Illuminate\Http\Request;

interface IMenuValidationServices
{
    public function CreateActionValidate(Request $request);
}