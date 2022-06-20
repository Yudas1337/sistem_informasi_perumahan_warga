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
                            <h3 class="fw-bolder mb-75">{{ count($users) }}</h3>
                            <span>Total Administrator</span>
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
                            <h6 class="mb-0">List Administrator</h6>
                        </div>
                        <div class="dt-action-buttons text-end">
                            <div class="dt-buttons d-inline-flex">
                                <a href="{{ route('manage-admins.create') }}" class="dt-button create-new btn btn-primary"
                                    tabindex="0" aria-controls="DataTables_Table_0"><span><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus me-50 font-small-4">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>Tambah Admin</span></a>
                            </div>
                        </div>
                    </div>
                    <table id="DataTables_Table_0" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-left align-items-center">
                                            <div class="avatar bg-light-warning  me-1">
                                                @if (!$user->photo)
                                                    @if ($user->gender == 'male')
                                                        <span class="avatar"><img class="round"
                                                                src="{{ asset('storage/user_images/default_male.png') }}"
                                                                alt="avatar" height="40" width="40"></span>
                                                    @else
                                                        <span class="avatar"><img class="round"
                                                                src="{{ asset('storage/user_images/default_female.png') }}"
                                                                alt="avatar" height="40" width="40"></span>
                                                    @endif
                                                @else
                                                    <span class="avatar"><img class="round"
                                                            src="{{ asset('storage/' . $user->photo) }}" alt="avatar"
                                                            height="40" width="40"><span
                                                            class="avatar-status-online"></span></span>
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column"><span
                                                    class="emp_name text-truncate fw-bold">{{ $user->name }}</span></div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <span class="badge rounded-pill  badge-light-success">Aktif</span>
                                        @else
                                            <span class="badge rounded-pill  badge-light-danger">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-inline-flex"><a class="pe-1 dropdown-toggle hide-arrow text-primary"
                                                data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-more-vertical font-small-4">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <form method="POST"
                                                    action="{{ route('manage-admins.destroy', $user->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button style="width: 100%"
                                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                        class="dropdown-item">Hapus</button>
                                                </form>
                                                <form method="POST" action="{{ route('modify.admin', $user->id) }}">
                                                    @csrf
                                                    <button style="width: 100%"
                                                        onclick="return confirm('Anda yakin akan melakukan aksi ini?')"
                                                        class="dropdown-item delete-record">
                                                        {{ $user->status == 0 ? 'Aktifkan akun' : 'Nonaktifkan akun' }}
                                                    </button>
                                                </form>

                                            </div>
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
        <!-- Modal to add new record -->
        <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
                <form class="add-new-record modal-content pt-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                            <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                                placeholder="John Doe" aria-label="John Doe">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-post">Post</label>
                            <input type="text" id="basic-icon-default-post" class="form-control dt-post"
                                placeholder="Web Developer" aria-label="Web Developer">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                placeholder="john.doe@example.com" aria-label="john.doe@example.com">
                            <small class="form-text"> You can use letters, numbers &amp; periods </small>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="basic-icon-default-date">Joining Date</label>
                            <input type="text" class="form-control dt-date flatpickr-input"
                                id="basic-icon-default-date" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY"
                                readonly="readonly">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="basic-icon-default-salary">Salary</label>
                            <input type="text" id="basic-icon-default-salary" class="form-control dt-salary"
                                placeholder="$12000" aria-label="$12000">
                        </div>
                        <button type="button"
                            class="btn btn-primary data-submit me-1 waves-effect waves-float waves-light">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--/ Basic table -->
@endsection
