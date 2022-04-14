@extends('front.layouts.app')
@section('contents')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Read More...</h2>
                <ol>
                    <li><a href="{{ '/' }}">Home</a></li>
                    <li>Read More</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{ asset('uploads/slider/' . $readSlug->image) }}" alt="Slider image"
                                class="d-block w-100 rounded">
                        </div>

                        <h2 class="entry-title">
                            {{ $readSlug->title }}
                        </h2>
                        <div class="entry-content">
                            <p>
                                {{ $readSlug->description }}
                            </p>
                            <div class="read-more">
                                <a href="{{ '/' }}">Back</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        {{-- <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn--> --}}
{{-- 
                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="#">General <span>(25)</span></a></li>
                                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                <li><a href="#">Travel <span>(5)</span></a></li>
                                <li><a href="#">Design <span>(22)</span></a></li>
                                <li><a href="#">Creative <span>(8)</span></a></li>
                                <li><a href="#">Educaion <span>(14)</span></a></li>
                            </ul>
                        </div><!-- End sidebar categories--> --}}

                        <h3 class="sidebar-title">Recent Posts</h3>
                        @foreach ($recentpost as $item)
                        <div class="sidebar-item recent-posts">

                                <img src="{{ asset('uploads/slider/' . $item->image) }}"  width="40px"
                                height="40px" alt="post images" class="rounded">
                                <h4>{{$item->title}}</h4>
                                <time datetime="2020-01-01">{{ $item->created_at->diffForHumans() }}</time>
                            </div>
                            @endforeach

                        </div><!-- End sidebar recent posts-->
{{-- 
                        <h3 class="sidebar-title">Tags</h3>
                        <div class="sidebar-item tags">
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div><!-- End sidebar tags--> --}}

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section>
@endsection










{{-- <h1>{{ $readSlug->title }}</h1>



            <p>{{ $readSlug->description }}</p>

            <img src="{{ asset('uploads/slider/' . $readSlug->image) }}" class="d-block w-100" alt="Slider Image">
        </div> --}}
