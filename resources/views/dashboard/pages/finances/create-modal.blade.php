<!-- add new address modal -->
<div class="modal fade" id="addNewAddressModal" tabindex="-1" aria-labelledby="addNewAddressTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-5 px-sm-4 mx-50">
                <h1 class="address-title text-center mb-1" id="addNewAddressTitle">Tambah Keuangan</h1>

                <form class="row gy-1 gx-2" method="POST" action="{{ route('manage-finances.store') }}"
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
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="description">Deskripsi<small
                                class="text-danger">*</small></label>
                        <input type="text" id="description" name="description" class="form-control"
                            placeholder="Iuran Bulanan" autocomplete="off" value="{{ old('description') }}" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="name">Tanggal iuran<small
                                class="text-danger">*</small></label>
                        <input type="date" id="date" name="date" class="form-control" autocomplete="off"
                            value="{{ old('date') }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="phone_number">Total iuran</label>
                        <input type="number" id="total" name="total" class="form-control" placeholder="30000"
                            autocomplete="off" value="{{ old('total') }}" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="modalAddressTown">Status Keuangan<small
                                class="text-danger">*</small></label>
                        <select id="status" name="status" class="form-select">
                            <option value="">--Pilih Status--</option>
                            <option value="in">Uang masuk</option>
                            <option value="out">Uang keluar</option>
                        </select>
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
