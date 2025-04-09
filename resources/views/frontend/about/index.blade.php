@extends('frontend.layouts.master')
@section('content')
<!-- Page Header Start -->
@php
$img2 = 'frontend/img/background/night_view.webp';
@endphp
<!-- INNER PAGE BANNER -->
<div class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center py-5 mb-5 wow fadeIn" data-stellar-background-ratio="0.5" style="background-image:url('{{asset($img2)}}')" data-wow-delay="0.1s">
  <div class="overlay-main bg-black opacity-03"></div>
  <div class="container">
    <div class="wt-bnr-inr-entry">
      <div class="banner-title-outer">
        <div class="banner-title-name">
          <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">About us</h2>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- ABOUT COMPANY SECTION START -->
<div class="section-full p-t80 p-b50 bg-gray square_shape2">
  <div class="container">
    <div class="section-content ">
      <div class="row d-flex align-items-center">
        <div class="col-xl-6 col-lg-6 col-md-12 m-b50 wow slideInLeft" data-wow-delay="0.1s">
          <div class="m-about m-l50 m-r50">
            <div class="owl-carousel about-us-carousel owl-btn-bottom-right">
              <!-- COLUMNS 1 -->
              @foreach($aboutSliders as $aboutSlider)
              <div class="item">
                <div class="ow-img wt-img-effect zoom-slow">
                  <a href="javascript:void(0);"><img src="{{$aboutSlider->file}}" alt=""></a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 m-b30 wow slideInRight" data-wow-delay="0.1s">
          <div class="m-about-containt p-t30">
            <!-- <span class="section-title">About Us</span> -->
            <h3 class="section-title">About Us</h3>
            <!-- <h2 class="font-40 text-uppercase">Our mission is the best interior design & development</h2> -->
            <!-- <p class="text-uppercase"><b>Our mission is the best interior design & development, A Creative Architecture Agency For Your Dream Home</h1> -->
            <p class="text-justify">Pipra is a professional Consultancy and Construction farm that provides one-stop building solutions all over Bangladesh.
              We are a group of professional Architects and Engineers with extensive expertise in the area of Architecture, Engineering as well as Construction with Material Solutions.
              </b></p>
            <p class="text-justify">Since starting the consultancy and construction services, our team of architects and engineers have designed and supervised numerous residential, commercial, institutional as well as spiritual projects, and so on. We have comprehensive experience in managing projects from the initial design phase to completion and are committed to providing a splendid experience to our clients.
              Pipra is pledged to offer you preeminent services beyond your expectations.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ABOUT COMPANY SECTION END -->
@php
$img = asset('frontend/img/background/ptn-1.png');
@endphp

<!-- Team Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      <!-- <h4 class="section-title">Our Experts</h4> -->
      <h3 class="section-title">Our Experts</h3>
      <!-- <h1 class="display-5 mb-4 text-uppercase">We Are Creative Architecture Team For Your Dream Home</h1> -->
    </div>
    <div class="row g-0 team-items">
      @foreach($members as $member)
      <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="team-item position-relative">
          <div class="position-relative">
            <img class="img-fluid" src="{{$member->file}}" alt="">
            <div class="team-social text-center">
              <a class="btn btn-square" href="{{$member->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-square" href="#"><i class="fab fa-linkedin-in"></i></a>
              <a class="btn btn-square" href="{{$member->instagram_link}}"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
          <div class="bg-light text-center p-4">
            <h3 class="mt-2">{{$member->name}}</h3>
            <span class="text-primary">{{$member->designation}}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>


@endsection