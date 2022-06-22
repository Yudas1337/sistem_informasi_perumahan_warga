<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\UserTrait;

class UserRepository extends BaseRepository
{
    use UserTrait;

    function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Fetch user by current session from User Model.
     *
     * @return object
     */

    public function getUser(): object
    {
        return $this->model->findOrFail($this->getUserId());
    }

    /**
     * Get Administrator
     * 
     *
     * @return object
     */

    public function getAdministrator(): object
    {
        return $this->model->where('role', 'administrator')->get();
    }

    /**
     * Get user file Diskname
     * 
     *
     * @return string
     */

    public function getDiskName(): string
    {
        return ('user_images');
    }
}
