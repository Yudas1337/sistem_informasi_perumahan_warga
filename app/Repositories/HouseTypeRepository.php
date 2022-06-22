<?php

namespace App\Repositories;

use App\Models\HouseType;

class HouseTypeRepository extends BaseRepository
{
    function __construct(HouseType $houseType)
    {
        $this->model = $houseType;
    }

    /**
     * count all house type
     * 
     *
     * @return int
     */

    public function countHouseType(): int
    {
        return $this->model->count();
    }
}
