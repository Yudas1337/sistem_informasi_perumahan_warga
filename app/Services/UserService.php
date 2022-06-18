<?php

namespace App\Services;

use App\Helpers\UploadHelper;
use App\Http\Requests\ChangePasswordRequest;
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
     * Update user profile by current session.
     *
     * @param ProfileRequest $request
     * 
     * @return void
     */

    public function updateProfile(ProfileRequest $request): void
    {
        $validated  = $request->validated();
        $user       = $this->repository->getUser();
        $old_photo  = $user->photo;

        if ($request->file('photo')) {
            if (!is_null($old_photo)) UploadHelper::handleRemove($old_photo);

            $old_photo = UploadHelper::handleUpload($request->file('photo'), $this->repository->getDiskName());
        }

        $this->repository->update($user->id, [
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
        $user       = $this->repository->getUser();

        $this->repository->update($user->id, $request->validated());
    }
}
