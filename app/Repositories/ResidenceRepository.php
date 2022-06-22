<?php

namespace App\Repositories;

use App\Models\Residence;
use App\Repositories\BaseRepository;


class ResidenceRepository extends BaseRepository
{

    function __construct(Residence $residence)
    {
        $this->model = $residence;
    }

    /**
     * Get residences file Diskname
     * 
     *
     * @return string
     */

    public function getDiskName(): string
    {
        return ('residence_images');
    }

    /**
     * searh residences by keyword
     * 
     * @param string $search
     *
     * @return mixed
     */

    public function search(string $search)
    {
        return $this->model
            ->whereLike('address', $search)
            ->get();
    }
}
