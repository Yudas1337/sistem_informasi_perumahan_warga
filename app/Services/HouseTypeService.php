<?php

namespace App\Services;

use App\Repositories\HouseTypeRepository;

class HouseTypeService
{
    private $repository;

    function __construct(HouseTypeRepository $houseTypeRepository)
    {
        $this->repository = $houseTypeRepository;
    }

    /**
     * Get all House type in HouseTypeRepository
     *
     * @return object
     */

    public function getAll(): object
    {
        return $this->repository->getALl();
    }
}
