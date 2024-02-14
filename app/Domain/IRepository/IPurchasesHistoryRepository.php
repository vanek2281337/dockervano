<?php
namespace App\Domain\IRepository;

use App\DTO\PurchasesHistory\CreatePurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowPurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowByUserPurchasesHistoryDTO;
use App\DTO\PurchasesHistory\UpdateStatusPurchasesHistoryDTO;

interface IPurchasesHistoryRepository
{
    public function Create(CreatePurchasesHistoryDTO $context);
    public function Show(ShowPurchasesHistoryDTO $context);
    public function ShowByUser(ShowByUserPurchasesHistoryDTO $context);
    public function Updae(UpdateStatusPurchasesHistoryDTO $context);
}