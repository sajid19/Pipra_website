@extends('frontend.layouts.master')
@section('content')
@php
$img1 = 'frontend/img/background/ptn-1.png';

@endphp
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
          <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">Services</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page Header End -->

<!-- Service Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      <!-- <h4 class="section-title">Our Services</h4> -->
      <h3 class="section-title">Our Services</h3>
      <!-- <h1 class="display-5 mb-4 font-40 text-uppercase">We Focused On Modern Architecture And Interior Design</h1> -->
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item d-flex position-relative text-center h-100">
          <img class="bg-img" src="{{ asset('frontend/img/service-1.jpg') }}" alt="">
          <div class="service-text p-5">
            <img class="mb-4" src="{{ asset('frontend/img/icons/icon-5.png') }}" alt="Icon">
            <h3 class="mb-3">Architectural Design</h3>
            <p> - Concept design and development</p>
            <p> - 3D modeling and visualization</p>
            <p> - Space planning</p>
            <p> - Sustainable and green building design</p>
            <p> - Interior design</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="service-item d-flex position-relative text-center h-100">
          <img class="bg-img" src="{{ asset('frontend/img/service-2.jpg') }}" alt="">
          <div class="service-text p-5">
            <img class="mb-4" src="{{ asset('frontend/img/icons/icon-6.png') }}" alt="Icon">
            <h3 class="mb-3">Engineering Services</h3>
            <p> - Structural engineering</p>
            <p> - Mechanical, electrical, and plumbing (MEP) engineering</p>
            <p> - Civil engineering</p>
            <p> - Geotechnical engineering</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="service-item d-flex position-relative text-center h-100">
          <img class="bg-img" src="{{ asset('frontend/img/service-3.jpg') }}" alt="">
          <div class="service-text p-5">
            <img class="mb-4" src="{{ asset('frontend/img/icons/icon-7.png') }}" alt="Icon">
            <h3 class="mb-3">Project Management</h3>
            <p> - Project planning and scheduling</p>
            <p> - Budget estimation and cost management</p>
            <p> - Risk management</p>
            <p> - Quality control and assurance</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item d-flex position-relative text-center h-100">
          <img class="bg-img" src="{{ asset('frontend/img/service-4.jpg') }}" alt="">
          <div class="service-text p-5">
            <img class="mb-4" src="{{ asset('frontend/img/icons/icon-7.png') }}" alt="Icon">
            <h3 class="mb-3">Construction Services</h3>
            <p> - Project planning and scheduling</p>
            <p> - Budget estimation and cost management</p>
            <p> - Risk management</p>
            <p> - Quality control and assurance</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="service-item d-flex position-relative text-center h-100">
          <img class="bg-img" src="{{ asset('frontend/img/service-5.jpg') }}" alt="">
          <div class="service-text p-5">
            <img class="mb-4" src="{{ asset('frontend/img/icons/icon-7.png') }}" alt="Icon">
            <h3 class="mb-3">Consultancy Services</h3>
            <p> - Feasibility studies</p>
            <p> - Site analysis and selection</p>
            <p> - Regulatory approvals and permitting</p>
            <p> - Environmental impact assessments</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="service-item d-flex position-relative text-center h-100">
          <img class="bg-img" src="{{ asset('frontend/img/service-6.jpg') }}" alt="">
          <div class="service-text p-5">
            <img class="mb-4" src="{{ asset('frontend/img/icons/icon-10.png') }}" alt="Icon">
            <h3 class="mb-3">Specialized Services</h3>
            <p> - Retrofit and renovation of existing buildings</p>
            <p> - Historical preservation and restoration</p>
            <p> - Landscape architecture</p>
            <p> - Urban planning and development</p>
            <p> - BIM (Building Information Modeling) services</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Service End -->

