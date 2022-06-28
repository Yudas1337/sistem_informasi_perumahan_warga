<!-- add new address modal -->
<div class="modal fade" id="addNewAddressModal" tabindex="-1" aria-labelledby="addNewAddressTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewAddressTitle">Tambah Warga</h1>

                <form class="row gy-1 gx-2" method="POST" action="{{ route('manage-denizens.store') }}"
                    enctype="multipart/form-data">
                    @csrf
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
                                    {{ old('residences_id') == $residence->id ? 'selected' : '' }}>
                                    {{ $residence->address }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="nik">NIK <small class="text-danger">*</small></label>
                        <input type="text" id="nik" name="nik" class="form-control" placeholder="3504170"
                            autocomplete="off" value="{{ old('nik') }}" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">Nama Lengkap <small
                                class="text-danger">*</small></label>
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="Yudas Malabi" autocomplete="off" value="{{ old('name') }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="phone_number">Nomor telepon</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control"
                            placeholder="082257181294" autocomplete="off" value="{{ old('phone_number') }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="modalAddressTown">Jenis Kelamin <small
                                class="text-danger">*</small></label>
                        <select id="gender" name="gender" class="form-select">
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="modalAddressTown">Tempat lahir <small
                                class="text-danger">*</small></label>
                        <input type="text" id="birth_place" name="birth_place" class="form-control"
                            placeholder="Balikpapan" autocomplete="off" value="{{ old('birth_place') }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="modalAddressTown">Tanggal lahir <small
                                class="text-danger">*</small></label>
                        <input type="date" id="birth_date" name="birth_date" class="form-control" autocomplete="off"
                            value="{{ old('birth_date') }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="modalAddressTown">Agama<small
                                class="text-danger">*</small></label>
                        <select id="religion" name="religion" class="form-select">
                            <option value="">--Pilih Agama--</option>
                            <option value="islam" {{ old('religion') == 'islam' ? 'selected' : '' }}>Islam</option>
                            <option value="kristen" {{ old('religion') == 'kristen' ? 'selected' : '' }}>Kristen
                            </option>
                            <option value="katolik" {{ old('religion') == 'katolik' ? 'selected' : '' }}>Katolik
                            </option>
                            <option value="hindu" {{ old('religion') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="budha" {{ old('religion') == 'budha' ? 'selected' : '' }}>Budha</option>
                            <option value="konghucu" {{ old('religion') == 'konghucu' ? 'selected' : '' }}>Konghucu
                            </option>

                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="modalAddressTown">Status<small
                                class="text-danger">*</small></label>
                        <select id="families" name="families" class="form-select">
                            <option value="">--Pilih Status--</option>
                            <option value="husband" {{ old('families') == 'husband' ? 'selected' : '' }}>Kepala
                                keluarga
                            </option>
                            <option value="housewife" {{ old('families') == 'housewife' ? 'selected' : '' }}>Ibu
                                Rumah Tangga
                            </option>
                            <option value="child" {{ old('families') == 'child' ? 'selected' : '' }}>Anak</option>
                            <option value="single" {{ old('families') == 'single' ? 'selected' : '' }}>Single
                            </option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="modalAddressTown">Foto warga</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-1 mt-2">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            Batalkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- / add new address modal -->
