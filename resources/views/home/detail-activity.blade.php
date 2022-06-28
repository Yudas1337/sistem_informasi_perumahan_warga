@extends('layouts.main')
@section('content')
    <style type="text/css">
        #hero {
            width: 100%;
            height: 100vh;
            position: relative;
            background: url("../../assets/img/activity.jpg") top center;
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
                    <h1>{{ $data->title }}</h1>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
    <section id="about-us" class="d-flex align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <h3 class="pb-3 mb-4 font-italic border-bottom">
                        {{ $data->title }}
                    </h3>

                    <div class="blog-post">
                        <p class="blog-post-meta">{{ date('D m Y', strtotime($data->created_at)) }} oleh: <a
                                href="#">{{ $data->user->name }}</a></p>
                        <p class="blog-post-meta">Kategori: {{ $data->category->category }}</a></p>

                        {!! $data->content !!}

                    </div><!-- /.blog-post -->

                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <div class="p-3 mb-3 bg-light rounded">
                        <h4 class="font-italic">Deskripsi</h4>
                        <p class="mb-0">{{ $data->description }}</p>
                    </div>

                </aside><!-- /.blog-sidebar -->

            </div>
        </div>
    </section><!-- End Hero -->
@endsection
