<?php
namespace App\Domain\IServices;

use Illuminate\Http\Request;
use App\DTO\User\CodeUserDTO;
use App\DTO\User\CreateUserDTO;
use App\DTO\User\AuthUserDTO;
use App\DTO\User\ShowByPhoneUserDTO;
use App\DTO\User\UpdateUserDTO;

interface IUserServices
{
    public function CodeAction(CodeUserDTO $context);
    public function CreateAction(CreateUserDTO $context);
    public function AuthAction(AuthUserDTO $context);
    public function ShowByPhoneAction(ShowByPhoneUserDTO $context);
    public function UpdateAction(UpdateUserDTO $context);
}