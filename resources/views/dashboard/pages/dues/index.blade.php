@extends('dashboard.layouts.main')
@section('content')
    <!-- Basic table -->
    <section id="basic-datatable">

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                @if (Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Sukses!</h4>
                        <div class="alert-body">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ $sum_month }}</h3>
                            <span>Total Iuran bulan ini</span>
                        </div>
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ $sum_all }}</h3>
                            <span>Total Iuran keseluruhan</span>
                        </div>
                        <div class="avatar bg-light-success p-50 m-0">
                            <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-dollar-sign avatar-icon">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-2">
                    <div class="card-header border-bottom p-1">
                        <div class="head-label">
                            <h6 class="mb-0">List Iuran</h6>
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
                                        </svg>Tambah Iuran baru</span></a>

                            </div>
                            <a href="{{ route('print.dues') }}" class="btn btn-outline-danger waves-effect"><span>Cetak
                                    Laporan Iuran</span></a>
                        </div>
                    </div>
                    <table id="DataTables_Table_0" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Deskripsi</th>
                                <th>Tanggal tagihan</th>
                                <th>Total bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>Nama Warga</th>
                                <th>Alamat Rumah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dues as $due)
                                <tr>
                                    <td>{{ $due->id }}</td>
                                    <td>{{ $due->description }}</td>
                                    <td>{{ $due->date }}</td>
                                    <td>{{ 'Rp ' . number_format($due->total, 2, ',', '.') }}</td>
                                    <td>{{ $due->created_at }}</td>
                                    <td>{{ $due->residence->denizens->first()->name }}</td>
                                    <td>{{ $due->residence->address }} </td>
                                    <td>
                                        <form method="POST" action="{{ route('manage-dues.destroy', $due->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Apa anda yakin ingin menghapus data?')"
                                                type="submit" class="btn btn-gradient-danger">Hapus</button>
                                        </form>
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
    @include('dashboard.pages.dues.create-modal')
    <!--/ Basic table -->
@endsection
