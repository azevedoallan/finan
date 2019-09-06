<?php
declare(strict_types = 1);

namespace SONFin\Repository;


interface CategoryCostRepositoryInterface
{
    public function sumByPeriod(string $dateStart, string $dateEnd, $userId ): array ;


}