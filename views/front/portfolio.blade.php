@extends('front.layouts.app')
@section('title', 'DIGITAL | DECODER')
@section('contents')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Portolio</h2>
                    <ol>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li>Portolio</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-web">Web</li>
                            <li data-filter=".filter-app">App</li>
                            {{-- <li data-filter=".filter-card">Card</li> --}}
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up">
                    @foreach ($portfolioItem as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->project_type }}">
                            <img src="{{ asset('uploads/portfolio/' . $item->project_image) }}" class="img-fluid rounded"
                                alt="Portfolio_image">
                            <div class="portfolio-info">
                                <h4>{{$item->project_titel}}</h4>
                                <p>{{$item->project_type}}</p>
                                <a href="{{ asset('uploads/portfolio/' . $item->project_image) }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i
                                        class="bx bx-plus"></i></a>
                                <a href="{{$item->project_link}}" class="details-link" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>

                    @endforeach

                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection
