<!-- add new address modal -->
<div class="modal fade" id="addNewAddressModal" tabindex="-1" aria-labelledby="addNewAddressTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewAddressTitle">Tambah Rumah</h1>

                <form class="row gy-1 gx-2" method="POST" action="{{ route('manage-residences.store') }}"
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

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="neighbourhood">RT</label>
                        <input type="text" id="neighbourhood" name="neighbourhood" class="form-control"
                            placeholder="04" autocomplete="off" value="{{ old('neighbourhood') }}" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="hamlet">RW</label>
                        <input type="text" id="hamlet" name="hamlet" class="form-control" placeholder="02"
                            autocomplete="off" value="{{ old('hamlet') }}" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="hamlet">Nama Pemilik</label>
                        <input type="text" id="owner_name" name="owner_name" class="form-control"
                            placeholder="Yudas Malabi" autocomplete="off" value="{{ old('owner_name') }}" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="address">Alamat Lengkap</label>
                        <textarea name="address" id="address" cols="15" rows="2" class="form-control">{{ old('address') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="modalAddressTown">Tipe Rumah</label>
                        <select id="modalAddressCountry" name="house_types_id" class="select2 form-select">
                            <option value="">--Pilih Tipe Rumah--</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ old('house_types_id') == $type->id ? 'selected' : '' }}>Tipe Rumah
                                    {{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="modalAddressTown">Foto Rumah</label>
                        <input type="file" name="images" class="form-control">
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
