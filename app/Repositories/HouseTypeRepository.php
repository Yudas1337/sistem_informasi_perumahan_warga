<?php

namespace App\Repositories;

use App\Models\HouseType;

class HouseTypeRepository extends BaseRepository
{
    function __construct(HouseType $houseType)
    {
        $this->model = $houseType;
    }
}
