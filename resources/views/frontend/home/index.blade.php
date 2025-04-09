@extends('frontend.layouts.master')
@section('page-css')
<style>
  .modal-header {
    /* background-color: #343a40; */
    color: white;
  }

  .modal-header .close {
    color: white;
    opacity: 1;
  }

  .modal-header .close:hover {
    color: #ff6b6b;
  }

  .modal-body {
    padding: 2rem;
    font-size: 1.1rem;
    line-height: 1.5;
  }

  .modal-content {
    border-radius: 15px;
  }

  .modal-dialog {
    max-width: 600px;
  }

  .modal-footer {
    border-top: none;
  }

  @keyframes slideInFromLeft {
    from {
      transform: translateX(100%);
      opacity: 0;
    }

    to {
      transform: translateX(0);
      opacity: 1;
    }
  }

  @keyframes slideOutToRight {
    from {
      transform: translateX(0);
      opacity: 1;
    }

    to {
      transform: translateX(-100%);
      opacity: 0;
    }
  }


  .modal.slide-in .modal-dialog {
    animation: slideInFromLeft 0.5s forwards;
  }

  .modal.slide-out .modal-dialog {
    animation: slideOutToRight 0.5s forwards;
  }
</style>
<style>
  .tp-leftarrow,
  .tp-rightarrow {
    display: none !important;
  }

  #welcome_wrapper,
  #welcome {
    width: 100vw !important;
    height: 100vh !important;
    margin: 0;
    padding: 0;
  }
  .defaultimg {
    animation: scale 20s linear infinite !important;
  }

  @keyframes scale {
    50% {
      -webkit-transform: scale(1.2);
      -moz-transform: scale(1.2);
      -ms-transform: scale(1.2);
      -o-transform: scale(1.2);
      transform: scale(1.2);
    }
  }
</style>
<style>
  .cmodal-content {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .cmodal-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 5px;
    /* Optional for rounded corners */
  }



  /** * Overlay * -- only show for tablet and up */
  @media only screen and (min-width: 40em) {
    .cmodal-overlay {
      display: flex;
      align-items: center;
      justify-content: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 5;
      background-color: rgba(0, 0, 0, 0.6);
      opacity: 0;
      visibility: hidden;
      backface-visibility: hidden;
      transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), visibility 0.6s cubic-bezier(0.55, 0, 0.1, 1);
    }

    .cmodal-overlay.active {
      opacity: 1;
      visibility: visible;
    }
  }

  /** * Modal */
  .cmodal {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    margin: 0 auto;
    background-color: transparent;
    width: 900px;
    max-width: 75rem;
    min-height: 20rem;
    /* padding: 1rem; */
    border-radius: 3px;
    opacity: 0;
    overflow-y: auto;
    visibility: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    backface-visibility: hidden;
    transform: scale(1.2);
    transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
    z-index:99999;
  }

  .cmodal .close-cmodal {
    position: absolute;
    cursor: pointer;
    top: 5px;
    right: 15px;
    opacity: 0;
    backface-visibility: hidden;
    transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), transform 0.6s cubic-bezier(0.55, 0, 0.1, 1);
    transition-delay: 0.3s;
    z-index:99999;
  }

  .cmodal .close-cmodal svg {
    width: 1.75em;
    height: 1.75em;
  }

  .cmodal .cmodal-content {
    opacity: 0;
    backface-visibility: hidden;
    transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1);
    transition-delay: 0.3s;
  }

  .cmodal.active {
    visibility: visible;
    opacity: 1;
    transform: scale(1);
    /*height: 50%;*/
  }

  .cmodal.active .cmodal-content {
    opacity: 1;
  }

  .cmodal.active .close-cmodal {
    transform: translateY(10px);
    opacity: 1;
  }

  /** * Mobile styling */
  @media only screen and (max-width: 39.9375em) {
   
    .cmodal {
        position: fixed;
        top: 25%;
        left: 0;
        right: 0;
        width: auto;
        box-shadow: none;
        -webkit-overflow-scrolling: touch;
      }

    .close-cmodal {
      right: 20px !important;
    }
  }
