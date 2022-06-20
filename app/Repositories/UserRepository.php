<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\UserTrait;

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
     * Store data into User Model
     *
     * @param array $data
     * 
     */

    public function store(array $data): mixed
    {
        return $this->model->create($data);
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
     */

    public function update(string $id, array $data): mixed
    {
        return $this->show($id)->update($data);
    }

    /**
     * delete user profile
     * 
     * @param string $id
     *
     * @return mixed
     */

    public function destroy(string $id): mixed
    {
        return $this->show($id)->delete();
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
