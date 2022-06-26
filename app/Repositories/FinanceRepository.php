<?php

namespace App\Repositories;

use App\Models\Finance;

class FinanceRepository extends BaseRepository
{
    function __construct(Finance $finance)
    {
        $this->model = $finance;
    }

    /**
     * Sum all income total finances
     * 
     * @param mixed $status
     * @return int
     */

    public function sumFinances(mixed $status): int
    {
        return $this->model->where('status', $status)->sum('total');
    }
}
