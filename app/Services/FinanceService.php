<?php

namespace App\Services;

use App\Http\Requests\Finances\StoreRequest;
use App\Repositories\FinanceRepository;

class FinanceService
{
    private $repository;

    function __construct(FinanceRepository $financeRepository)
    {
        $this->repository = $financeRepository;
    }

    /**
     * add new finance data into FinanceRepository
     *
     * @param StoreRequest $request
     * 
     * @return void
     */

    public function storeFinance(StoreRequest $request): void
    {
        $this->repository->store($request->validated());
    }

    /**
     * get finance data from FinanceRepository
     *
     * 
     * @return object
     */

    public function getFinances(): object
    {
        return $this->repository->getAll();
    }

    /**
     * destroy finance data by specified from FinanceRepository
     *
     * @param string $id
     * 
     * @return void
     */

    public function destroyFinance(string $id): void
    {
        $this->repository->destroy($id);
    }

    /**
     * sum income finance data from FinanceRepository
     *
     * 
     * @return int
     */

    public function sumIncomeFinances(): int
    {
        return $this->repository->sumFinances('in');
    }

    /**
     * sum outcome finance data from FinanceRepository
     *
     * 
     * @return int
     */

    public function sumOutcomeFinances(): int
    {
        return $this->repository->sumFinances('out');
    }
}
