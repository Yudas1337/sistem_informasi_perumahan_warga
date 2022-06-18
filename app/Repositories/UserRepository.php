<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\UserTrait;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    use UserTrait;

    private $model;

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
     * Get user data by provided id.
     *
     * @param string $id
     * 
     * @return object
     */

    public function show(string $id): object
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Update user profile
     * 
     * @param string $id
     * @param array $data
     *
     * @return Illuminate\Database\Eloquent\Model
     */

    public function update(string $id, array $data)
    {
        return $this->show($id)->update($data);
    }
}
