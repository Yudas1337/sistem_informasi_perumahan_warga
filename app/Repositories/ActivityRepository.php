<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Models\ActivityCategory;

class ActivityRepository extends BaseRepository
{
    private $category;

    function __construct(Activity $activity, ActivityCategory $category)
    {
        $this->model    = $activity;
        $this->category = $category;
    }

    /**
     * Get all categories from ActivityCategory model.
     * 
     * @return object
     */

    public function getCategories(): object
    {
        return $this->category->all();
    }


    /**
     * Get Activity by specified slug from Activity model.
     * 
     * @param string $slug
     * 
     * @return object
     */

    public function getBySlug(string $slug): object
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }

    /**
     * Get activity file Diskname
     * 
     *
     * @return string
     */

    public function getDiskName(): string
    {
        return ('activity_images');
    }
}
