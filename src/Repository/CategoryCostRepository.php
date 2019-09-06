<?php


namespace SONFin\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use SONFin\Models\BillPay;
use SONFin\Models\BillReceive;

class CategoryCostRepository extends DefaultRepository implements CategoryCostRepositoryInterface
{

    public function sumByPeriod(string $dateStart, string $dateEnd, $userId): array
    {
        // TODO: Implement sumByPeriod() method.
    }
}