<?php
namespace App\Domain\IServices;

use Illuminate\Http\Request;


interface IPushUserSessionValidationServices
{
    public function UpdateActionValidate(Request $request);
}