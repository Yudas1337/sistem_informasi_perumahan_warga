@extends('dashboard.layouts.main')
@section('content')
    <section class="app-user-view-account">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                @if (!$user->photo)
                                    @if ($user->gender == 'male')
                                        <img class="img-fluid rounded mt-3 mb-2"
                                            src="{{ asset('storage/user_images/default_male.png') }}" height="110"
                                            width="110" alt="{{ $user->name }}">
                                    @else
                                        <img class="img-fluid rounded mt-3 mb-2"
                                            src="{{ asset('storage/user_images/default_female.png') }}" height="110"
                                            width="110" alt="{{ $user->name }}">
                                    @endif
                                @else
                                    <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('storage/' . $user->photo) }}"
                                        height="110" width="110" alt="{{ $user->name }}">
                                @endif

                                <div class="user-info text-center">
                                    <h4>{{ $user->name }}</h4>
                                    <span class="badge bg-light-secondary">{{ $user->role }}</span>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">ID:</span>
                                    <span>{{ $user->id }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Email Aktif:</span>
                                    <span>{{ $user->email }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Status Akun:</span>
                                    @if ($user->status == 1)
                                        <span class="badge bg-light-success">Aktif</span>
                                    @else
                                        <span class="badge bg-light-danger">Nonaktif</span>
                                    @endif

                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Hak Akses:</span>
                                    <span> {{ $user->role == 'village_head' ? 'Kepala Desa' : 'Administrator' }}
                                    </span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Nomor Telepon:</span>
                                    <span>{{ $user->phone_number }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Jenis Kelamin:</span>
                                    <span>{{ $user->gender }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- User Pills -->
                <ul class="nav nav-pills mb-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user.profile') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-user font-medium-3 me-50">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="fw-bold">Account</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.changePassword') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-lock font-medium-3 me-50">
                                <rect x="3" y="11" width="18" height="11" rx="2"
                                    ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <span class="fw-bold">Change Password</span>
                        </a>
                    </li>
                </ul>
                <!--/ User Pills -->

                <div class="col-md-12 col-12">
                    @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Sukses!</h4>
                            <div class="alert-body">
                                {{ Session::get('success') }}
                            </div>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.changeProfile') }}" class="form form-vertical"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="mt-1">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-icon">Nama Lengkap</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-user">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg></span>
                                                <input autocomplete="off" type="text" id="first-name-icon"
                                                    class="form-control" name="name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="email-id-icon">Email</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-mail">
                                                        <path
                                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                        </path>
                                                        <polyline points="22,6 12,13 2,6"></polyline>
                                                    </svg></span>
                                                <input autocomplete="off" type="email" id="email-id-icon"
                                                    class="form-control" name="email" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="contact-info-icon">Nomor Telepon</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-smartphone">
                                                        <rect x="5" y="2" width="14"
                                                            height="20" rx="2" ry="2"></rect>
                                                        <line x1="12" y1="18" x2="12.01"
                                                            y2="18"></line>
                                                    </svg></span>
                                                <input autocomplete="off" type="text" id="contact-info-icon"
                                                    class="form-control" name="phone_number"
                                                    value="{{ $user->phone_number }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="contact-info-icon">Foto</label>
                                            <div class="input-group input-group-merge">
                                                <input type="file" class="form-control" name="photo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="contact-info-icon">Jenis Kelamin</label>
                                            <div class="demo-inline-spacing">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio1" {{ $user->gender == 'male' ? 'checked' : '' }}
                                                        value="male">
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio2"
                                                        {{ $user->gender == 'female' ? 'checked' : '' }} value="female">
                                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit"
                                        class="btn btn-primary me-1 waves-effect waves-float waves-light">Update
                                        Profile</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ User Content -->
        </div>
    </section>
@endsection
