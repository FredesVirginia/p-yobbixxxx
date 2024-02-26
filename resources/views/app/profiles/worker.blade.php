@extends('app.layout.app', [
    'title' => 'Trabajador | Yobbix',
    'pageTitle' => 'Trabajador',
    'sidebar' => false,
])



@section('css')
@endsection

@section('js')
@endsection

@section('content')

    <div class="col-12">

        <h1>EMPLEADO</h1>
        <div class="row justify-content-center">
            <div class="col-12 dark-mode-texts">
              <div class="mb-9">
                <a class="d-flex align-items-center ml-4" href="dashboard-main.html"> <i
                class="icon icon-small-left bg-white circle-40 mr-5 font-size-7 text-black font-weight-bold shadow-8">
              </i><span class="text-uppercase font-size-3 font-weight-bold text-gray">Back</span></a>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Left Sidebar Start -->
            <div class="col-12 col-xxl-3 col-lg-4 col-md-5 mb-11 mb-lg-0">
              <div class="pl-lg-5">
                <!-- Top Start -->
                <div class="bg-white shadow-9 rounded-4">
                  <div class="px-5 py-11 text-center border-bottom border-mercury">
                    <a class="mb-4" href="#"><img class="circle-54" src="./image/l3/png/pro-img.png" alt=""></a>
                    <h4 class="mb-0"><a class="text-black-2 font-size-6 font-weight-semibold" href="#">David Henricks</a></h4>
                    <p class="mb-8"><a class="text-gray font-size-4" href="#">Product Designer</a></p>
                    <div class="icon-link d-flex align-items-center justify-content-center flex-wrap">
                      <a class="text-smoke circle-32 bg-concrete mr-5 hover-bg-green" href="#"><i class="fab fa-linkedin-in"></i></a>
                      <a class="text-smoke circle-32 bg-concrete mr-5 hover-bg-green" href="#"><i class="fab fa-facebook-f"></i></a>
                      <a class="text-smoke circle-32 bg-concrete mr-5 hover-bg-green" href="#"><i class="fab fa-twitter"></i></a>
                      <a class="text-smoke circle-32 bg-concrete mr-5 hover-bg-green" href="#"><i class="fab fa-dribbble"></i></a>
                      <a class="text-smoke circle-32 bg-concrete mr-5 hover-bg-green" href="#"><i class="fab fa-behance"></i></a>
                    </div>
                  </div>
                  <!-- Top End -->
                  <!-- Bottom Start -->
                  <div class="px-9 pt-lg-5 pt-9 pt-xl-9 pb-5">
                    <h5 class="text-black-2 mb-8 font-size-5">Contact Info</h5>
                    <!-- Single List -->
                    <div class="mb-7">
                      <p class="font-size-4 mb-0">Location</p>
                      <h5 class="font-size-4 font-weight-semibold mb-0 text-black-2 text-break">New York , USA</h5>
                    </div>
                    <!-- Single List -->
                    <!-- Single List -->
                    <div class="mb-7">
                      <p class="font-size-4 mb-0">E-mail</p>
                      <h5 class="font-size-4 font-weight-semibold mb-0"><a class="text-black-2 text-break" href="mailto:name_ac@gmail.com">name_ac@gmail.com</a></h5>
                    </div>
                    <!-- Single List -->
                    <!-- Single List -->
                    <div class="mb-7">
                      <p class="font-size-4 mb-0">Phone</p>
                      <h5 class="font-size-4 font-weight-semibold mb-0"><a class="text-black-2 text-break" href="tel:+999565562">+999 565 562</a></h5>
                    </div>
                    <!-- Single List -->
                    <!-- Single List -->
                    <div class="mb-7">
                      <p class="font-size-4 mb-0">Website Linked</p>
                      <h5 class="font-size-4 font-weight-semibold mb-0"><a class="text-break" href="#">www.nameac.com</a></h5>
                    </div>
                    <!-- Single List -->
                  </div>
                  <!-- Bottom End -->
                </div>
              </div>
            </div>
            <!-- Left Sidebar End -->
            <!-- Middle Content -->
            <div class="col-12 col-xxl-6 col-lg-8 col-md-7 order-2 order-xl-1">
              <div class="bg-white rounded-4 shadow-9">
                <!-- Tab Section Start -->
               
                <!-- Tab Content -->
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!-- Excerpt Start -->
                    <div class="pr-xl-0 pr-xxl-14 p-5 px-xs-12 pt-7 pb-5">
                      <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold">About</h4>
                      <p class="font-size-4 mb-8">A talented professional with an academic background in IT and proven
                        commercial development experience as C++ developer since 1999. Has a sound knowledge of the software
                        development life cycle. Was involved in more than 140 software development outsourcing projects.</p>
                      <p class="font-size-4 mb-8">Programming Languages: C/C++, .NET C++, Python, Bash, Shell, PERL, Regular
                        expressions, Python, Active-script.</p>
                    </div>
                    <!-- Excerpt End -->
                    <!-- Skills -->
                    <div class="border-top pr-xl-0 pr-xxl-14 p-5 pl-xs-12 pt-7 pb-5">
                      <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold">Skills</h4>
                      <ul class="list-unstyled d-flex align-items-center flex-wrap">
                        <li>
                          <a class="bg-polar text-black-2  mr-6 px-7 mt-2 mb-2 font-size-3 rounded-3 min-height-32 d-flex align-items-center" href="#">Agile</a>
                        </li>
                        <li>
                          <a class="bg-polar text-black-2  mr-6 px-7 mt-2 mb-2 font-size-3 rounded-3 min-height-32 d-flex align-items-center" href="#">Wireframing</a>
                        </li>
                        <li>
                          <a class="bg-polar text-black-2  mr-6 px-7 mt-2 mb-2 font-size-3 rounded-3 min-height-32 d-flex align-items-center" href="#">Prototyping</a>
                        </li>
                        <li>
                          <a class="bg-polar text-black-2  mr-6 px-7 mt-2 mb-2 font-size-3 rounded-3 min-height-32 d-flex align-items-center" href="#">Information</a>
                        </li>
                        <li>
                          <a class="bg-polar text-black-2  mr-6 px-7 mt-2 mb-2 font-size-3 rounded-3 min-height-32 d-flex align-items-center" href="#">Waterfall Model</a>
                        </li>
                        <li>
                          <a class="bg-polar text-black-2  mr-6 px-7 mt-2 mb-2 font-size-3 rounded-3 min-height-32 d-flex align-items-center" href="#">New Layout</a>
                        </li>
                        <li>
                          <a class="bg-polar text-black-2  mr-6 px-7 mt-2 mb-2 font-size-3 rounded-3 min-height-32 d-flex align-items-center" href="#">Browsing</a>
                        </li>
                      </ul>
                    </div>
                    <!-- Skills End -->
                    <!-- Card Section Start -->
                    <div class="border-top p-5 pl-xs-12 pt-7 pb-5">
                      <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold">Work Exprerience</h4>
                      <!-- Single Card -->
                      <div class="w-100">
                        <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                          <div class="square-72 d-block mr-8 mb-7 mb-sm-0">
                            <img src="./image/l2/png/featured-job-logo-1.png" alt="">
                          </div>
                          <div class="w-100 mt-n2">
                            <h3 class="mb-0">
                              <a class="font-size-6 text-black-2 font-weight-semibold" href="#">Lead Product Designer</a>
                            </h3>
                            <a href="#" class="font-size-4 text-default-color line-height-2">Airabnb</a>
                            <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                              <a href="" class="font-size-4 text-gray mr-5">Jun 2017 - April 2020- 3 years</a>
                              <a href="" class="font-size-3 text-gray">
                                <span class="mr-4" style="margin-top: -2px"><img src="./image/svg/icon-loaction-pin-black.svg" alt=""></span>New York, USA</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Single Card End -->
                      <!-- Single Card -->
                      <div class="w-100">
                        <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                          <div class="square-72 d-block mr-8 mb-7 mb-sm-0">
                            <img src="./image/l1/png/feature-brand-1.png" alt="">
                          </div>
                          <div class="w-100 mt-n2">
                            <h3 class="mb-0">
                              <a class="font-size-6 text-black-2 font-weight-semibold" href="#">Senior UI/UX Designer</a>
                            </h3>
                            <a href="#" class="font-size-4 text-default-color line-height-2">Google Inc</a>
                            <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                              <a href="" class="font-size-3 text-gray mr-5">Jun 2017 - April 2020- 3 years</a>
                              <a href="" class="font-size-3 text-gray">
                                <span class="mr-4" style="margin-top: -2px"><img src="./image/svg/icon-loaction-pin-black.svg" alt=""></span>New York, USA</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Single Card End -->
                    </div>
                    <!-- Card Section End -->
                    <!-- Card Section Start -->
                    <div class="border-top p-5 pl-xs-12 pt-7 pb-5">
                      <h4 class="font-size-6 mb-7 mt-5 text-black-2 font-weight-semibold">Education</h4>
                      <!-- Single Card -->
                      <div class="w-100">
                        <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                          <div class="square-72 d-block mr-8 mb-7 mb-sm-0">
                            <img src="./image/svg/harvard.svg" alt="">
                          </div>
                          <div class="w-100 mt-n2">
                            <h3 class="mb-0">
                              <a class="font-size-6 text-black-2" href="#">Masters in Art Design</a>
                            </h3>
                            <a href="#" class="font-size-4 text-default-color line-height-2">Harvard University</a>
                            <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                              <a href="" class="font-size-3 text-gray mr-5">Jun 2017 - April 2020- 3 years</a>
                              <a href="" class="font-size-3 text-gray">
                                <span class="mr-4" style="margin-top: -2px"><img src="./image/svg/icon-loaction-pin-black.svg" alt=""></span>Brylin, USA</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Single Card End -->
                      <!-- Single Card -->
                      <div class="w-100">
                        <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                          <div class="square-72 d-block mr-8 mb-7 mb-sm-0">
                            <img src="./image/svg/mit.svg" alt="">
                          </div>
                          <div class="w-100 mt-n2">
                            <h3 class="mb-0">
                              <a class="font-size-6 text-black-2" href="#">Bachelor in Software Engineering </a>
                            </h3>
                            <a href="#" class="font-size-4 text-default-color line-height-2">Manipal Institute of Technology</a>
                            <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                              <a href="" class="font-size-3 text-gray mr-5">Fed 2012 - April 2016 - 4 years</a>
                              <a href="" class="font-size-3 text-gray">
                                <span class="mr-4" style="margin-top: -2px"><img src="./image/svg/icon-loaction-pin-black.svg" alt=""></span>New York, USA</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Single Card End -->
                    </div>
                    <!-- Card Section End -->
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- Excerpt Start -->
                    <div class="pr-xl-11 p-5 pl-xs-12 pt-9 pb-11">
                      <form action="/">
                        <div class="row">
                          <div class="col-12 mb-7">
                            <label for="name3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">Your Name</label>
                            <input id="name3" type="text" class="form-control" placeholder="Jhon Doe">
                          </div>
                          <div class="col-lg-6 mb-7">
                            <label for="email3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">E-mail</label>
                            <input id="email3" type="email" class="form-control" placeholder="example@gmail.com">
                          </div>
                          <div class="col-lg-6 mb-7">
                            <label for="subject3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">Subject</label>
                            <input id="subject3" type="text" class="form-control" placeholder="Special contract">
                          </div>
                          <div class="col-lg-12 mb-7">
                            <label for="message3" class="font-size-4 font-weight-semibold text-black-2 mb-5 line-height-reset">Message</label>
                            <textarea name="message" id="message3" placeholder="Type your message" class="form-control h-px-144"></textarea>
                          </div>
                          <div class="col-lg-12 pt-4">
                            <button class="btn btn-primary text-uppercase w-100 h-px-48">Send Now</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Excerpt End -->
                  </div>
                </div>
                <!-- Tab Content End -->
                <!-- Tab Section End -->
              </div>
            </div>
            <!-- Middle Content -->
            <!-- Right Sidebar Start -->
           
            <!-- Right Sidebar End -->
          </div>

    </div>

@endsection
