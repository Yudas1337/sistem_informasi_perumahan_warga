<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    @include('dashboard.layouts.report.header')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="invoice-print p-3">
                    <div class="invoice-header d-flex justify-content-between flex-md-row flex-column pb-2">
                        <div>
                            <div class="d-flex mb-1">
                                <img style="width: 50%" src="{{ asset('logo.png') }}" alt="LowokWaru Residence">
                            </div>
                            <p class="mb-25">Jl. Lebaksari No.11, Lowokwaru, Kec. Lowokwaru, Kota Malang, Jawa
                                Timur</p>
                            <p class="mb-25">lowokwaruresidence@gmail.com</p>
                            <p class="mb-0">+62 812 1622 1775</p>
                        </div>
                        <div class="mt-md-0 mt-2">
                            <h4 class="fw-bold text-end mb-1">Laporan Keuangan</h4>
                            <div class="invoice-date-wrapper mb-50">
                                <span class="invoice-date-title">Tanggal:</span>
                                <span class="fw-bold"> {{ date('Y/m/d') }}</span>
                            </div>
                        </div>
                    </div>
                    <hr class="my-2" />
                    <div class="table-responsive mt-2">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th class="py-1">Deskripsi</th>
                                    <th class="py-1">Bulan</th>
                                    <th class="py-1">Bayar</th>
                                    <th class="py-1">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($finances as $finance)
                                    <tr>
                                        <td>{{ $finance->description }}</td>
                                        <td>{{ date('m-Y', strtotime($finance->date)) }}</td>
                                        <td>{{ 'Rp ' . number_format($finance->total, 2, ',', '.') }}</td>
                                        <td>
                                            @if ($finance->status == 'in')
                                                Uang Masuk
                                            @else
                                                Uang Keluar
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row invoice-sales-total-wrapper mt-3">
                        <div class="col-md-12 order-md-1 order-2 mt-md-0">
                            <table class="mb-5">
                                <thead>
                                    <tr>
                                        <td><span class="fw-bold">Total Uang Masuk</span></td>
                                        <td>:</td>
                                        <td>{{ $debit }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold">Total Uang Keluar</span></td>
                                        <td>:</td>
                                        <td>{{ $credit }}</td>
                                    </tr>
                                    <tr>
                                        <td><span class="fw-bold">Sisa Saldo</span></td>
                                        <td>:</td>
                                        <td>{{ $balance }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="col-md-12 order-md-1 order-2 mt-md-0 mt-3">
                            <p class="card-text mb-0"><span class="fw-bold">Nama Admin yang mencetak : </span> <span
                                    class="ms-75">{{ auth()->user()->name }}</span></p>
                        </div>
                    </div>

                    <hr class="my-2" />
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    @include('dashboard.layouts.report.footer')
</body>
<!-- END: Body-->

</html>
