<?php

namespace App\Repositories;

use App\Models\Denizen;

class DenizenRepository extends BaseRepository
{

    function __construct(Denizen $denizen)
    {
        $this->model = $denizen;
    }

    /**
     * Get denizen by specified id
     * 
     * @param string $nik
     *
     * @return object
     */

    public function getDenizenwithId(string $nik): object
    {
        return $this->model->where('nik', $nik)->with(['residence'])->firstOrFail();
    }

    /**
     * Update denizen by specified id
     * 
     * @param string $nik
     * @param array $data
     *
     * @return mixed
     */

    public function updateDenizen(string $nik, array $data)
    {
        return $this->model->where('nik', $nik)->firstOrFail()->update($data);
    }

    /**
     * search dues by specified nik
     * 
     * @param string $nik
     * 
     * @return mixed
     */

    public function searchByNik(string $nik)
    {
        return $this->model->where('nik', $nik)
            ->whereHas('residence')
            ->with(['residence.dues'])
            ->get();
    }

    /**
     * Get denizen file Diskname
     * 
     *
     * @return string
     */

    public function getDiskName(): string
    {
        return ('denizen_images');
    }
}
