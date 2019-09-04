<?php


namespace SONFin\Repository;

use Illuminate\Database\Eloquent\Model;
use SONFin\Models\BillPay;

class StatementRepository implements StatementRepositoryInterface
{

    public function all(string $dateStart, string $dateEnd, $userId): array
    {
        $billPays = BillPay::query()
                        ->selectRaw('bill_pays.*, category_costs.name as category_name')
                        ->leftJoin('category_costs', 'category_costs.id', '=', 'bill_pays.category_costs.id')
                        ->whereBetween('date_launch', [$dateStart,$dateEnd])
                        ->where('bill_pays.user_id', $userId)
                        ->get();

        $billPays = BillPay::query()
            ->whereBetween('date_launch', [$dateStart,$dateEnd])
            ->where('user_id', $userId)
            ->get();
    }


}