</style>
@endsection
@section('content')
<!-- SLIDER START -->
<div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="goodnews-header" data-source="gallery" style="background:#eeeeee;padding:0px;">
  <div id="welcome" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.3.1">
    <ul>
      @if(!empty($homeSliders))
      @foreach($homeSliders as $homeSlider)
      <!-- SLIDE 1 -->
      <li data-index="rs-90{{$loop->iteration}}" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ $homeSlider->file }}" data-rotate="0" data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
        <!-- MAIN IMAGE -->
        <img src="{{ $homeSlider->file }}" alt="" data-lazyload="{{ $homeSlider->file }}" data-bgposition="center center" data-bgfit="cover" data-bgparallax="4" class="rev-slidebg" data-no-retina>
        <!-- LAYERS -->
        <div class="dark-overlay"></div>
        <!-- BACKGROUND VIDEO LAYER -->
        <!-- LAYER NR. 1 -->
        <div class="tp-caption tp-shape tp-shapewrapper " id="rrzb_902-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[
                        {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                        {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                        ]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 4;background-color:rgba(0, 0, 0, 0.2);border-color:rgba(0, 0, 0, 0);border-width:0px;">
        </div>

        <div id="rrzb_902" class="rev_row_zone rev_row_zone_middle" style="z-index: 7;">
          <!-- Content Block -->
          <!-- LAYER NR. 1 -->
          <div class="tp-caption  " id="slide-902-layer-1" data-x="['left','left','left','left']" data-hoffset="['100','100','100','100']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="row" data-columnbreak="3" data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                            {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[50,60,40,50]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[150,130,80,50]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[150,130,80,50]" style="z-index: 7; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">

            <!-- LAYER NR. 2 -->
            <div class="tp-caption  " id="slide-902-layer-2" data-x="['left','left','left','left']" data-hoffset="['0','0','100','100']" data-y="['top','top','top','top']" data-voffset="['0','0','100','100']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="column" data-responsive_offset="on" data-responsive="off" data-frames='[{"delay":"+0","speed":750,"sfxcolor":"#fff","sfx_effect":"","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},
                                    {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]' data-columnwidth="100%" data-verticalalign="top" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['center','center','center','center']" data-paddingtop="[50,50,50,50]" data-paddingright="[0,0,30,30]" data-paddingbottom="[50,50,50,50]" data-paddingleft="[0,0,30,30]" style="z-index: 8; width: 100%;">
              <!-- LAYER NR. 3 -->
              <div class="tp-caption   tp-resizeme" id="slide-902-layer-3" data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['top','bottom','bottom','bottom']" data-voffset="['0','260','250','190']" data-width="none" data-height="none" data-whitespace="['normal','nowrap','nowrap','nowrap']" data-type="text" data-basealign="slide" data-responsive_offset="off" data-frames='[{"delay":"+490","speed":750,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},
                                        {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['center','inherit','inherit','inherit']" data-paddingtop="[5,5,5,5]" data-paddingright="[5,5,5,5]" data-paddingbottom="[5,5,5,5]" data-paddingleft="[5,5,5,5]" style="z-index: 10; white-space: normal; font-size: 18px; line-height: 15px; font-weight: 700; color: #fff; letter-spacing: 3px; display: inline-block;">
                <!-- GENERAL -->
              </div>

              <!-- LAYER NR. 4 -->
              <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-902-layer-4" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-width="full" data-height="15" data-whitespace="normal" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                        {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 13; display: block;background-color:rgba(0, 0, 0, 0);">
              </div>

              <!-- LAYER NR. 5 -->
              @if(!empty($homeSlider->title))
              <div class="tp-caption   tp-resizeme  tp-linkmod" id="slide-902-layer-5" data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['top','bottom','bottom','bottom']" data-voffset="['0','170','140','120']" data-fontsize="['60','60','60','40']" data-lineheight="['60','60','60','40']" data-width="['900','700','100%','100%']" data-height="none" data-whitespace="normal" data-type="text" data-actions='' data-basealign="slide" data-responsive_offset="off" data-frames='[{"delay":"+590","speed":750,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},
                                        {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},
                                        {"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[5,5,5,5]" data-paddingbottom="[10,10,10,10]" data-paddingleft="[5,5,5,5]" style="z-index: 11; white-space: normal; font-weight: 600; color: #fff; letter-spacing: 2px; display: inline-block;
                                        text-decoration: none; text-transform:capitalize">{{ $homeSlider->title }}
              </div>
              @endif

              <!-- LAYER NR. 6 -->
              <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-902-layer-6" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-width="full" data-height="15" data-whitespace="normal" data-type="shape" data-responsive_offset="on" data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                        {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9; display: block;background-color:rgba(0, 0, 0, 0);"> </div>

              <!-- LAYER NR. 7 -->
              @if(!empty($homeSlider->sub_title))
              <div class="tp-caption   tp-resizeme" id="slide-902-layer-7" data-x="['left','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['top','bottom','bottom','bottom']" data-voffset="['0','100','80','70']" data-width="['none','460','100%','100%']" data-height="none" data-whitespace="normal" data-type="text" data-basealign="slide" data-responsive_offset="off" data-frames='[{"delay":"+690","speed":750,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},
                                        {"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['center','center','center','center']" data-paddingtop="[5,5,5,5]" data-paddingright="[5,5,5,5]" data-paddingbottom="[5,5,5,5]" data-paddingleft="[5,5,5,5]" style="z-index: 12; white-space: normal; font-size: 16px; line-height: 22px;
                                        font-weight: 400; color: #fff; letter-spacing: 0px; display: inline-block;">
                {!! $homeSlider->sub_title !!}
              </div>
              @endif
            </div>

          </div>

        </div>
        <!-- LAYER NR. 8 -->
        <!-- Border Part -->
        <!-- <div class="tp-caption tp-shape tp-shapewrapper " id="slide-902-layer-8" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full" data-height="full" data-whitespace="nowrap" data-visibility="['on','on','off','off']" data-type="shape" data-basealign="slide" data-responsive_offset="off" data-responsive="off" data-frames='[{"delay":50,"speed":100,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"opacity:0;","ease":"Power3.easeIn"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;background-color:rgba(0, 0, 0, 0);border-color:rgb(255,255,255);border-style:solid;border-width:0px 80px 80px 80px;">
        </div> -->

      </li>
      @endforeach
      @endif


    </ul>
    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
  </div>
</div>
<!-- SLIDER END -->

<!-- Facts Start -->
<div class="container-xxl py-5 mt-5">
  <div class="container pt-5">
    <div class="row g-4">
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="fact-item text-center bg-light h-100 p-5 pt-0">
          <div class="fact-icon">
            <img src="{{ asset('frontend/img/icons/a2.png') }}" alt="Icon">
          </div>
          <h3 class="mb-3">Design Approach</h3>
          <p class="mb-0">We blend creativity and functionality to craft spaces that inspire and endure,
            Our designs prioritize sustainability and innovation.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="fact-item text-center bg-light h-100 p-5 pt-0">
          <div class="fact-icon">
            <img src="{{ asset('frontend/img/icons/a3.png') }}" alt="Icon">
          </div>
          <h3 class="mb-3">Innovative Solutions</h3>
          <p class="mb-0">We leverage cutting-edge technology and forward-thinking designs to transform
            visions into reality.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="fact-item text-center bg-light h-100 p-5 pt-0">
          <div class="fact-icon">
            <img src="{{ asset('frontend/img/icons/a1.png') }}" alt="Icon">
          </div>
          <h3 class="mb-3">Project Management</h3>
          <p class="mb-0">Our meticulous project management ensures timely delivery and exceptional
            quality at every stage.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Facts End -->

<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6 wow slideInLeft" data-wow-delay="0.1s">
        <div class="about-img">
          <img class="img-fluid" src="{{ asset('frontend/img/pilot.webp') }}" alt="">
          <img class="img-fluid" src="{{ asset('frontend/img/minp.webp') }}" alt="">
        </div>
      </div>
      <div class="col-lg-6 wow slideInRight" data-wow-delay="0.1s">
        <h3 class="section-title">About Us</h3>
        <!-- <h1 class="display-5 mb-4 font-40 text-uppercase"></h1> -->
        <p class=" text-justify">Pipra is a professional Consultancy and Construction farm That provides one-stop building solutions all over Bangladesh.
          We are a group of professional Architects and Engineers with extensive expertise in the area of Architecture, Engineering as well as Construction with Material Solutions.</p>
        <p class=" text-justify">
          Since starting the consultancy and construction services, our team of architects and engineers have designed and supervised numerous residential, commercial, institutional as well as spiritual projects, and so on. We have comprehensive experience in managing projects from the initial design phase to completion and are committed to providing a splendid experience to our clients.
          Pipra is pledged to offer you preeminent services beyond your expectations.
        </p>
        <div class="d-flex align-items-center mb-5">
          <div class="d-flex flex-shrink-0 align-items-center justify-content-center border border-5 border-primary" style="width: 120px; height: 120px;">
            <h1 class="display-1 mb-n2" data-toggle="counter-up">3</h1>
          </div>
          <div class="ps-4">
            <h3>Years</h3>
            <h3>Working</h3>
            <h3 class="mb-0">Experience</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About End -->


<!-- WELCOME SECTION START -->
<div class="section-full clearfix p-t80  bg-gray">
  <div class="container">
    <div class="section-content">
      <div class="row mb-5">
        <div class="col-lg-5 col-md-12 m-b30">
          <h3 class="section-title text-uppercase">WELCOME</h3>
          <!-- <h2 class="font-40 text-uppercase">
            We are creative Building - Design Company
          </h2> -->
          <p class="text-justify">We are creative Building - Design Company, We pride ourselves on delivering innovative and aesthetically
            pleasing architectural
            solutions tailored to your needs. Our team of skilled architects and designers work closely
            with you to transform your vision into reality, creating functional and inspiring spaces.

          </p>
        </div>

        <div class="col-lg-7 col-md-12">
          <div class="m-carousel-1 m-l100">
            <div class="owl-carousel home-carousel-1 owl-btn-vertical-center">
              <!-- COLUMNS 1 -->
              @foreach($welcomeSliders as $welcomeSlider)
              <div class="item">
                <div class="ow-img wt-img-effect zoom-slow">
                  <a href="#"><img src="{{ $welcomeSlider->file }}" alt=""></a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="hilite-title p-lr20 m-tb20 text-right text-uppercase bdr-gray bdr-right">
      </div>
    </div>
  </div>
</div>
<!-- WELCOME  SECTION END -->

<!-- Service Start -->
<div class="container-xxl p-t80 mb-4">
  <div class="container">
    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
      <h3 class="section-title">Our Services</h3>
      <!-- <h1 class="display-5 mb-4 font-40 text-uppercase">We Focused On Modern Architecture And Interior Design</h1> -->
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6 wow fadeInUp service-card" data-wow-delay="0.1s">
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

<!-- why choose us Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <h3 class="section-title">Why Choose Us!</h3>
        <!-- <h1 class="display-5 mb-4 font-40 text-uppercase">Why You Should Trust Us? Learn More About Us!</h1> -->
        <div class="row g-4">
          <div class="col-12">
            <div class="d-flex align-items-start">
              <img class="flex-shrink-0" src="{{ asset('frontend/img/icons/icon-2.png') }}" alt="Icon">
              <div class="ms-4">
                <h3>Expertise</h3>
                <p class="mb-0 text-justify">We have a team of experienced architects who are skilled in various architectural styles, design principles, and construction techniques. Our expertise ensures that your project is in capable hands.</p>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="d-flex align-items-start">
              <img class="flex-shrink-0" src="{{ asset('frontend/img/icons/icon-3.png') }}" alt="Icon">
              <div class="ms-4">
                <h3>Collaborative Approach</h3>
                <p class="mb-0 text-justify">We believe in collaboration and working closely with our clients to understand their needs, preferences, and goals. By involving you in the design process, we ensure that the final product meets your expectations and reflects your individuality</p>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="d-flex align-items-start">
              <img class="flex-shrink-0" src="{{ asset('frontend/img/icons/icon-4.png') }}" alt="Icon">
              <div class="ms-4">
                <h3>Project Management</h3>
                <p class="mb-0 text-justify">From the initial concept to the final execution, we pay attention to every detail to ensure the highest quality result. We understand that even the smallest details can make a big difference in the overall success of a project</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="feature-img">
          <img class="img-fluid" src="{{ asset('frontend/img/why1.webp') }}" alt="">
          <img class="img-fluid" src="{{ asset('frontend/img/why2.webp') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- why choose us End -->

<!-- LATEST PRJECTS SLIDER START -->
<div class="section-full p-t80 p-lr80 latest_project-outer square_shape3">

  <!-- TITLE START -->
  <div class="section-head text-left wow fadeInRight" data-wow-delay="0.1s">
    <div class="row">
      <div class="col-xl-5 col-lg-12 col-md-12">
        <!-- <h3 class="text-uppercase font-36">Latest Project</h3> -->
        <h3 class="section-title">Latest Project</h3>
        <div class="wt-separator-outer">
          <div class="wt-separator bg-black"></div>
        </div>
      </div>
      <div class="col-xl-7 col-lg-12 col-md-12">
        <ul class="btn-filter-wrap">
          <a href="{{route('projects')}}">
            <li class="btn-filter btn-active" style="color: #BF2429;">All Project</li>
          </a>
        </ul>
      </div>
    </div>
  </div>
  <!-- TITLE END -->

  <!-- IMAGE CAROUSEL START -->
  <div class="section-content wow fadeInRight" data-wow-delay="0.3s">
    <div class="owl-carousel owl-carousel-filter  owl-btn-bottom-left">
      <!-- COLUMNS 1 -->
      @foreach($projects as $project)
      <div class="item fadingcol building-col">
        <div class="wt-img-effect ">
          <img src="{{ $project->file }}" alt="">
          <div class="overlay-bx-2 ">
            <div class="line-amiation">
              <div class="text-white  font-weight-300 p-a40">
                <h2><a href="project-detail.html" class="text-white font-20 letter-spacing-4 text-uppercase">{{$project->title}}</a></h2>
                <p>{!!$project->sub_title!!}
                </p>
                <a href="{{route('project.details', $project->id)}}" class="v-button letter-spacing-4 font-12 text-uppercase p-l20">Read
                  More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>

  <div class="hilite-title p-lr20 m-tb20 text-right text-uppercase bdr-gray bdr-right">
    <strong>Awesome</strong>
    <span class="text-black">Designs</span>
  </div>
</div>
<!-- LATEST PRJECTS SLIDER END -->


<!-- WHO WE ARE SECTION START -->
@php
$img1 = 'frontend/img/background/ptn-1.png';
$img2 = 'frontend/img/background/29.webp';
@endphp
<div class="section-full p-t140 clearfix bg-repeat tm-wo-we-r" style="background-image:url('{{ asset($img1) }}');">
  <div class="container-fluid">
    <div class="section-content">
      <div class="row d-flex align-items-center">
        <div class="col-xl-6 col-lg-5 col-md-12">
          <div class="wt-left-part">
            <div class="">
              <!-- <span class="font-30 font-weight-300 d-block m-b10 section-title"> </span> -->
              <!-- <h2 class="font-40 text-uppercase ">Wo we are</h2> -->
              <h3 class="section-title">Who we are</h3>
              <p class="text-justify">We are creative architecture Studio, We are a creative architecture studio dedicated to transforming ideas into stunning
                and functional spaces. Our innovative designs and meticulous attention to detail
                ensure that every project reflects our clients' unique visions and needs.
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-7 col-md-12">
          <div class="m-carousel-2">
            <div class="owl-carousel carousel-hover home-carousel-2 owl-btn-vertical-center">
              <!-- COLUMNS 1 -->
              @foreach($weareSliders as $weareSlider)
              <div class="item">
                <div class="wt-box">
                  <div class="ow-img wt-carousel-block gradi-black">
                    <img src="{{ $weareSlider->file }}" alt="">
                    <div class="p-a50 wt-carousel-info text-white">
                      <div class="carousel-line">
                        <h2 class="font-28 font-weight-400 m-b10">{{$weareSlider->title}}</h2>
                        <p class="m-b0">{!!$weareSlider->sub_title!!}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="carousel-bg-img">
              <img src="{{ asset('frontend/img/slider-corner.jpg') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="hilite-title p-lr20 m-tb20 text-left text-uppercase bdr-gray bdr-left">
      <strong>30+ Projects</strong>
      <span class="text-black">Completed</span>
    </div>
  </div>
</div>
<!-- WHO WE ARE SECTION END -->


<!-- COMPANY DETAIL SECTION START -->
<div class="section-full p-t80 p-b50 overlay-wraper bg-top-center bg-parallax" data-stellar-background-ratio="0.5" style="background-image:url('{{ asset($img2) }}');">
  <div class="overlay-main opacity-05 bg-black"></div>
  <div class="container ">
    <div class="row">

      <div class="col-lg-6 col-md-12 m-b30">
        <div class="some-facts">
          <div class="text-white">
            <!-- <span class="font-30 font-weight-300 text-uppercase">Mission</span> -->
            <h3 class="section-title">Mission</h3>
            <!-- <h2 class="font-50">
                                Intresting Facts
                            </h2> -->
            <p class="font-15 font-weight-300 text-justify">"At Pipra, our mission is to deliver innovative, sustainable, and high-quality consultancy and construction services that exceed our clients' expectations. We strive to foster long-term relationships built on trust, professionalism, and a commitment to excellence in every project we undertake"
            </p>

            <!-- <span class="font-30 font-weight-300 text-uppercase">Vision</span> -->
            <h3 class="section-title">Vision</h3>
            <!-- <h2 class="font-50">
                                Intresting Facts
                            </h2> -->
            <p class="font-15 font-weight-300  text-justify">"Our vision is to be a leading consultancy and construction company recognized for our integrity, innovation, and ability to transform ideas into landmark projects. We aim to shape the future of the industry by setting new standards in quality, efficiency, and sustainability, while making a positive impact on the communities we serve"
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-12 some-facts-counter">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="wt-icon-box-wraper p-a10 text-white m-b30">
              <div class="icon-content text-center">
                <div class="font-40 font-weight-600 m-b5"><span class="counter">29</span>
                </div>
                <div class="wt-separator-outer m-b20">
                  <div class="wt-separator bg-white"></div>
                </div>
                <span class="text-uppercase">Happy Clients</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="wt-icon-box-wraper p-a10 text-white m-b30">
              <div class="icon-content text-center">
                <div class="font-40 font-weight-600 m-b5"><span class="counter">32</span>
                </div>
                <div class="wt-separator-outer m-b20">
                  <div class="wt-separator bg-white"></div>
                </div>
                <span class="text-uppercase">Finished projects</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="wt-icon-box-wraper p-a10 text-white m-b30">
              <div class="icon-content text-center">
                <div class="font-40 font-weight-600 m-b5"><span class="counter">60</span>
                </div>
                <div class="wt-separator-outer m-b20">
                  <div class="wt-separator bg-white"></div>
                </div>
                <span class="text-uppercase">Ongoing Project</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- COMPANY DETAIL SECTION End -->


<!-- TESTIMONIALS SECTION START -->
<div class="section-full p-t80 clearfixbg-repeat " style="background-image:url('{{asset($img1)}}');">
  <div class="container">
    <div class="section-content">
      <!-- TITLE START -->
      <div class="section-head text-left">
        <!-- <h2 class="text-uppercase font-36">Testimonials</h2> -->
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


<div class="cmodal-overlay">
  <div class="cmodal">

    <a class="close-cmodal">
      <svg viewBox="0 0 20 20">
        <path fill="#000000"
          d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
        </path>
      </svg>
    </a>

    <div class="cmodal-content">
      <img src="{{ asset('frontend/img/banner.jpeg') }}" alt="Full-Screen Image" class="cmodal-image">
    </div>

  </div>
</div>
@endsection

@section('page-js')
<script>
  //$(document).ready(function() {
    // Show the modal on page load
    //$('#with-form').modal('show');
    // Automatically close the modal after 5 seconds
   // setTimeout(function() {
      // Add slide-out class to trigger slide-out animation
    //  $('#with-form').addClass('slide-out');

      // Hide the modal after the slide-out animation completes
      //setTimeout(function() {
        //$('#with-form').modal('hide');
      //}, 500); // Duration should match the slideOutToRight animation duration
    //}, 3000);
  //});
  $(document).ready(function() {
    var url = "{{route('views.count')}}";
    $.get(url, function(data) {});
  });
  
    // Get the current date
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth();
    const currentYear = currentDate.getFullYear();

    if (currentMonth === 0 && currentYear === 2025) {

        var elements = $('.cmodal-overlay, .cmodal');

        elements.addClass('active');

        $('.close-cmodal').click(function () {
            elements.removeClass('active');
        });
    }

</script>
@endsection