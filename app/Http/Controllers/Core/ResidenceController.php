<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Residence\StoreRequest;
use App\Http\Requests\Residence\UpdateRequest;
use App\Services\HouseTypeService;
use App\Services\ResidenceService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;

class ResidenceController extends Controller
{
    private $service, $typeService;

    public $colors = [
        'bg-primary'    => 'bg-primary',
        'bg-secondary'  => 'bg-secondary',
        'bg-success'    => 'bg-success',
        'bg-danger'     => 'bg-danger',
        'bg-warning'    => 'bg-warning',
        'bg-info'       => 'bg-info',
        'bg-dark'       => 'bg-dark'
    ];

    function __construct(ResidenceService $residenceService, HouseTypeService $houseTypeService)
    {
        $this->service      = $residenceService;
        $this->typeService  = $houseTypeService;

        FacadesView::share('colors', $this->colors);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index(): View
    {
        $data = [
            'houses'    => $this->service->getResidences(),
            'types'     => $this->typeService->getAll()
        ];

        return view('dashboard.pages.residences.index', $data);
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
        $this->service->storeResidence($request);

        return redirect()->route('manage-residences.index')->with('success', 'Berhasil menambahkan rumah baru');
    }

    /**
     * show the detail residences
     *
     * @param  string  $id
     * 
     * @return View
     */

    public function edit(string $id): View
    {
        $data = [
            'house'     => $this->service->showResidence($id),
            'types'     => $this->typeService->getAll(),
            'id'        => $id
        ];

        return view('dashboard.pages.residences.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  string  $id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $this->service->updateResidence($request, $id);
        return redirect()->route('manage-residences.index')->with('success', 'Berhasil update rumah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->service->destroyResidence($id);
        return redirect()->route('manage-residences.index')->with('success', 'Berhasil menghapus rumah');
    }
}
