<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dues\StoreRequest;
use App\Services\DueService;
use App\Services\ResidenceService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use PDF;

class DueController extends Controller
{
    private $service, $residenceService;

    function __construct(DueService $dueService, ResidenceService $residenceService)
    {
        $this->service          = $dueService;
        $this->residenceService = $residenceService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $data = [
            'dues'          => $this->service->getAllDues(),
            'residences'    => $this->residenceService->getResidenceWithDenizens(),
            'sum_all'       => $this->service->sumAllDue(),
            'sum_month'     => $this->service->sumDuePerMonth()
        ];

        return view('dashboard.pages.dues.index', $data);
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
        $this->service->storeDue($request);

        return redirect()->route('manage-dues.index')->with('success', 'Berhasil menambahkan iuran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return RedirectResponse
     */

    public function destroy(string $id): RedirectResponse
    {
        $this->service->destroyDue($id);

        return redirect()->route('manage-dues.index')->with('success', 'Berhasil menghapus iuran');
    }

    /**
     * Print Pdf.
     *
     */

    public function printPdf()
    {
        $data = [
            'dues'          => $this->service->getAllDues(),
            'sum_all'       => $this->service->sumAllDue(),
        ];
        return view('dashboard.pages.dues.create-pdf', $data);
    }
}
