<?php
namespace App\Domain\IRepository;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\AuthUserDTO;
use App\DTO\User\ShowByPhoneUserDTO;
use App\DTO\User\UpdateUserDTO;

interface IUserRepository
{
    public function Create(CreateUserDTO $context);
    public function Auth(AuthUserDTO $context);
    public function ShowByPhone(ShowByPhoneUserDTO $context);
    public function Update(UpdateUserDTO $context);
}