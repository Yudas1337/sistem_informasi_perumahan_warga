@extends('dashboard.layouts.main')
@section('content')
    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
        <!-- User Pills -->
        <ul class="nav nav-pills mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-user font-medium-3 me-50">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="fw-bold">Account</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('user.changePassword') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-lock font-medium-3 me-50">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
                        </rect>
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
        </div>
    </div>
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Ubah Password</h4>
        </div>
        <div class="card-body pt-1">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="mt-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- form -->
            <form class="validate-form" method="POST" action="{{ route('user.updatePassword') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="account-old-password">Password lama</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="password" class="form-control" id="account-old-password" name="old_password"
                                placeholder="Enter current password" data-msg="Please current password">
                            <div class="input-group-text cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="account-new-password">Password Baru</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="password" id="account-new-password" name="password" class="form-control"
                                placeholder="Enter new password">
                            <div class="input-group-text cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-1">
                        <label class="form-label" for="account-retype-new-password">Ulangi Password</label>
                        <div class="input-group form-password-toggle input-group-merge">
                            <input type="password" class="form-control" id="account-retype-new-password"
                                name="password_confirmation" placeholder="Confirm your new password">
                            <div class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <p class="fw-bolder">Persyaratan Password:</p>
                        <ul class="ps-1 ms-25">
                            <li class="mb-50">Panjang password minimal 6 karakter</li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <button type="submit"
                            class="btn btn-primary me-1 mt-1 waves-effect waves-float waves-light">Update
                            Password</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1 waves-effect">Kosongkan Form</button>
                    </div>
                </div>
            </form>
            <!--/ form -->
        </div>
    </div>
@endsection
