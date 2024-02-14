<?php
namespace App\DTO\PurchasesHistory;

final class ShowByUserPurchasesHistoryDTO
{
    public int $UserId;

    public function __construct(int $UserId)
    {
        $this->UserId = $UserId;
    }
}
