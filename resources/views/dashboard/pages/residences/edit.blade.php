@extends('dashboard.layouts.main')
@section('content')
    <section class="app-ecommerce-details">
        <div class="card">
            <!-- Product Details starts -->
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('storage/' . $house->images) }}" class="img-fluid product-img"
                                alt="{{ $house->address }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <form class="row gy-1 gx-2" method="POST" action="{{ route('manage-residences.update', $id) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')
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
                                    placeholder="04" autocomplete="off" value="{{ $house->neighbourhood }}" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="hamlet">RW</label>
                                <input type="text" id="hamlet" name="hamlet" class="form-control" placeholder="02"
                                    autocomplete="off" value="{{ $house->hamlet }}" />
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="address">Alamat Lengkap</label>
                                <textarea name="address" id="address" cols="15" rows="2" class="form-control">{{ $house->address }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="modalAddressTown">Tipe Rumah</label>
                                <select id="modalAddressCountry" name="house_types_id" class="select2 form-select">
                                    <option value="">--Pilih Tipe Rumah--</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $house->house_types_id == $type->id ? 'selected' : '' }}>Tipe Rumah
                                            {{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalAddressTown">Foto Rumah</label>
                                <input type="file" name="images" class="form-control">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-1 mt-2">Update Data</button>
                                <button type="reset" class="btn btn-outline-secondary me-1 mt-2">
                                    Batalkan
                                </button>
                            </div>
                        </form>
                        <div class="col-12 text-center">
                            <form method="POST" action="{{ route('manage-residences.destroy', $id) }}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Apa anda yakin ingin menghapus data ini?')" type="submit"
                                    class="btn btn-outline-danger mt-2">
                                    Hapus data rumah
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
    </section>
@endsection
