@extends('frontend.layouts.master')
@section('content')
<!-- CONTENT START -->
<div class="page-content">
  @php
  $img = 'frontend/img/background/night_view.webp';
  @endphp
  <!-- INNER PAGE BANNER -->
  <div class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center py-5 mb-5 wow fadeIn" data-stellar-background-ratio="0.5" style="background-image:url('{{asset($img)}}')" data-wow-delay="0.1s">
    <div class="overlay-main bg-black opacity-03"></div>
    <div class="container">
      <div class="wt-bnr-inr-entry">
        <div class="banner-title-outer">
          <div class="banner-title-name">
            <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">Latest Projects</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- INNER PAGE BANNER END -->

  <!-- GALLERY CONTENT START -->
  <div class="portfolio-wrap mfp-gallery work-grid clearfix">
    <div class="container-fluid">
      <div class="row">
        <!-- COLUMNS 1 -->
        @foreach($projects as $project)
        <div class="masonry-item cat-1 col-xl-3 col-lg-4 col-md-6 col-sm-6 m-b30">
          <div class="wt-img-effect ">
            <img src="{{ $project->file }}" alt="">
            <div class="overlay-bx-2 ">
              <div class="line-amiation">
                <div class="text-white  font-weight-300 p-a40">
                  <h2><a href="project-detail.html" class="text-white font-20 letter-spacing-4 text-uppercase">{{$project->title}}</a></h2>
                  <p>{!!$project->sub_title!!}
                  </p>
                  <a href="{{route('project.details', $project->id)}}" class="v-button letter-spacing-4 font-12 text-uppercase p-l20">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- GALLERY CONTENT END -->

</div>
@endsection