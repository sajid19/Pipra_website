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
          <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">Contact</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End -->
<!-- Contact Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      <!-- <h4 class="section-title">Contact Us</h4> -->
      <h3 class="section-title">Contact Us</h3>
      <!-- <h1 class="display-5 mb-4 text-uppercase">If You Have Any Query, Please Feel Free Contact Us</h1> -->
    </div>
    <div class="row g-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="d-flex flex-column justify-content-between h-100">
          <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
              <i class="fa fa-map-marker-alt text-primary"></i>
            </div>
            <div class="ms-4">
              <p class="mb-2">Address</p>
              <h3 class="mb-0">Shop No-81,82. Station Road,
                Railway Market, Puran Bogra, Bangladesh</h3>
            </div>
          </div>
          <div class="bg-light d-flex align-items-center w-100 p-4 mb-4">
            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
              <i class="fa fa-phone-alt text-primary"></i>
            </div>
            <div class="ms-4">
              <p class="mb-2">Call Us Now</p>
              <h3 class="mb-0">01601-041123</h3>
            </div>
          </div>
          <div class="bg-light d-flex align-items-center w-100 p-4">
            <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-dark" style="width: 55px; height: 55px;">
              <i class="fa fa-envelope-open text-primary"></i>
            </div>
            <div class="ms-4">
              <p class="mb-2">Mail Us Now</p>
              <h3 class="mb-0">epipra.bd@gmail.com</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 wow fadeInUp mb-4" data-wow-delay="0.5s">
        <!-- <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->
        <form action="{{route('contact.store')}} " method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                <label for="name">Your Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                <label for="email">Your Email</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone" required>
                <label for="phone">Phone</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea name="message" class="form-control" placeholder="Leave a message here" id="message" required style="height: 220px"></textarea>
                <label for="message">Message</label>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Contact End -->
<!-- Google Map Start -->
<div class="container-xxl pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
  <iframe class="w-100 mb-n2" style="height: 450px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3620.446133577837!2d89.36543697530392!3d24.848607977936975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fc5527d3b9693d%3A0x32693e6ff983ee93!2sShop%20No%3A%2081%2C82%2C%20Railway%20Market%2C%20Station%20Road%2C%20Bogura!5e0!3m2!1sen!2sbd!4v1716643250556!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- Google Map End -->
@endsection