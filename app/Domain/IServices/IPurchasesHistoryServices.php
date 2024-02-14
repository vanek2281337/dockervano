<?php
namespace App\Domain\IServices;

use App\DTO\PurchasesHistory\CreatePurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowPurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowByUserPurchasesHistoryDTO;
use App\DTO\PurchasesHistory\UpdateStatusPurchasesHistoryDTO;

interface IPurchasesHistoryServices
{
    public function CreateAction(CreatePurchasesHistoryDTO $context);
    public function ShowAction(ShowPurchasesHistoryDTO $context);
    public function ShowByUserAction(ShowByUserPurchasesHistoryDTO $context);
    public function UpdateAction(UpdateStatusPurchasesHistoryDTO $context);
}