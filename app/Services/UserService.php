<?php

namespace App\Services;

use App\Helpers\UploadHelper;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ManageAdmin\StoreRequest;
use App\Http\Requests\ProfileRequest;
use App\Repositories\UserRepository;

class UserService
{
    private $repository;

    function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * Fetch user by current session.
     *
     * @return object
     */

    public function fetchUserSession(): object
    {
        return $this->repository->getUser();
    }

    /**
     * Fetch user by given id.
     *
     * @param string $id
     * 
     * @return object
     */

    public function fetchUserById(string $id): object
    {
        return $this->repository->show($id);
    }

    /**
     * Handle take specified limit data from UserRepository.
     *
     * @return mixed
     */

    public function displayLimitAdministrator(): mixed
    {
        return $this->repository->limitResults('role', 'administrator', 5);
    }

    /**
     * Update user profile by current session.
     *
     * @param ProfileRequest $request
     * 
     * @return void
     * 
     */

    public function updateProfile(ProfileRequest $request): void
    {
        $validated  = $request->validated();
        $old_photo  = $this->fetchUserSession()->photo;

        if ($request->hasFile('photo')) {
            if (!is_null($old_photo)) UploadHelper::handleRemove($old_photo);

            $old_photo = UploadHelper::handleUpload($request->file('photo'), $this->repository->getDiskName());
        }

        $this->repository->update($this->fetchUserSession()->id, [
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'phone_number'  => $validated['phone_number'],
            'photo'         => $old_photo,
            'gender'        => $validated['gender']
        ]);
    }

    /**
     * Update user password by current session.
     *
     * @param ChangePasswordRequest $request
     * 
     * @return void
     */

    public function updatePassword(ChangePasswordRequest $request): void
    {
        $this->repository->update($this->fetchUserSession()->id, [
            'password' => bcrypt($request->validated()['password'])
        ]);
    }

    /**
     * Fetch administrator from userRepository
     *
     * 
     * @return object
     */

    public function fetchAdministrator(): object
    {
        return $this->repository->getAdministrator();
    }

    /**
     * Fetch village_head from userRepository
     *
     * 
     * @return object
     */

    public function fetchVillageHead(): object
    {
        return $this->repository->getVillageHead();
    }

    /**
     * add new administrator user
     *
     * @param StoreAdminRequest $request
     * 
     * @return void
     */

    public function storeAdmin(StoreRequest $request): void
    {
        $validated = $request->validated();

        $this->repository->store([
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'phone_number'  => $validated['phone_number'],
            'role'          => 'administrator',
            'gender'        => $validated['gender'],
            'password'      => bcrypt($validated['password'])
        ]);
    }

    /**
     * delete administrator user by given id
     *
     * @param string $id
     * 
     * @return void
     */

    public function removeAdmin(string $id): void
    {
        $show = $this->fetchUserById($id);
        if (!is_null($show->poto)) UploadHelper::handleRemove($show->photo);

        $this->repository->destroy($id);
    }

    /**
     * Modify administrator status by given id
     *
     * @param string $id
     * 
     * @return int
     */

    public function modifyAdminStatus(string $id): int
    {
        $show = $this->fetchUserById($id);
        $new_status = ($show->status == 1 ? 0 : 1);

        $this->repository->update($id, ['status' => $new_status]);

        return $new_status;
    }
}
