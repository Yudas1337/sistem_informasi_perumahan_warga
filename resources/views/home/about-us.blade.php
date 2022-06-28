@extends('layouts.main')
@section('content')
    <style type="text/css">
        #hero {
            width: 100%;
            height: 100vh;
            position: relative;
            background: url("../../assets/img/about-us.jpg") top center;
            background-size: cover;
            position: relative;
            filter: brightness(80%);
        }
    </style>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 text-center">
                    <h1>Tentang Kami</h1>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
    <section id="about-us" class="d-flex align-items-center ">
        <div class="container">

            <div class="form-head dashboard-head d-md-flex d-block mb-5 align-items-start">
                <h2 class="dashboard-title">Tentang Kami</h2>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="text-black main-title mb-3">Lowokwaru Residence</h2>
                            <p class="text-secondary mb-5">
                                Website Lowokwaru Residence adalah sebuah sistem informasi berbasis website yang mengelola
                                data warga, administrasi, dan keuangan di area komplek perumahan Lowokwaru Residence
                            </p>
                            <h2 class="text-black main-title mb-3">Kontak Kami</h2>
                            <p class="text-secondary mb-4">
                                <i class="fa fa-envelope"></i> Alamat : Jl. Lebaksari No.11, Lowokwaru, Kec. Lowokwaru, Kota
                                Malang, Jawa Timur
                            </p>
                            <p class="text-secondary mb-4">
                                <i class="fa fa-phone"></i> No Telepon : +62 812 1622 1775
                            </p>
                            <p class="text-secondary mb-4">
                                <i class="fa fa-home"></i> Email : lowokwaruresidence@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
