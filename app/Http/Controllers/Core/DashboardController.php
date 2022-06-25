<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Services\ResidenceService;
use App\Services\UserService;
use App\Traits\UserTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    use UserTrait;

    private $userService, $residenceService;
    private $data = [];

    function __construct(UserService $userService, ResidenceService $residenceService)
    {
        $this->userService      = $userService;
        $this->residenceService = $residenceService;
    }

    /**
     * Get authenticated user.
     *
     * @return object
     */

    public function getUser()
    {
        return $this->userService->fetchUserSession();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index(): View
    {
        if ($this->IsVillageHead())
            $this->data = [
                'total_admin'           => $this->userService->fetchAdministrator(),
                'total_village_head'    => $this->userService->fetchVillageHead(),
                'total_residences'      => $this->residenceService->countResidences(),
                'total_house_types'     => $this->residenceService->countHouseType()
            ];



        return view('dashboard.pages.home', $this->data);
    }

    /**
     * Show the profile page.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function profile(): View
    {
        return view('dashboard.pages.profile', ['user' => $this->getUser()]);
    }

    /**
     * Update the current user profile session
     *
     * @param ProfileRequest $request
     * 
     * @return  \Illuminate\Http\RedirectResponse
     */

    public function changeProfile(ProfileRequest $request): RedirectResponse
    {
        $this->userService->updateProfile($request);

        return redirect()->back()->with('success', 'Berhasil update profile');
    }

    /**
     * Show the change password page.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function changePassword(): View
    {
        return view('dashboard.pages.change-password', ['user' => $this->getUser()]);
    }

    /**
     * Update the current user password session
     *
     * @param ChangePasswordRequest $request
     * 
     * @return  \Illuminate\Http\RedirectResponse
     */

    public function updatePassword(ChangePasswordRequest $request): RedirectResponse
    {
        $this->userService->updatePassword($request);

        return redirect()->back()->with('success', 'Berhasil ubah password');
    }
}
