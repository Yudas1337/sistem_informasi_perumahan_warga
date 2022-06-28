<?php

namespace App\Services;

use App\Http\Requests\Dues\StoreRequest;
use App\Http\Requests\SearchDueRequest;
use App\Repositories\DueRepository;

class DueService
{
    private $repository;

    function __construct(DueRepository $dueRepository)
    {
        $this->repository = $dueRepository;
    }

    /**
     * add new due data into DueRepository
     *
     * @param StoreRequest $request
     * 
     * @return void
     */

    public function storeDue(StoreRequest $request): void
    {
        $this->repository->store($request->validated());
    }

    /**
     * Summ all due from DueRepository with rupiah format
     *
     * 
     * @return mixed
     */

    public function sumAllDue(): mixed
    {
        return $this->repository->sumAllDue();
    }

    /**
     * Summ total due from DueRepository
     *
     * 
     * @return mixed
     */

    public function sumTotal(): mixed
    {
        return $this->repository->sumTotal();
    }

    /**
     * Summ all due per current month from DueRepository
     *
     * 
     * @return mixed
     */

    public function sumDuePerMonth(): mixed
    {
        return $this->repository->sumDuePerMonth();
    }

    /**
     * Get all due from DueRepository
     *
     * 
     * @return object
     */

    public function getAllDues(): object
    {
        return $this->repository->withRelationship(['residence.denizens'], 'latest');
    }

    /**
     * destroy due by specified id from DueRepository
     *
     * @param string $id
     * 
     * @return void
     */

    public function destroyDue(string $id): void
    {
        $this->repository->destroy($id);
    }
}
