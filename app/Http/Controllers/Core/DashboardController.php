<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    private $userService;

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('dashboard.pages.home');
    }

    /**
     * Show the profile page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function profile()
    {
        return view('dashboard.pages.profile', ['user' => $this->getUser()]);
    }

    /**
     * Update the current user profile session
     *
     * @return  \Illuminate\Http\RedirectResponse
     */

    public function changeProfile(ProfileRequest $request): RedirectResponse
    {
        $this->userService->updateProfile($request);

        return redirect()->back()->with('success', 'Berhasil update Profile');
    }

    /**
     * Show the change password page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function changePassword()
    {
        return view('dashboard.pages.change-password', ['user' => $this->getUser()]);
    }
}
