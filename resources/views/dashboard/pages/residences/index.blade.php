@extends('dashboard.layouts.main')
@section('content')
    <section class="app-user-list">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ count($houses) }}</h3>
                            <span>Jumlah rumah</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{ count($types) }}</h3>
                            <span>Jumlah tipe rumah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ecommerce-searchbar" class="ecommerce-searchbar">
        <div class="row mb-3">
            <div class="col-lg-3">
                <a data-bs-toggle="modal" data-bs-target="#addNewAddressModal"
                    class="btn btn-primary btn-cart waves-effect waves-float waves-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-plus me-50 font-small-4">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>Tambah rumah baru</span>
                </a>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-sm-12">
                <div class="input-group input-group-merge">
                    <input type="text" class="form-control search-product" id="shop-search"
                        placeholder="Cari alamat atau tipe rumah" aria-describedby="shop-search">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-search text-muted">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg></span>
                </div>
            </div>
            <div class="col-12 mt-3">
                @if (Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Sukses!</h4>
                        <div class="alert-body">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
                @if (Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Gagal!</h4>
                        <div class="alert-body">
                            {{ Session::get('error') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section id="ecommerce-products" class="grid-view mt-3">
        <div class="row">
            @foreach ($houses as $house)
                <div class="col-lg-3">
                    <div class="card ecommerce-card">
                        <div class="item-img text-center">
                            <img style="height: 250px" class="img-fluid card-img-top"
                                src="{{ asset('storage/' . $house->images) }}" alt="img-placeholder"></a>
                        </div>
                        <div class="card-body">
                            <h6 class="item-name">
                                Alamat : {{ substr($house->address, 0, 40) }}</a>
                            </h6>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-cost">
                                    <h4 class="item-price">
                                        <span class="badge {{ array_rand($colors) }}"> Tipe Rumah
                                            {{ $house->house_type->type }}</span>
                                    </h4>
                                </div>
                            </div>
                            <a style="width: 100%" href="{{ route('manage-residences.edit', $house->id) }}"
                                class="mt-2 btn btn-primary btn-cart waves-effect waves-float waves-light">
                                <span class="add-to-cart">Detail</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('dashboard.pages.residences.create-modal')
@endsection
