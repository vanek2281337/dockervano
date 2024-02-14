<?php
namespace App\DTO\Basket;

final class CreateBasketDTO
{
    public int $UserId;
    public int $MenuId;
    public float $Price;
    public int $Count;
    public string|null $IngridientCode;
    public string|null $Values;

    public function __construct(int $UserId, string $MenuId, float $Price, int $Count, string|null $IngridientCode, string|null $Values)
    {
        $this->UserId = $UserId;
        $this->MenuId = $MenuId;
        $this->Price = $Price;
        $this->Count = $Count;
        $this->IngridientCode = $IngridientCode;
        $this->Values = $Values;
    }
}
