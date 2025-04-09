@extends('frontend.layouts.master')
@section('content')
<!-- CONTENT START -->
<div class="page-content">
  <!-- INNER PAGE BANNER -->
  @php
  $img2 = 'frontend/img/background/night_view.webp';
  $img = $project->file;
  $img3 = 'frontend/img/background/ptn-1.png';
  @endphp
  <!-- INNER PAGE BANNER -->
  <div class="wt-bnr-inr overlay-wraper bg-parallax bg-top-center py-5 mb-5 wow fadeIn" data-stellar-background-ratio="0.5" style="background-image:url('{{asset($img2)}}')" data-wow-delay="0.1s">
    <div class="overlay-main bg-black opacity-03"></div>
    <div class="container">
      <div class="wt-bnr-inr-entry">
        <div class="banner-title-outer">
          <div class="banner-title-name">
            <h2 class="text-white text-uppercase letter-spacing-5 font-18 font-weight-300">Projects</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- INNER PAGE BANNER END -->
  <!-- SECTION CONTENT START -->
  @if(!empty($project->images))
  <div class="section-full p-t80 p-b50 bg-repeat" style="background-image:url('{{$img3}}');">
    <div class="container-fluid">
      <div class="section-content">
        <div class="work-carousel-outer">
          <div class="owl-carousel work-carousel owl-btn-vertical-center">
            <!-- COLUMNS 1 -->
            @if(!empty($project->images))
            @foreach($project->images as $img)
            <div class="item">
              <div class="ow-img wt-img-effect zoom-slow">
                <img src="{{$img->file}}" alt="">
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- SECTION CONTENT END  -->
  <!-- SECTION CONTENT START -->
  <div class="section-full p-t80 p-b50">
    <div class="container">
      <div class="project-detail-outer bg-top-left bg-parallax m-b30" data-stellar-background-ratio="0.5">
        <div class="row">
          <div class="col-lg-12 col-md-12 project-detail-containt  square_shape3">
            <div class="p-lr20 p-tb80 project-detail-containt-info bg-black">
              <div class="bg-white p-lr30 p-tb50 text-black">
                <h2 class="m-t0"><span class="font-34 text-uppercase">{{$project->title}}</span></h2>
                <div>{!!$project->sub_title!!}</div>
                <div>{!!$project->description!!}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- SECTION CONTENT END  -->

</div>
@endsection