<!-- TESTIMONIALS SECTION START -->
<div class="section-full p-t80 clearfixbg-repeat " style="background-image:url('{{asset($img1)}}');">
  <div class="container">
    <div class="section-content">
      <!-- TITLE START -->
      <div class="section-head text-left">
        <!-- <h2 class="text-uppercase font-36 section-title">Testimonials</h2> -->
        <h3 class="section-title">Testimonials</h3>
        <!-- <div class="wt-separator-outer">
          <div class="wt-separator bg-black"></div>
        </div> -->
      </div>
      <!-- TITLE END -->
      <!-- TESTIMONIAL 4 START ON BACKGROUND -->
      <div class="section-content">
        <div class="owl-carousel testimonial-home">
          <div class="item wow fadeInRight" data-wow-delay="0.1s">
            <div class="testimonial-6">
              <div class="testimonial-pic-block">
                <div class="testimonial-pic">
                  <img src="{{ asset('frontend/img/testimonials/pic1.jpeg') }}" width="132" height="132" alt="">
                </div>
              </div>
              <div class="testimonial-text clearfix bg-white">
                <div class="testimonial-detail clearfix">
                  <strong class="testimonial-name">Kazi Sofiqul Islam</strong>
                  <span class="testimonial-position p-t0">Businessman</span>
                </div>
                <div class="testimonial-paragraph text-black p-t15">
                  <span class="fa fa-quote-left"></span>
                  <p>PIPRA কোম্পানির সাথে কাজ করার অভিজ্ঞতা অসাধারণ ছিল। পেশাদারি, দক্ষতা এবং সময়মতো কাজ সম্পন্ন করার জন্য আমরা তাদের সর্বোচ্চ প্রশংসা করি। ভবিষ্যতে আবার তাদের সঙ্গেই কাজ করতে চাই।</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="item wow fadeInRight" data-wow-delay="0.1s">
            <div class="testimonial-6">
              <div class="testimonial-pic-block">
                <div class="testimonial-pic">
                  <img src="{{ asset('frontend/img/testimonials/pic-2.jpeg') }}" width="132" height="132" alt="">
                </div>
              </div>
              <div class="testimonial-text clearfix bg-white">
                <div class="testimonial-detail clearfix">
                  <strong class="testimonial-name">যাহির</strong>
                  <span class="testimonial-position p-t0">দেশীও</span>
                </div>
                <div class="testimonial-paragraph text-black p-t15">
                  <span class="fa fa-quote-left"></span>
                  <p>PIPRA কোম্পানির প্রকল্প ব্যবস্থাপনা অত্যন্ত সুচিন্তিত এবং সুনির্দিষ্ট। তাদের প্রকল্প ব্যবস্থাপকরা শুরু থেকেই আমাদের সঠিক পরামর্শ এবং গাইডলাইন প্রদান করেছেন, যা প্রকল্পটির প্রতিটি ধাপে সাহায্য করেছে। তারা আমাদের প্রয়োজন অনুযায়ী কাস্টমাইজড সমাধান দিয়েছে এবং কাজের অগ্রগতি নিয়মিতভাবে আপডেট করেছেন। এটি আমাদের জন্য একটি বড় সুবিধা ছিল, কারণ প্রতিটি সিদ্ধান্ত এবং পরিবর্তন দ্রুত এবং সঠিকভাবে সম্পন্ন হয়েছে। ধন্যবাদ পিঁপড়া টিম কে।চাই।</p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="hilite-title p-lr20 m-tb20 text-right text-uppercase bdr-gray bdr-right">
      <strong>Client</strong>
      <span class="text-black">Says</span>
    </div>
  </div>
</div>
<!-- TESTIMONIALS SECTION END -->

<div class="container mt-5">
  <div class="text-center">
    <h1>More Questions? Let's Talk</h1>
  </div>
  <div class="row d-flex justify-content-center mt-4">
    <div class="col-md-3">
      <img src="https://via.placeholder.com/150" alt="Initial Design Consultation" class="img-fluid rounded">
    </div>
    <div class="col-md-3 d-flex flex-column justify-content-center">
      <h3>Initial Design Consultation</h3>
    </div>
    <div class="col-md-3 d-flex flex-column justify-content-center">
      <p>1 Hr</p>
    </div>
    <div class="col-md-3 d-flex flex-column justify-content-center">
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#with-form">Book Now</a>
    </div>
  </div>
</div>

<!-- MODAL -->
<div id="with-form" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-secondry">
        <h4 class="modal-title text-black">More Questions? Let's Talk</h4>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <form id="demo-form" action="{{route('consult.store')}} " method="POST" enctype="multipart/form-data" class="form-horizontal mb-lg">
          @csrf
          <div class="row form-group mt-lg">
            <label class="col-sm-3 control-label">Select Date Time</label>
            <div class="col-sm-9">
              <input name="time" class="form-control" placeholder="Type your name..." required type="datetime-local">
            </div>
          </div>
          <div class="row form-group mt-lg">
            <label class="col-sm-3 control-label">Select Service</label>
            <div class="col-sm-9">
              <select class="form-select" aria-label="Default select example" name="service">
                <option selected>Open this select menu</option>
                <option value="Service 1">Service 1</option>
                <option value="Service 2">Service 2</option>
                <option value="Service 3">Service 3</option>
              </select>
            </div>
          </div>
          <div class="row form-group mt-lg">
            <label class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input name="name" class="form-control" placeholder="Type your name..." required type="text">
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input name="email" class="form-control" placeholder="Type your email..." required type="email">
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
              <input name="phone" class="form-control" placeholder="Type an Phone..." type="url">
            </div>
          </div>
          <div class="row form-group">
            <label class="col-sm-3 control-label">Query</label>
            <div class="col-sm-9">
              <textarea name="msg" rows="5" class="form-control" placeholder="Type your comment..." required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="site-button text-uppercase button-sm letter-spacing-2 m-r15" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="site-button text-uppercase button-sm letter-spacing-2">Send </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection