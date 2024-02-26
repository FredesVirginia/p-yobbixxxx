@extends('app.layout.app', [
    'title' => 'Empresa | Yobbix',
    'pageTitle' => 'Empresa',
    'sidebar' => false,
])



@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <div class="col-12 mt-5 dark-mode-texts">
        <div class="mb-9">
            <a class="d-flex align-items-center ml-4" href="">
                <i class="icon icon-small-left bg-white circle-40 mr-5 font-size-7 text-black font-weight-bold shadow-8"></i>
                <span class="text-uppercase font-size-3 font-weight-bold text-gray">Búsqueda</span>
            </a>
        </div>
    </div>

    {{-- <h1>Empresa</h1> --}}
    <div class="col-12 col-xl-9 col-lg-8">
        <div class="bg-white rounded-4 pt-11 shadow-9">
            <div class="d-xs-flex align-items-center pl-xs-12 mb-8 text-center text-xs-left">
                <a class="mr-xs-7 mb-5 mb-xs-0" href="#">
                    <img class="square-72 rounded-6" src="./image/l2/png/featured-job-logo-1.png" alt="">
                </a>
                <div class="">
                    <h2 class="mt-xs-n5">
                        <a class="font-size-6 text-black-2 font-weight-semibold" href="">
                            {{ $company->name }} </a>
                    </h2>

                    <span class="mb-0 text-gray font-size-4">
                        {{ $company->place->name }}
                    </span>
                </div>
            </div>
            <!-- Tab Section Start -->
            <ul class="nav border-bottom border-mercury pl-12" id="myTab" role="tablist">
                <li class="tab-menu-items nav-item pr-12">
                    <a class="active text-uppercase font-size-3 font-weight-bold text-default-color py-3" id="home-tab1"
                        data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">Company</a>
                </li>
                <li class="tab-menu-items nav-item pr-12">
                    <a class="text-uppercase font-size-3 font-weight-bold text-default-color py-3" id="profile-tab"
                        data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                        aria-selected="false">Jobs</a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content pl-12 pt-10 pb-7 pr-12 pr-xxl-24" id="myTabContent">
                <!--Prindico primer div  -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab1">

                    <div class="row">
                        <!-- Single Widgets Start -->
                        <div class="col-12 col-lg-4 col-md-4 col-xs-6">
                            <div class="mb-8">
                                <p class="font-size-4">Dirreccion</p>
                                <h5 class="font-size-4 font-weight-semibold text-black-2"> {{ $company->address }}</h5>
                            </div>
                            <div class="mb-8">
                                <p class="font-size-4">Categoria</p>
                                <h5 class="font-size-4 font-weight-semibold text-black-2"> {{ $company->myCategory() }}</h5>
                            </div>
                        </div>
                        <!-- Single Widgets End -->
                        <!-- Single Widgets Start -->
                        <div class="col-12 col-lg-4 col-md-4 col-xs-6">
                            <div class="mb-8">
                                <p class="font-size-4">Teléfono 1</p>
                                <h5 class="font-size-4 font-weight-semibold text-black-2"> {{ $company->phone1 }}</h5>
                            </div>
                            <div class="mb-8">
                                <p class="font-size-4">Sitio Web </p>
                                <div class="icon-link d-flex align-items-center">

                                    <a class="text-smoke circle-32 bg-concrete mr-5 hover-bg-green"
                                        href="{{ $company->web }}">
                                        <i class="fa fa-globe"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Widgets End -->
                        <!-- Single Widgets Start -->
                        <div class="col-12 col-lg-4 col-md-4 col-xs-6">
                            <div class="mb-8">
                                <p class="font-size-4">Teléfono 2 </p>
                                <h5 class="font-size-4 font-weight-semibold text-black-2">{{ $company->phone2 }}</h5>
                            </div>
                        </div>
                        <!-- Single Widgets End -->
                    </div>

                    <h4 class="font-size-6 mb-7 text-black-2 font-weight-semibold mt-5">Sobre {{$company->name}}</h4>
                    <div class="pt-5 ">
                        <p class="font-size-4 mb-8">
                            {{ $company->description }}
                        </p>
                    </div>

                </div>
                <!--Prindico Segundo div  -->


                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h4 class="font-size-6 mb-7 text-black-2 font-weight-semibold mt-5">No hay búsquedas publicadas.</h4>
                </div>
            </div>
            <!-- Tab Content End -->
            <!-- Tab Section End -->
        </div>
    </div>
@endsection
