@extends('layouts.main')
@section('content')
    <section id="about-us" class="d-flex align-items-center mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="text-black main-title mb-3">Laporan Keuangan Warga</h2>
                            <h6 class="text-secondary">Laporan keuangan warga lowokwaru residence</h6>

                            <div class="mt-5 col-lg-12 d-flex flex-row justify-content-start">
                                <div class="col-lg-12">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th class="py-1">ID</th>
                                                <th class="py-1">Deskripsi</th>
                                                <th class="py-1">Tanggal tagihan</th>
                                                <th class="py-1">Total Bayar</th>
                                                <th class="py-1">Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($finances as $finance)
                                                <tr>
                                                    <td>{{ $finance->id }}</td>
                                                    <td>{{ $finance->description }}</td>
                                                    <td>{{ $finance->date }}</td>
                                                    <td>{{ number_format($finance->total, 2, ',', '.') }}</td>
                                                    <td>
                                                        @if ($finance->status == 'in')
                                                            <span class="btn btn-success"> Uang Masuk </span>
                                                        @else
                                                            <span class="btn btn-danger"> Uang Keluar </span>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
