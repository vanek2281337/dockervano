<?php
namespace App\Domain\IServices;

use Illuminate\Http\Request;


interface IPurchasesHistoryValidationServices
{
    public function CreateActionValidate(Request $request);
}