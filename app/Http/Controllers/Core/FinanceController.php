<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Finances\StoreRequest;
use App\Services\DueService;
use App\Services\FinanceService;
use App\Traits\CurrencyTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FinanceController extends Controller
{
    use CurrencyTrait;

    private $service, $dueService;
    private $income, $outcome;

    function __construct(FinanceService $financeService, DueService $dueService)
    {
        $this->service      = $financeService;
        $this->dueService   = $dueService;
        $this->income       = $this->dueService->sumTotal() + $this->service->sumIncomeFinances();
        $this->outcome      = $this->service->sumOutcomeFinances();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $data = [
            'finances'  => $this->service->getFinances(),
            'debit'     => $this->convertRupiah($this->income),
            'credit'    => $this->convertRupiah($this->outcome),
            'balance'   => $this->convertRupiah($this->income - $this->outcome)
        ];

        return view('dashboard.pages.finances.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $this->service->storeFinance($request);

        return redirect()->route('manage-finances.index')->with('success', 'Berhasil menambahkan laporan uang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(string $id): RedirectResponse
    {
        $this->service->destroyFinance($id);

        return redirect()->route('manage-finances.index')->with('success', 'Berhasil menghapus laporan uang');
    }

    /**
     * Print Pdf.
     *
     */

    public function printPdf()
    {
        $data = [
            'finances'  => $this->service->getFinances(),
            'debit'     => $this->convertRupiah($this->income),
            'credit'    => $this->convertRupiah($this->outcome),
            'balance'   => $this->convertRupiah($this->income - $this->outcome)
        ];

        return view('dashboard.pages.finances.create-pdf', $data);
    }
}
