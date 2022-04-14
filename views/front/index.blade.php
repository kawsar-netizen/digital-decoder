@extends('front.layouts.app')
@section('title', 'DIGITAL | DECODER')
@section('contents')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <div class="carousel-inner" role="listbox">
                @php
                    $i = 1;
                @endphp
                @foreach ($sliderItem as $item)
                    <!-- Slide 1 -->
                    <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                        @php
                            $i++;
                        @endphp
                        <img src="{{ asset('uploads/slider/' . $item->image) }}" style="height: 600px;" class="w-100 rounded" alt="Slider Image">
                        {{-- style="background-image: url({{ asset('uploads/slider/'.$item->image) }});"> --}}
                        <div class="carousel-container">
                            <div class="carousel-content animate__animated animate__fadeInUp rounded">
                                <h2 class="text-justify">{{ $item->title }}</h2>
                                <p class="text-justify">{{ Str::limit($item->description, 300) }}</p>
                                <div class="text-center"><a href="{{ route('read.more', $item->slug) }}"
                                        class="btn-get-started">Read More</a></div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container">
                @if ($quoteItem)
                    <div class="row">
                        <div class="col-lg-9 text-center text-lg-left">
                            <h3>{{ $quoteItem->title }}</h3>
                            <p> {{ Str::limit($quoteItem->description, 300) }}
                            </p>
                        </div>
                        <div class="col-lg-3 cta-btn-container text-center">
                            <a class="cta-btn align-middle" href="#">Request a quote</a>
                        </div>
                    </div>
                @else

                    <div class="row">
                        <div class="col-lg-9 text-center text-lg-left">
                            <h3>Please Data Entry</h3>
                            <p>Please Description Entry
                            </p>
                        </div>
                        <div class="col-lg-3 cta-btn-container text-center">
                            <a class="cta-btn align-middle" href="#">Request a quote</a>
                        </div>
                    </div>


                @endif

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                @if ($serviceItem)
                    <div class="row">
                        @foreach ($serviceItem as $item)
                            <div class="col-lg-4 col-md-6">
                                <div class="icon-box" data-aos="fade-up">
                                    <div class="icon"><i class="{{ $item->icon }}"></i></div>
                                    <h4 class="title"><a href="dokansheba.com">{{ $item->title }}</a></h4>
                                    <p class="text-justify">{{ Str::limit($item->description, 300) }}</p>
                                </div>
                            </div>

                        @endforeach
                    </div>

                @else


                    <div class="row">
                        @foreach ($serviceItem as $item)
                            <div class="col-lg-4 col-md-6">


                                <h4 class="title">Please Data Entry</h4>

                            </div>
                    </div>

                @endforeach
            </div>
            @endif
            </div>
        </section><!-- End Services Section -->

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
                                width="500" height="600" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $item->project_titel }}</h4>
                                <p>{{ $item->project_type }}</p>
                                <a href="{{ asset('uploads/portfolio/' . $item->project_image) }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i
                                        class="bx bx-plus"></i></a>
                                <a href="{{ $item->project_link }}" class="details-link" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>


                    @endforeach

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Our Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Our <strong>Clients</strong></h2>
                    {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                    sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
                </div>

                <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

                    @foreach ($ourclientItem as $item)

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="client-logo">
                                <img src="{{ asset('uploads/client/' . $item->image) }}" class="img-fluid"
                                    alt="Portfolio_image">
                            </div>
                        </div>

                    @endforeach
                </div>

            </div>
        </section><!-- End Our Clients Section -->

    </main><!-- End #main -->
@endsection
