<?php

namespace App\Repositories;

use App\Models\Due;
use App\Traits\CurrencyTrait;

class DueRepository extends BaseRepository
{
    use CurrencyTrait;

    function __construct(Due $due)
    {
        $this->model = $due;
    }

    /**
     * Sum all total due
     * 
     * @return int
     */


    private function sumTotal(): int
    {
        return $this->model->sum('total');
    }

    /**
     * Sum all total due and convert it to rupiah currency
     * 
     * @return mixed
     */

    public function sumAllDue(): mixed
    {
        return $this->convertRupiah($this->sumTotal());
    }

    /**
     * Sum total due per month and convert it to rupiah currency
     * 
     * @return mixed
     */

    public function sumDuePerMonth(): mixed
    {
        $data = $this->model->whereMonth('date', now()->month)->sum('total');

        return $this->convertRupiah($data);
    }
}
