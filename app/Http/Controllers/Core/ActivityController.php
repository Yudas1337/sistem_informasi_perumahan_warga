<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\StoreRequest;
use App\Http\Requests\Activity\UpdateRequest;
use App\Services\ActivityService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ActivityController extends Controller
{
    private $service;

    function __construct(ActivityService $activityService)
    {
        $this->service = $activityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $activities = $this->service->fetchActivities();
        return view('dashboard.pages.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        $categories = $this->service->fetchCategories();
        return view('dashboard.pages.activities.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StoreRequest $request): RedirectResponse
    {
        $this->service->storeActivity($request);

        return redirect()->route('manage-activities.index')->with('success', 'Berhasil menambahkan kegiatan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Contracts\View\View
     */

    public function edit(string $id): View
    {
        $data = [
            'activity'      => $this->service->showActivity($id),
            'categories'    => $this->service->fetchCategories(),
            'id'            => $id
        ];

        return view('dashboard.pages.activities.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  string  $id
     * 
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $this->service->updateActivity($request, $id);

        return redirect()->route('manage-activities.index')->with('success', 'Berhasil update kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(string $id): RedirectResponse
    {
        $this->service->destroyActivity($id);

        return redirect()->route('manage-activities.index')->with('success', 'Berhasil menghapus kegiatan');
    }
}
