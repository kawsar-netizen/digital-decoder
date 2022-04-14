@extends('front.layouts.app')
@section('title', 'DIGITAL | DECODER')
@section('contents')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Testimonials</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Testimonials</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="row">

          @foreach ($testimonialItem as $item)
            
          <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item">
              {{-- <img src="{{ asset('uploads/testimonial/' . $item->image) }}" class="d-block w-50 rounded" alt="Slider Image"> --}}
              <h3>{{$item->name}}</h3>
              <h4>{{$item->designation}}</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {{Str::limit($item->title,100)}}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          @endforeach

        </div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->
@endsection