@extends('layouts.main')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 text-center">
                    <h1>Sistem Informasi Warga Lowokwaru Residence</h1>
                </div>
            </div>

            <div class="row icon-boxes">

                <div class="col-md-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box" style="margin: 40px;">
                        <div class="icon">
                            <img style="width: 100%; height: 100px" class="img-fluid"
                                src="{{ asset('assets/img/iuran.png') }}" alt="Iuran Warga">
                        </div>
                        <h4 class="title">Iuran Warga</h4>
                        <p class="description">Halaman informasi mengenai iuran warga</p>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box" style="margin: 40px;">
                        <div class="icon"><img style="width: 100%; height: 100px" class="img-fluid"
                                src="{{ asset('assets/img/keuangan.png') }}" alt="Laporan Keuangan"></div>
                        <h4 class="title">Laporan Keuangan</h4>
                        <p class="description">Halaman informasi mengenai Laporan keuangan</p>
                    </div>
                </div>

                <div class="col-md-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box" style="margin: 40px;">
                        <div class="icon"><img style="width: 100%; height: 100px" class="img-fluid"
                                src="{{ asset('assets/img/kegiatan.png') }}" alt="Kegiatan Warga"></div>
                        <h4 class="title">Kegiatan Warga</h4>
                        <p class="description">Halaman informasi mengenai kegiatan warga</p>
                    </div>
                </div>


            </div>
        </div>
    </section><!-- End Hero -->
@endsection
