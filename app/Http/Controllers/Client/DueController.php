<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchDueRequest;
use App\Services\DenizenService;
use Illuminate\Contracts\View\View;

class DueController extends Controller
{
    private $service;

    function __construct(DenizenService $denizenService)
    {
        $this->service = $denizenService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($data = null, $status = 'null'): View
    {
        return view('home.dues', compact('data', 'status'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param SearchDueRequest $request
     * 
     * @return object|null
     */

    public function search(SearchDueRequest $request): object|null
    {
        $search = $request->validated()['search'];

        $data = $this->service->searchDue($search);

        return (count($data) > 0) ?  $this->index($data, 1) : $this->index($data, 0);
    }

    /**
     * Print Pdf.
     *
     */

    public function printPdf(string $nik)
    {
        $dues = $this->service->searchDue($nik);

        return view('home.create-pdf', compact('dues'));
    }
}
