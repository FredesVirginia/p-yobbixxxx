@extends('app.layout.app', [
    'title' => 'Dash | Yobbix',
    'pageTitle' => 'Vista Principal',
    'sidebar' => false,
])



@section('css')
@endsection

@section('js')
@endsection

@section('content')
     <div class="site-wrapper overflow-hidden ">
    <!-- Header start  -->
    <!-- Header Area -->
  
    <!-- navbar- -->
    <!-- Login Modal -->
   
    <!-- Header start end -->
    <!-- Hero Area -->
    <div class="">
      <div class="pos-abs-tr h-100">
        <img src="./imgs/globe-pattern.png" alt="" class="h-100">
      </div>
      <div class="container position-static">
        <div class="row position-relative align-items-center position-static">
          <div class="col-xxl-7 col-xl-8 col-lg-9 pt-lg-23 pb-lg-33 pb-md-28 pb-xs-26 pb-29 pt-md-20" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
            <div class="row">
              <div class="col-xxl-8 col-xl-7 col-md-8 col-sm-10">
                <div class="text-primary font-size-5 font-weight-semibold mb-7">
                  #4923 jobs are available right now
                </div>
                <h1 class="font-size-11 mb-9 text-black-2">Find the most exciting jobs.</h1>
                <p class="font-size-5">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative to</p>
              </div>
            </div>
          </div>
          <!-- Hero Form -->
          <div class="col-lg-11 col-12 translateY-50 pos-abs-bl">
            <form action="/" class="search-form" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
              <div class="filter-search-form-2 bg-white rounded-sm shadow-7 pr-8 py-7 pl-6">
                <div class="filter-inputs">
                  <div class="form-group position-relative">
                    <input class="form-control focus-reset pl-13" type="text" id="keyword" placeholder="Type Job title, keywords">
                    <span class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6"><i class="icon icon-zoom-2 text-primary font-weight-bold"></i></span>
                  </div>
                  <!-- .select-city starts -->
                  <div class="form-group position-relative">
                    <select name="country" id="country" class="nice-select pl-13 h-100 arrow-3 font-size-4">
                      <option data-display="City, state, zip code or (Remote)">City</option>
                      <option value="">United States of America</option>
                      <option value="">United Arab Emirates</option>
                      <option value="">Bangladesh</option>
                      <option value="">Pakistan</option>
                    </select>
                    <span class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6"><i class="icon icon-pin-3 text-primary font-weight-bold"></i></span>
                  </div>
                  <!-- ./select-city ends -->
                </div>
                <div class="button-block">
                  <button class="btn btn-primary line-height-reset h-100 btn-submit w-100 text-uppercase">Search</button>
                </div>
              </div>
            </form>
          </div>
          <!-- End Hero Form -->
        </div>
      </div>
    </div>
    <!-- Hero Area -->
    <!-- category Area -->
    <div class="pb-13 pb-lg-25 bg-gradient-2">
      <!-- Company Area Start -->
      <div class="pt-29 pt-lg-30 pb-10 pb-lg-22">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="section-title mb-9 text-center">
                <h5 class="font-size-5 font-weight-normal text-gray">
                  Get hired in top companies
                </h5>
              </div>
            </div>
          </div>
          <!-- Brand Logos -->
          <div class="row align-items-center justify-content-center justify-content-lg-between gr-opacity-5">
            <!-- Single Brand -->
            <div class="single-brand-logo mx-5 my-6" data-aos="fade-in" data-aos-duration="800" data-aos-once="true">
              <img src="./image/l1/png/brand-light-logo-1.png" alt="" />
            </div>
            <!-- Single Brand -->
            <div class="single-brand-logo mx-5 my-6" data-aos="fade-in" data-aos-duration="800" data-aos-delay="300" data-aos-once="true">
              <img src="./image/l1/png/brand-light-logo-2.png" alt="" />
            </div>
            <!-- Single Brand -->
            <div class="single-brand-logo mx-5 my-6" data-aos="fade-in" data-aos-duration="800" data-aos-delay="500" data-aos-once="true">
              <img src="./image/l1/png/brand-light-logo-3.png" alt="" />
            </div>
            <!-- Single Brand -->
            <div class="single-brand-logo mx-5 my-6" data-aos="fade-in" data-aos-duration="800" data-aos-delay="700" data-aos-once="true">
              <img src="./image/l1/png/brand-light-logo-4.png" alt="" />
            </div>
            <!-- Single Brand -->
            <div class="single-brand-logo mx-5 my-6" data-aos="fade-in" data-aos-duration="800" data-aos-delay="900" data-aos-once="true">
              <img src="./image/l1/png/brand-light-logo-5.png" alt="" />
            </div>
            <!-- Single Brand -->
            <div class="single-brand-logo mx-5 my-6" data-aos="fade-in" data-aos-duration="800" data-aos-delay="1200" data-aos-once="true">
              <img src="./image/l1/png/brand-light-logo-6.png" alt="" />
            </div>
          </div>
          <!-- End Brand Logos -->
        </div>
      </div>
      <!-- Company Area End -->
      <div class="">
        <div class="container">
          <hr class="pt-13 pt-lg-20">
          <!-- Section Top -->
          <div class="row align-items-center justify-content-center">
            <!-- Section Title -->
            <div class="col-12 col-xl-6 col-lg-7 col-md-9">
              <div class="text-center mb-12 mb-lg-17">
                <h2 class="font-size-10 font-weight-bold mb-8">Explore by category</h2>
                <p class="font-size-5 px-5 px-lg-7 px-xl-9 px-xxl-15 mb-6">Leverage agile frameworks to provide a
                  robust synopsis for high level overviews to start.</p>
              </div>
            </div>
          </div>
          <!-- End Section Top -->
          <div class="row justify-content-center" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
            <!-- Single Category -->
            <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
              <a href="#" class="bg-white border border-color-2 rounded-4 pl-5 pt-10 pb-3 px-2 hover-shadow-2 mb-9 d-block w-100 text-center">
                <div class="text-white bg-blue square-70 rounded-4 mb-7 font-size-7 text-center mx-auto">
                  <i class="fa fa-briefcase"></i>
                </div>
                <!-- Category Content -->
                <div class="">
                  <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Business Development</h5>
                  <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
                </div>
              </a>
            </div>
            <!-- End Single Category -->
            <!-- Single Category -->
            <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
              <a href="#" class="bg-white border border-color-2 rounded-4 pl-5 pt-10 pb-3 px-2 hover-shadow-2 mb-9 d-block w-100 text-center">
                <div class="text-white bg-spray square-70 rounded-4 mb-7 font-size-7 text-center mx-auto">
                  <i class="fa fa-headset"></i>
                </div>
                <!-- Category Content -->
                <div class="">
                  <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Customer Service</h5>
                  <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
                </div>
              </a>
            </div>
            <!-- End Single Category -->
            <!-- Single Category -->
            <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
              <a href="#" class="bg-white border border-color-2 rounded-4 pl-5 pt-10 pb-3 px-2 hover-shadow-2 mb-9 d-block w-100 text-center">
                <div class="text-white bg-coral square-70 rounded-4 mb-7 font-size-7 text-center mx-auto">
                  <i class="fa fa-layer-group"></i>
                </div>
                <!-- Category Content -->
                <div class="">
                  <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Development</h5>
                  <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
                </div>
              </a>
            </div>
            <!-- End Single Category -->
            <!-- Single Category -->
            <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
              <a href="#" class="bg-white border border-color-2 rounded-4 pl-5 pt-10 pb-3 px-2 hover-shadow-2 mb-9 d-block w-100 text-center">
                <div class="text-white bg-red square-70 rounded-4 mb-7 font-size-7 text-center mx-auto">
                  <i class="fa fa-pen-nib"></i>
                </div>
                <!-- Category Content -->
                <div class="">
                  <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Design</h5>
                  <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
                </div>
              </a>
            </div>
            <!-- End Single Category -->
            <!-- Single Category -->
            <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
              <a href="#" class="bg-white border border-color-2 rounded-4 pl-5 pt-10 pb-3 px-2 hover-shadow-2 mb-9 d-block w-100 text-center">
                <div class="text-white bg-orange square-70 rounded-4 mb-7 font-size-7 text-center mx-auto">
                  <i class="fa fa-rocket"></i>
                </div>
                <!-- Category Content -->
                <div class="">
                  <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Marketing &amp; Management</h5>
                  <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
                </div>
              </a>
            </div>
            <!-- End Single Category -->
            <!-- Single Category -->
            <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
              <a href="#" class="bg-white border border-color-2 rounded-4 pl-5 pt-10 pb-3 px-2 hover-shadow-2 mb-9 d-block w-100 text-center">
                <div class="text-white bg-yellow square-70 rounded-4 mb-7 font-size-7 text-center mx-auto">
                  <i class="fa fa-location-arrow"></i>
                </div>
                <!-- Category Content -->
                <div class="">
                  <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Sales &amp; Communication</h5>
                  <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
                </div>
              </a>
            </div>
            <!-- End Single Category -->
            <!-- Single Category -->
            <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
              <a href="#" class="bg-white border border-color-2 rounded-4 pl-5 pt-10 pb-3 px-2 hover-shadow-2 mb-9 d-block w-100 text-center">
                <div class="text-white bg-turquoise square-70 rounded-4 mb-7 font-size-7 text-center mx-auto">
                  <i class="icon icon-sidebar-2"></i>
                </div>
                <!-- Category Content -->
                <div class="">
                  <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Project Management</h5>
                  <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
                </div>
              </a>
            </div>
            <!-- End Single Category -->
            <!-- Single Category -->
            <div class="col-12 col-xl-3 col-lg-4 col-sm-6 col-xs-8">
              <a href="#" class="bg-white border border-color-2 rounded-4 pl-5 pt-10 pb-3 px-2 hover-shadow-2 mb-9 d-block w-100 text-center">
                <div class="text-white bg-green square-70 rounded-4 mb-7 font-size-7 text-center mx-auto">
                  <i class="fa fa-user"></i>
                </div>
                <!-- Category Content -->
                <div class="">
                  <h5 class="font-size-5 font-weight-semibold text-black-2 line-height-1">Human Resource </h5>
                  <p class="font-size-4 font-weight-normal text-gray"><span>415</span> Vacancy</p>
                </div>
              </a>
            </div>
            <!-- End Single Category -->
          </div>
          <div class="row">
            <div class="col-12">
              <div class="text-center pt-5 pt-lg-13">
                <a class="btn btn-outline-black-2 btn-lg text-uppercase" href="#">Explore All</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- category Area -->
    <!-- ContentOne Area -->
    <section class="pt-13 pt-lg-30 pb-13 pb-lg-30">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 col-md-8 col-sm-10 col-xs-11 mb-9 mb-lg-0" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
            <!-- content-1 left-content start -->
            <div class="position-relative pr-lg-20 pr-xs-15 pr-9 ">
              <!-- content img start -->
              <img src="image/l2/png/content-2-img1.png" alt="" class="w-100">
              <!-- content img end -->
              <!-- abs-content start -->
              <div class="abs-content pos-abs-br bg-white shadow-2 pl-7 pt-8 pb-1 pr-11 max-width-px-311 rounded mb-15 mb-xs-18 mb-lg-15 mb-xl-18">
                <!-- media start -->
                <div class="media mb-5">
                  <!-- check-mark start -->
                  <span class="check-mark bg-yellow-2 circle-41">
                                    <i class="fas fa-check text-white  font-size-6"></i>
                                </span>
                  <!-- check-mark end -->
                  <!-- media body start -->
                  <div class="media-body pl-5">
                    <h6 class="mb-0 font-size-3 text-green text-uppercase">Job alert!</h6>
                    <p class="mb-0 font-size-4 text-black-2">104 new jobs are available in this week!</p>
                  </div>
                  <!-- media body start -->
                </div>
                <!-- media end -->
              </div>
              <!-- abs-content end -->
            </div>
            <!-- content-1 left-content end -->
          </div>
          <div class="col-xl-5 col-lg-6 col-md-8 col-xs-10" data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
            <!-- content-1 start -->
            <div class="content-1 pl-xl-5 pl-xxl-11 pr-xxl-10">
              <!-- content-1 section-title start -->
              <h2 class="font-size-9 mb-md-15 mb-13">Help you to get the <br class="d-none d-sm-block">
                            best job that fits you</h2>
              <!-- content-1 section-title end -->
              <!-- media start -->
              <div class="media mb-11">
                <!-- media icon start -->
                <div class="media-icon px-6 py-5 bg-green-opacity-2 rounded-5">
                  <i class="icon icon-layout-11 text-green"></i>
                </div>
                <!-- media icon start -->
                <!-- media body start -->
                <div class="media-body pl-7">
                  <h5 class="mb-5 h5">#1 Jobs site in UK</h5>
                  <p class="mb-0 font-size-4 text-default-color">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative</p>
                </div>
                <!-- media body start -->
              </div>
              <!-- media end -->
              <!-- media start -->
              <div class="media mb-11">
                <!-- media icon start -->
                <div class="media-icon px-6 py-5 bg-yellow-2-opacity-2 rounded-5">
                  <i class="fa fa-search text-yellow-2"></i>
                </div>
                <!-- media icon start -->
                <!-- media body start -->
                <div class="media-body pl-7">
                  <h5 class="mb-5 h5">Seamless searching</h5>
                  <p class="mb-0 font-size-4 text-default-color">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test.</p>
                </div>
                <!-- media body start -->
              </div>
              <!-- media end -->
              <!-- media start -->
              <div class="media">
                <!-- media icon start -->
                <div class="media-icon px-6 py-5 bg-red-opacity-2 rounded-5">
                  <i class="fa fa-industry text-red"></i>
                </div>
                <!-- media icon start -->
                <!-- media body start -->
                <div class="media-body pl-7">
                  <h5 class="mb-5 h5">Hired in top companies</h5>
                  <p class="mb-0 font-size-4 text-default-color">Podcasting operational change management inside of workflows to establish.</p>
                </div>
                <!-- media body start -->
              </div>
              <!-- media end -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ContentOne Area -->
    <!-- featuredJobOne Area -->







    
   




    <!-- featuredJobOne Area -->
    <!-- Blog area function start -->
   
    <!-- Blog area function end -->
    <!-- ContentTwo Area -->
    <section class=" bg-green position-relative">
      <div class="w-lg-50 ml-lg-auto">
        <!-- gallery start -->
        <div class="gallery" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300" data-aos-once="true">
          <!-- this content will absolute from right and top -->
          <div class="single-item">
            <img src="./imgs/gallery-img1.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img2.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img3.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img4.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img5.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img6.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img7.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img8.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img9.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img10.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img11.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img12.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img13.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img14.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img15.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img16.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img17.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img18.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img19.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img20.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img21.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img22.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img23.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img24.jpg" alt="">
          </div>
          <div class="single-item">
            <img src="./imgs/gallery-img25.jpg" alt="">
          </div>
        </div>
        <!-- gallery end -->
      </div>
      <div class="container pos-lg-abs-c pl-9 pt-11 pb-13 py-lg-0">
        <div class="row">
          <div class="col-xxl-5 col-lg-6 col-md-8 mx-auto mx-lg-0" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
            <!-- content-2 start -->
            <div class="content-2 pr-lg-5 pr-xl-18 pr-xxl-10 text-center text-lg-left">
              <!-- content-2 section title start -->
              <p class="text-white font-size-4 font-weight-semibold mb-8">
                Looking for an expert for your company?
              </p>
              <h2 class="font-size-9 text-white mb-8">
                Get applications from the world best talents.
              </h2>
              <p class="text-white font-size-5 mb-12">
                Capitalize on low hanging fruit to identify a ballpark value added activity to beta test.
                Override the digital divide with additional clickthroughs from DevOps.
              </p>
              <!-- content-2 section title end -->
              <!-- content-2 btn start -->
              <a class="btn btn-white btn-h-60 text-black-2 w-180 rounded-5 text-uppercase mx-auto mx-lg-0" href="#">Post a Job</a>
              <!-- content-2 btn end -->
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ContentTwo Area -->
    <!-- footer area function start -->
    <!-- cta section -->
    
    <!-- footer area function end -->
  </div>
@endsection
