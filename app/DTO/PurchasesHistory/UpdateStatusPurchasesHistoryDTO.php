<?php

namespace App\DTO\PurchasesHistory;

class UpdateStatusPurchasesHistoryDTO
{
    public int $Id;
    public int $UserId;
    public string $Status;
    public float $Price;
    public string $Values;
    public string $SetDate;
    public string $SetTime;

    public function __construct(int $Id, int $UserId, string $Status, float $Price, 
                                string $Values, string $SetDate, string $SetTime)
    {
        $this->Id = $Id;
        $this->UserId = $UserId;
        $this->Status = $Status;
        $this->Price = $Price;
        $this->Values = $Values;
        $this->SetDate = $SetDate;
        $this->SetTime = $SetTime;
    }
}
