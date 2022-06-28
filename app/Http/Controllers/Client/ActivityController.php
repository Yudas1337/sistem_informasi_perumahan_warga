<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\ActivityService;
use Illuminate\Contracts\View\View;

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
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $activities = $this->service->fetchActivities();
        return view('home.activity', compact('activities'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detail(string $slug): View
    {
        $data = $this->service->fetchBySlug($slug);
        return view('home.detail-activity', compact('data'));
    }
}
