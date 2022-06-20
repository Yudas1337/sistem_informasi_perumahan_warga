@extends('dashboard.layouts.main')
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row">

            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Masukkan data admin</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="mt-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form form-vertical" method="POST" action="{{ route('manage-admins.store') }}">
                            @csrf
                            <div class="row">
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
                                            <input autofocus autocomplete="off" type="text" id="first-name-icon"
                                                class="form-control" name="name" placeholder="John Doe"
                                                value="{{ old('name') }}">
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
                                            <input autocomplete="off" type="text" id="email-id-icon" class="form-control"
                                                name="email" value="{{ old('email') }}" placeholder="johndoe@gmail.com">
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
                                                    <rect x="5" y="2" width="14" height="20"
                                                        rx="2" ry="2"></rect>
                                                    <line x1="12" y1="18" x2="12.01" y2="18">
                                                    </line>
                                                </svg></span>
                                            <input type="text" id="contact-info-icon" class="form-control"
                                                name="phone_number" value="{{ old('phone_number') }}"
                                                placeholder="082257181293">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="contact-info-icon">Jenis Kelamin</label>
                                        <div class="demo-inline-spacing">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio1" {{ old('gender') == 'male' ? 'checked' : '' }}
                                                    value="male">
                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="inlineRadio2" {{ old('gender') == 'female' ? 'checked' : '' }}
                                                    value="female">
                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="password-icon">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-lock">
                                                    <rect x="3" y="11" width="18" height="11"
                                                        rx="2" ry="2"></rect>
                                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                </svg></span>
                                            <input type="password" id="password-icon" class="form-control"
                                                name="password" placeholder="Password">
                                            <div class="input-group-text cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-eye">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="submit"
                                        class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
