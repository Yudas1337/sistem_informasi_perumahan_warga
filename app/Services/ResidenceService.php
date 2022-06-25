<?php

namespace App\Services;

use App\Helpers\UploadHelper;
use App\Http\Requests\Residence\{
    StoreRequest,
    UpdateRequest
};
use App\Http\Requests\SearchResidence;
use App\Repositories\{
    HouseTypeRepository,
    ResidenceRepository
};
use Illuminate\Database\QueryException;

class ResidenceService
{
    private $repository, $typeRepository;

    function __construct(ResidenceRepository $residenceRepository, HouseTypeRepository $houseTypeRepository)
    {
        $this->repository = $residenceRepository;
        $this->typeRepository = $houseTypeRepository;
    }

    /**
     * Get all residence data from ResidenceRepository
     *
     * 
     * @return void
     */

    public function getResidences(): object
    {
        return $this->repository->withRelationship(['house_type']);
    }

    /**
     * Count all residence data from ResidenceRepository
     *
     * 
     * @return int
     */

    public function countResidences(): int
    {
        return $this->repository->countResidences();
    }

    /**
     * Count all house type data from ResidenceRepository
     *
     * 
     * @return int
     */

    public function countHouseType(): int
    {
        return $this->typeRepository->countHouseType();
    }

    /**
     * add new residence data into ResidenceRepository
     *
     * @param StoreRequest $request
     * 
     * @return void
     */

    public function storeResidence(StoreRequest $request)
    {
        $validated  = $request->validated();

        $find = $this->typeRepository->show($validated['house_types_id']);

        if ($find) {
            $images = UploadHelper::handleUpload($request->file('images'), $this->repository->getDiskName());
            $this->repository->store([
                'neighbourhood'     => $validated['neighbourhood'],
                'hamlet'            => $validated['hamlet'],
                'owner_name'        => $validated['owner_name'],
                'address'           => $validated['address'],
                'house_types_id'    => $validated['house_types_id'],
                'images'            => $images
            ]);
        }
    }

    /**
     * update residence data into ResidenceRepository
     *
     * @param UpdateRequest $request
     * @param string $id
     * 
     * @return void
     */

    public function updateResidence(UpdateRequest $request, string $id): void
    {
        $validated = $request->validated();

        $find       = $this->typeRepository->show($validated['house_types_id']);
        $photo      = $this->repository->show($id)->images;

        abort_if(!$find, 404);

        if ($request->file('images')) {
            if (!is_null($photo)) UploadHelper::handleRemove($photo);
            $photo = UploadHelper::handleUpload($request->file('images'), $this->repository->getDiskName());
        }

        $this->repository->update($id, [
            'neighbourhood'     => $validated['neighbourhood'],
            'hamlet'            => $validated['hamlet'],
            'owner_name'        => $validated['owner_name'],
            'address'           => $validated['address'],
            'house_types_id'    => $validated['house_types_id'],
            'images'            => $photo
        ]);
    }

    /**
     * show specified residence data from ResidenceRepository by given id
     *
     * @param string $id
     * 
     * @return object
     */

    public function showResidence(string $id): object
    {
        return $this->repository->show($id);
    }

    /**
     * Handle delete specified residence data from ResidenceRepository by given id
     *
     * @param string $id
     * 
     * @return mixed
     */

    public function destroyResidence(string $id)
    {
        $show = $this->repository->show($id);

        try {
            $this->repository->destroy($id);
            if (!is_null($show->images)) UploadHelper::handleRemove($show->images);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1461) {
            }
        }
    }

    /**
     * Handle search residence data from ResidenceRepository by given keyword
     *
     * @param SearchResidence $request
     * 
     * @return mixed
     */

    public function searchResidence(SearchResidence $request)
    {
        $search = $request->validated()['search'];

        $results = $this->repository->search($search);

        return (count($results) > 0) ? $results : $this->getResidences();
    }
}
