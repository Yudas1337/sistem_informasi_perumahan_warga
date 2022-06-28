@extends('layouts.main')
@section('content')
    <section id="about-us" class="d-flex align-items-center mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="text-black main-title mb-3">Pencarian iuran warga</h2>
                            <h6 class="text-secondary">Masukkan NIK untuk mengetahui daftar iuran</h6>

                            <div class="col-lg-12 d-flex flex-row justify-content-center">
                                <div class="mt-3 col-sm-6">
                                    @if ($errors->any())
                                        <div class="alert alert-danger mb-3 p-1">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="mt-1">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('denizens.dues.search') }}">
                                        @csrf
                                        <div class="input-group input-group-merge">
                                            <input autocomplete="off" name="search" type="text"
                                                class="form-control search-product" placeholder="Masukan NIK ..."
                                                aria-describedby="shop-search">
                                            <button type="submit" class="input-group-text"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-search text-muted">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65">
                                                    </line>
                                                </svg></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            @if ($status == 0)
                                <div class="mt-5 col-lg-12 d-flex flex-row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="alert alert-danger mb-3 p-1">Data Warga tidak ditemukan</div>
                                    </div>
                                </div>
                            @endif

                            @if ($status == 1)
                                <div class="mt-5 col-lg-12 d-flex flex-row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="alert alert-success mb-3 p-1">Data Warga ditemukan</div>
                                    </div>
                                </div>
                                <div class="mt-5 col-lg-12 d-flex flex-row justify-content-start">
                                    <div class="col-lg-6">
                                        <table class="table m-0 text-secondary">
                                            <thead>
                                                <tr>
                                                    <td>Nama Warga</td>
                                                    <td>:</td>
                                                    <td>{{ $data->first()->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>NIK</td>
                                                    <td>:</td>
                                                    <td>{{ $data->first()->nik }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Rumah</td>
                                                    <td>:</td>
                                                    <td>{{ $data->first()->residence->address }}</td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="mt-5 col-lg-12 d-flex flex-row justify-content-center">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th class="py-1">ID</th>
                                                <th class="py-1">Deskripsi</th>
                                                <th class="py-1">Bulan</th>
                                                <th class="py-1">Bayar</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($total = 0)
                                            @foreach ($data->first()->residence->dues as $due)
                                                @php($total += $due->total)
                                                <tr>
                                                    <td>{{ $due->id }}</td>
                                                    <td>{{ $due->description }}</td>
                                                    <td>{{ date('m-Y', strtotime($due->date)) }}</td>
                                                    <td>{{ number_format($due->total, 2, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-5 col-lg-12 d-flex flex-row justify-content-start">
                                    <div class="col-lg-6">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>:</td>
                                                    <td>{{ number_format($total, 2, ',', '.') }}</td>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div class="mt-5 col-lg-12 d-flex flex-row justify-content-start">
                                    <div class="col-lg-3">
                                        <a class="btn btn-success"
                                            href="{{ route('denizens.dues.pdf', $data->first()->nik) }}">Cetak Pdf</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
