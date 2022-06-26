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
                            <h3 class="fw-bolder mb-75">{{ count($activities) }}</h3>
                            <span>Total Kegiatan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-2">
                    <div class="card-header border-bottom p-1">
                        <div class="head-label">
                            <h6 class="mb-0">List Kegiatan</h6>
                        </div>
                        <div class="dt-action-buttons text-end">
                            <div class="dt-buttons d-inline-flex">
                                <a href="{{ route('manage-activities.create') }}"
                                    class="dt-button create-new btn btn-primary" tabindex="0"
                                    aria-controls="DataTables_Table_0"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-plus me-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>Tambah Kegiatan baru</span></a>
                            </div>
                        </div>
                    </div>
                    <table id="DataTables_Table_0" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Foto Kegiatan</th>
                                <th>Lokasi</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Kategori Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td>{{ $activity->title }}</td>
                                    <td>
                                        @if (!$activity->thumbnail)
                                            <img style="height: 100px; width: 100%" class="img-fluid"
                                                src="{{ asset('storage/activity_images/no-image.png') }}">
                                        @else
                                            <img style="height: 100px; width: 100%" class="img-fluid"
                                                src="{{ asset('storage/' . $activity->thumbnail) }}">
                                        @endif
                                    </td>
                                    <td>{{ $activity->location }}</td>
                                    <td>{{ $activity->date }}</td>
                                    <td>{{ $activity->category->category }}</td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('manage-activities.destroy', $activity->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('manage-activities.edit', $activity->id) }}"
                                                class="btn btn-gradient-warning">Edit</a>
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
    <!--/ Basic table -->
@endsection
