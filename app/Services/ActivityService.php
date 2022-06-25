<?php

namespace App\Services;

use App\Helpers\UploadHelper;
use App\Http\Requests\Activity\StoreRequest;
use App\Http\Requests\Activity\UpdateRequest;
use App\Repositories\ActivityRepository;

class ActivityService
{
    private $repository;

    function __construct(ActivityRepository $activityRepository)
    {
        $this->repository = $activityRepository;
    }

    /**
     * Get all categories from ActivityCategory model.
     * 
     * @return object
     */

    public function fetchCategories(): object
    {
        return $this->repository->getCategories();
    }

    /**
     * Get all activities from ActivityCategory model.
     * 
     * @return object
     */

    public function fetchActivities(): object
    {
        return $this->repository->withRelationship(['category']);
    }

    /**
     * store activity data to ActivityRepository.
     * 
     * @param StoreRequest $request
     * 
     * @return void
     */

    public function storeActivity(StoreRequest $request): void
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $thumbnail = UploadHelper::handleUpload($request->file('thumbnail'), $this->repository->getDiskName());
        }

        $this->repository->store([
            'title'         => $data['title'],
            'description'   => $data['description'],
            'thumbnail'     => $thumbnail ?? null,
            'content'       => $data['content'],
            'location'      => $data['location'],
            'date'          => $data['date'],
            'categories_id' => $data['categories_id']
        ]);
    }

    /**
     * get activity data by specified id from ActivityRepository.
     * 
     * @param string $id
     * 
     * @return object
     */

    public function showActivity(string $id): object
    {
        return $this->repository->show($id);
    }

    /**
     * update activity data by specified id to ActivityRepository.
     * 
     * @param UpdateRequest $request
     * @param string $id
     * 
     * @return mixed
     */

    public function updateActivity(UpdateRequest $request, string $id)
    {
        $data       = $request->validated();
        $show       = $this->repository->show($id);
        $thumbnail  = $show->thumbnail;

        if ($request->hasFile('thumbnail')) {
            UploadHelper::handleRemove($thumbnail);
            $thumbnail = UploadHelper::handleUpload($request->file('thumbnail'), $this->repository->getDiskName());
        }

        $this->repository->update($id, [
            'title'         => $data['title'],
            'description'   => $data['description'],
            'thumbnail'     => $thumbnail ?? null,
            'content'       => $data['content'],
            'location'      => $data['location'],
            'date'          => $data['date'],
            'categories_id' => $data['categories_id']
        ]);
    }

    /**
     * delete activity data from ActivityRepository.
     * 
     * @param string $id
     * 
     * @return void
     */

    public function destroyActivity(string $id): void
    {
        $show = $this->repository->show($id);

        if ($show && !is_null($show->thumbnail)) UploadHelper::handleRemove($show->thumbnail);

        $this->repository->destroy($id);
    }
}
