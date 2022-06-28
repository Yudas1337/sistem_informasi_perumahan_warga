<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\FinanceService;
use Illuminate\Contracts\View\View;

class FinanceController extends Controller
{
    private $service;

    function __construct(FinanceService $financeService)
    {
        $this->service = $financeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(): View
    {
        $finances = $this->service->getFinances();
        return view('home.finance', compact('finances'));
    }
}
