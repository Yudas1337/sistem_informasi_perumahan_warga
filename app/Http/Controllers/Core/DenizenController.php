<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Http\Requests\Denizen\StoreRequest;
use App\Http\Requests\Denizen\UpdateRequest;
use App\Services\DenizenService;
use App\Services\ResidenceService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DenizenController extends Controller
{
    private $service, $residenceService;

    function __construct(DenizenService $denizenService, ResidenceService $residenceService)
    {
        $this->service          = $denizenService;
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
            'denizens'   => $this->residenceService->getAllDenizens(),
            'residences' => $this->residenceService->getResidences()
        ];
        return view('dashboard.pages.denizens.index', $data);
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
        $this->service->storeDenizen($request);

        return redirect()->route('manage-denizens.index')->with('success', 'Berhasil menambahkan warga');
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
            'denizen'    => $this->service->getDenizensById($id),
            'residences' => $this->residenceService->getResidences(),
            'id'         => $id
        ];
        return view('dashboard.pages.denizens.edit', $data);
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
        $this->service->updateDenizen($request, $id);

        return redirect()->route('manage-denizens.index')->with('success', 'Berhasil update warga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * 
     * @return RedirectResponse
     */

    public function destroy(string $id): RedirectResponse
    {
        $this->service->destroyDenizen($id);

        return redirect()->route('manage-denizens.index')->with('success', 'Berhasil menambahkan warga');
    }
}
