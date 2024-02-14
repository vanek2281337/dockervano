<?php
namespace App\Domain\Services;

use Illuminate\Http\Request;

use App\Domain\IServices\IPurchasesHistoryServices;
use App\DTO\PurchasesHistory\CreatePurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowPurchasesHistoryDTO;
use App\DTO\PurchasesHistory\ShowByUserPurchasesHistoryDTO;
use App\Repository\PurchasesHistoryRepository;
use App\DTO\PurchasesHistory\UpdateStatusPurchasesHistoryDTO;

class PurchasesHistoryServices implements IPurchasesHistoryServices
{
    private PurchasesHistoryRepository $repository;
    public function __construct()
    {
        $this->repository = new PurchasesHistoryRepository();
    }

    public function CreateAction(CreatePurchasesHistoryDTO $context)
    {
        return $this->repository->Create($context);
    }

    public function ShowAction(ShowPurchasesHistoryDTO $context)
    {
        return $this->repository->Show($context);
    }

    public function ShowByUserAction(ShowByUserPurchasesHistoryDTO $context)
    {
        return $this->repository->ShowByUser($context);
    }

    public function AllAction()
    {
        return $this->repository->All();
    }

    public function UpdateAction(UpdateStatusPurchasesHistoryDTO $context)
    {
        return $this->repository->Updae($context);
    }
}