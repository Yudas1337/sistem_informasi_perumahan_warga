@extends('dashboard.layouts.main')
@section('content')
    <!-- Basic table -->
    <section id="basic-datatable">

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                @if (Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Sukses!</h4>
                        <div class="alert-body">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ $count_denizen }}</h3>
                            <span>Total Warga</span>
                        </div>
                        <div class="avatar bg-light-primary p-50">
                            <span class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user font-medium-4">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-2">
                    <div class="card-header border-bottom p-1">
                        <div class="head-label">
                            <h6 class="mb-0">List Warga</h6>
                        </div>
                        <div class="dt-action-buttons text-end">
                            <div class="dt-buttons d-inline-flex">
                                <a data-bs-toggle="modal" data-bs-target="#addNewAddressModal" href="#"
                                    class="dt-button create-new btn btn-primary" tabindex="0"
                                    aria-controls="DataTables_Table_0"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>Tambah Warga Baru</span></a>
                            </div>
                        </div>
                    </div>
                    <table id="DataTables_Table_0" class="table table-striped" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>Alamat Rumah</th>
                                <th>Nama Pemilik rumah</th>
                                <th>Keluarga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($denizens as $denizen)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $denizen->images) }}" class="me-75"
                                            height="80" width="80" alt="Angular">
                                        <span class="fw-bold">{{ $denizen->address }}</span>
                                    </td>
                                    <td>{{ $denizen->owner_name }}</td>
                                    <td>
                                        <div class="avatar-group">
                                            @foreach ($denizen->denizens as $user)
                                                <a href="{{ route('manage-denizens.edit', $user->nik) }}">
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" class="avatar pull-up my-0" title=""
                                                        data-bs-original-title="{{ $user->name }}">
                                                        <img src="{{ asset('storage/' . $user->photo) }}"
                                                            alt="{{ $user->name }}" height="26" width="26">
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

    </section>
    @include('dashboard.pages.denizens.create-modal')
    <!--/ Basic table -->
@endsection
