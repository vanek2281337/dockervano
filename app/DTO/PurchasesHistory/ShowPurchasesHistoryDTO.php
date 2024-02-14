<?php
namespace App\DTO\PurchasesHistory;

final class ShowPurchasesHistoryDTO
{
    public string $Status;

    public function __construct(string $Status)
    {
        $this->Status = $Status;
    }
}