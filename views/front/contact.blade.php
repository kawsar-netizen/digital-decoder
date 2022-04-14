@extends('front.layouts.app')
@section('title', 'DIGITAL | DECODER')
@section('contents')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Contact</h2>
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Contact</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        {{-- <div class="map-section">
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
    </div> --}}

        {{-- @if (Session::has('status'))
    <div>
      <p class="alert alert-info">{{ Session::get('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="font-size:20px">×</span>
        </button>
      </p>
    </div>

  @endif --}}
        <section id="contact" class="contact">
            <div class="container">
                @if ($company_info)
                    <div class="row justify-content-center" data-aos="fade-up">

                        <div class="col-lg-10">

                            <div class="info-wrap">
                                <div class="row">
                                    <div class="col-lg-4 info">
                                        <i class="bi bi-geo-alt"></i>
                                        <h4>Location:</h4>
                                        <p>{{ $company_info->company_location }}</p>
                                    </div>

                                    <div class="col-lg-4 info mt-4 mt-lg-0">
                                        <i class="bi bi-envelope"></i>
                                        <h4>Email:</h4>
                                        <p>{{ $company_info->company_email }}</p>
                                    </div>

                                    <div class="col-lg-4 info mt-4 mt-lg-0">
                                        <i class="bi bi-phone"></i>
                                        <h4>Call:</h4>
                                        <p>{{ $company_info->company_call }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                @else
                    <div class="row justify-content-center" data-aos="fade-up">

                        <div class="col-lg-10">

                            <div class="info-wrap">
                                <div class="row">
                                    <div class="col-lg-4 info">
                                        <i class="bi bi-geo-alt"></i>
                                        <h4>Location:</h4>
                                        <p>Please Entry Company Location</p>
                                    </div>

                                    <div class="col-lg-4 info mt-4 mt-lg-0">
                                        <i class="bi bi-envelope"></i>
                                        <h4>Email:</h4>
                                        <p>Please Entry Email</p>
                                    </div>

                                    <div class="col-lg-4 info mt-4 mt-lg-0">
                                        <i class="bi bi-phone"></i>
                                        <h4>Call:</h4>
                                        <p>Please Entry Phone</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
                <div class="row mt-5 justify-content-center" data-aos="fade-up">
                    <div class="col-lg-10">
                        {{-- <form action="{{ route('clientInfo.store') }}" method="post"class="php-email-form">
                      <div class="row">
                        <div class="col-md-6 form-group">
                          <input type="text" name="client_name" class="form-control" id="client_name"
                              placeholder="Your Name" required>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="client_email" placeholder="Your Email"
                            required>
                    </div>
                      </div>
                      <div class="form-group mt-3">
                        <input type="text" class="form-control" name="client_subject" id="client_subject"
                            placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                      <textarea class="form-control" name="client_message" rows="5" placeholder="Message"
                          required></textarea>
                  </div>
                      <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                      </div>
                      <div class="submit"><button type="submit">Send Message</button></div>
                    </form> --}}

                        <form action="{{ route('clientInfo.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="client_name" class="form-control" id="client_name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="client_email" placeholder="Your Email"
                                        required>
                                </div>

                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="client_subject" id="client_subject"
                                        placeholder="Subject" required>
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="client_message" rows="5" placeholder="Message"
                                        required></textarea>
                                </div>
                                <div class="text-center">
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-lg border-radius">Send Message</button>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
