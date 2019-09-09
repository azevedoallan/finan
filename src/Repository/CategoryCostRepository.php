<?php


namespace SONFin\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use SONFin\Models\BillPay;
use SONFin\Models\BillReceive;
use SONFin\Models\CategoryCost;

class CategoryCostRepository extends DefaultRepository implements CategoryCostRepositoryInterface
{

    /**
     * CategoryCostRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(CategoryCost::class);
    }

    public function sumByPeriod(string $dateStart, string $dateEnd, $userId): array
    {
        $categories = CategoryCost::query()
            ->selectRaw('category_costs.name, sum(value) as value')
            ->leftJoin('bill_pays', 'bill_pays.category_cost_id', '=', 'category_costs.id')
            ->where('category_costs.user_id', $userId)
            ->groupBy('value')
            ->groupBy('category_costs.name');
        return $categories->toArray();
    }
}