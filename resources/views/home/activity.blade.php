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
                    <h1>Kegiatan Warga</h1>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
    <section id="about-us" class="d-flex align-items-center ">
        <div class="container">
            <div class="row mb-2">
                @foreach ($activities as $activity)
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong
                                    class="d-inline-block mb-2 text-primary">{{ $activity->category->category }}</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark">{{ $activity->title }}</a>
                                </h3>
                                <div class="mb-1 text-muted">{{ date('Y-m-d', strtotime($activity->created_at)) }}</div>
                                <p class="card-text mb-auto">{{ substr($activity->description, 0, 200) }}</p>
                                <a href="{{ route('denizens.activities.detail', $activity->slug) }}">Detail Berita</a>
                            </div>
                            @if (!$activity->thumbnail)
                                <img class="card-img-right flex-auto d-none d-md-block"
                                    data-src="holder.js/200x250?theme=thumb" alt="{{ $activity->title }}"
                                    style="width: 200px; height: 200px;"
                                    src="{{ asset('storage/activity_images/no-image.png') }}" data-holder-rendered="true">
                            @else
                                <img class="card-img-right flex-auto d-none d-md-block"
                                    data-src="holder.js/200x250?theme=thumb" alt="{{ $activity->title }}"
                                    style="width: 200px; height: 200px;"
                                    src="{{ asset('storage/' . $activity->thumbnail) }}" data-holder-rendered="true">
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Hero -->
@endsection
