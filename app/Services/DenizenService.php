<?php

namespace App\Services;

use App\Helpers\UploadHelper;
use App\Http\Requests\Denizen\StoreRequest;
use App\Http\Requests\Denizen\UpdateRequest;
use App\Repositories\DenizenRepository;

class DenizenService
{
    private $repository;

    function __construct(DenizenRepository $denizenRepository)
    {
        $this->repository = $denizenRepository;
    }

    /**
     * show denizen data by specified id to ActivityRepository.
     * 
     * @param string id
     * 
     * @return objeect
     */

    public function getDenizensById(string $id): object
    {
        return $this->repository->getDenizenwithId($id);
    }

    /**
     * count all denizens data from ResidenceRepository
     *
     * 
     * @return int
     */

    public function countDenizens(): int
    {
        return count($this->repository->getAll());
    }

    /**
     * store denizen data to ActivityRepository.
     * 
     * @param StoreRequest $request
     * 
     * @return void
     */

    public function storeDenizen(StoreRequest $request): void
    {
        $data = $request->validated();

        $photo = UploadHelper::handleUpload($request->file('photo'), $this->repository->getDiskName());

        $this->repository->store([
            'nik'           => $data['nik'],
            'name'          => $data['name'],
            'phone_number'  => $data['phone_number'] ?? null,
            'gender'        => $data['gender'],
            'birth_place'   => $data['birth_place'],
            'birth_date'    => $data['birth_date'],
            'religion'      => $data['religion'],
            'families'      => $data['families'],
            'photo'         => $photo,
            'residences_id' => $data['residences_id']
        ]);
    }

    /**
     * store denizen data to ActivityRepository.
     * 
     * @param UpdateRequest $request
     * @param string $id
     * 
     * @return void
     */

    public function updateDenizen(UpdateRequest $request, string $id): void
    {
        $data  = $request->validated();
        $show  = $this->repository->getDenizenwithId($id);
        $photo = $show->photo;
        if ($request->hasFile('photo')) {
            UploadHelper::handleRemove($show->photo);
            $photo = UploadHelper::handleUpload($request->file('photo'), $this->repository->getDiskName());
        }

        $this->repository->updateDenizen($id, [
            'nik'           => $data['nik'],
            'name'          => $data['name'],
            'phone_number'  => $data['phone_number'] ?? null,
            'gender'        => $data['gender'],
            'birth_place'   => $data['birth_place'],
            'birth_date'    => $data['birth_date'],
            'religion'      => $data['religion'],
            'families'      => $data['families'],
            'photo'         => $photo,
            'residences_id' => $data['residences_id']
        ]);
    }

    /**
     * destroy denizen data by specified id from ActivityRepository.
     * 
     * @param string id
     * 
     * @return void
     */

    public function destroyDenizen(string $id)
    {
        $show = $this->repository->getDenizenwithId($id);

        if (!is_null($show->photo)) UploadHelper::handleRemove($show->photo);

        $this->repository->destroy($id);
    }
}
