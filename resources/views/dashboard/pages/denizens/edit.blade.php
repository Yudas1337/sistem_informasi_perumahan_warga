@extends('dashboard.layouts.main')
@section('content')
    <section class="app-denizen-view-account">
        <div class="row">
            <!-- denizen Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- denizen Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="denizen-avatar-section">
                            <div class="d-flex align-items-center flex-column">
                                <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('storage/' . $denizen->photo) }}"
                                    height="110" width="110" alt="{{ $denizen->name }}">

                                <div class="denizen-info text-center">
                                    <h4>{{ $denizen->name }}</h4>
                                    <span class="badge bg-light-secondary">{{ $denizen->families }}</span>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                        <div class="info-container">
                            <ul class="list-unstyled">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">ID:</span>
                                    <span>{{ $denizen->nik }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Nomor Telepon:</span>
                                    <span>{{ $denizen->phone_number }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Tempat Lahir:</span>
                                    <span>{{ $denizen->birth_place }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Tanggal Lahir:</span>
                                    <span>{{ $denizen->birth_date }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Jenis Kelamin:</span>
                                    <span>{{ $denizen->gender }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Agama:</span>
                                    <span>{{ $denizen->religion }}</span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Alamat rumah:</span>
                                    <span>{{ $denizen->residence->address }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /denizen Card -->
            </div>
            <!--/ denizen Sidebar -->

            <!-- denizen Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">


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
                            <form class="row gy-1 gx-2" method="POST"
                                action="{{ route('manage-denizens.update', $id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="mt-1">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalAddressTown">Alamat Rumah<small
                                            class="text-danger">*</small></label>
                                    <select id="residences_id" name="residences_id" class="select2 form-select">
                                        <option value="">--Alamat Rumah--</option>
                                        @foreach ($residences as $residence)
                                            <option value="{{ $residence->id }}"
                                                {{ $denizen->residences_id == $residence->id ? 'selected' : '' }}>
                                                {{ $residence->address }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="nik">NIK <small
                                            class="text-danger">*</small></label>
                                    <input readonly type="text" id="nik" name="nik" class="form-control"
                                        placeholder="3504170" autocomplete="off" value="{{ $denizen->nik }}" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="name">Nama Lengkap <small
                                            class="text-danger">*</small></label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Yudas Malabi" autocomplete="off" value="{{ $denizen->name }}" />
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="phone_number">Nomor telepon</label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control"
                                        placeholder="082257181294" autocomplete="off"
                                        value="{{ $denizen->phone_number }}" />
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="modalAddressTown">Jenis Kelamin <small
                                            class="text-danger">*</small></label>
                                    <select id="gender" name="gender" class="form-select">
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="male" {{ $denizen->gender == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ $denizen->gender == 'female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="modalAddressTown">Tempat lahir <small
                                            class="text-danger">*</small></label>
                                    <input type="text" id="birth_place" name="birth_place" class="form-control"
                                        placeholder="Balikpapan" autocomplete="off"
                                        value="{{ $denizen->birth_place }}" />
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="modalAddressTown">Tanggal lahir <small
                                            class="text-danger">*</small></label>
                                    <input type="date" id="birth_date" name="birth_date" class="form-control"
                                        autocomplete="off" value="{{ $denizen->birth_date }}" />
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="modalAddressTown">Agama<small
                                            class="text-danger">*</small></label>
                                    <select id="religion" name="religion" class="form-select">
                                        <option value="">--Pilih Agama--</option>
                                        <option value="islam" {{ $denizen->religion == 'islam' ? 'selected' : '' }}>
                                            Islam
                                        </option>
                                        <option value="kristen" {{ $denizen->religion == 'kristen' ? 'selected' : '' }}>
                                            Kristen
                                        </option>
                                        <option value="katolik" {{ $denizen->religion == 'katolik' ? 'selected' : '' }}>
                                            Katolik
                                        </option>
                                        <option value="hindu" {{ $denizen->religion == 'hindu' ? 'selected' : '' }}>
                                            Hindu
                                        </option>
                                        <option value="budha" {{ $denizen->religion == 'budha' ? 'selected' : '' }}>
                                            Budha
                                        </option>
                                        <option value="konghucu"
                                            {{ $denizen->religion == 'konghucu' ? 'selected' : '' }}>
                                            Konghucu
                                        </option>

                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="modalAddressTown">Status<small
                                            class="text-danger">*</small></label>
                                    <select id="families" name="families" class="form-select">
                                        <option value="">--Pilih Status--</option>
                                        <option value="husband" {{ $denizen->families == 'husband' ? 'selected' : '' }}>
                                            Kepala keluarga
                                        </option>
                                        <option value="housewife"
                                            {{ $denizen->families == 'housewife' ? 'selected' : '' }}>Ibu
                                            Rumah Tangga
                                        </option>
                                        <option value="child" {{ $denizen->families == 'child' ? 'selected' : '' }}>
                                            Anak
                                        </option>
                                        <option value="single" {{ $denizen->families == 'single' ? 'selected' : '' }}>
                                            Single
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalAddressTown">Foto warga</label>
                                    <input type="file" name="photo" accept="image/*" class="form-control">
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-gradient-primary me-1 mt-2">Update Data
                                        Warga</button>
                                    <button type="reset" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        Batalkan
                                    </button>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('manage-denizens.destroy', $id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="col-12 text-center">
                                    <button onclick="return confirm('Apa anda yakin ingin menghapus data ini?')"
                                        type="submit" class="btn btn-gradient-danger mt-2" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        Hapus Data Warga
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ denizen Content -->
        </div>
    </section>
@endsection
