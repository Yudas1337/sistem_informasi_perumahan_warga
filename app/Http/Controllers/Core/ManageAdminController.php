<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManageAdmin\StoreRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class ManageAdminController extends Controller
{
    private $userService;

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index(): View
    {
        $users = $this->userService->fetchAdministrator();
        return view('dashboard.pages.admins.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return view('dashboard.pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * 
     * @return RedirectResponse
     */

    public function store(StoreRequest $request): RedirectResponse
    {
        $this->userService->storeAdmin($request);

        return redirect()->route('manage-admins.index')->with('success', 'Berhasil menambahkan admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * 
     * @return mixed
     */

    public function destroy(string $id): mixed
    {
        $this->userService->removeAdmin($id);

        return redirect()->route('manage-admins.index')->with('success', 'Berhasil menghapus admin');
    }

    /**
     * Modify Administrator status
     *
     * @param  string  $id
     * 
     * @return RedirectResponse
     */

    public function modifyAdmin(string $id): RedirectResponse
    {

        $action = $this->userService->modifyAdminStatus($id);

        $message = ($action == 1 ? 'Berhasil mengaktifkan administrator' : 'Berhasil menonaktifkan administrator');

        return redirect()->route('manage-admins.index')->with('success', $message);
    }
}
