@extends('app.layout.app', [
    'title' => 'Dash | Yobbix',
    'pageTitle' => 'Vista Principal',
    'sidebar' => true,
])



@section('css')
@endsection

@section('js')

    <script>

        function salaryFormatter(value) {
            // returns 15.3k instead of 15300
            if (value >= 1000000) {
                return (value / 1000000).toFixed(1) + 'm';
            }else if(value >= 1000){
                return (value / 1000).toFixed(1) + 'k';
            }else{
                return value;
            }
        }

        function daysFormatter(start_date, end_date) {
            // returns days if less than 7, weeks if less than 9 weeks, or months
            var start = new Date(start_date);
            var end = new Date(end_date);
            var days = (end - start) / (1000 * 60 * 60 * 24);
            if (days < 7) {
                return days + ' dias';
            } else if (days < 63) {
                return Math.floor(days / 7) + ' sem.';
            } else {
                return Math.floor(days / 30) + ' meses';
            }
        }

        // function createdAtFormatter(){

        // }

        $(document).ready(function() {
            var salaryRanges = document.querySelectorAll('[data-salary-range]');
            salaryRanges.forEach(function(item) {
                var salary = item.getAttribute('data-salary-range').split('|');
                item.innerHTML = salaryFormatter(salary[0]) + ' - ' + salaryFormatter(salary[1]);
            });

            var daysRanges = document.querySelectorAll('[data-days-range]');
            daysRanges.forEach(function(item) {
                var days = item.getAttribute('data-days-range').split('|');
                item.innerHTML = daysFormatter(days[0], days[1]);
            });

            // moment("20111031", "YYYYMMDD").fromNow();
            var createdAt = document.querySelectorAll('[data-created-at]');
            createdAt.forEach(function(item) {
                var date = item.getAttribute('data-created-at');
                item.innerHTML = moment(date).fromNow();
            });
        });
    </script>

@endsection

@section('content')
    <div class="col-12 col-xl-8 col-lg-8">

        {{-- if errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Top Filter --}}
        <form action="/" class="search-form">
            <div class="filter-search-form-2 search-1-adjustment bg-white rounded-sm shadow-7 pr-6 py-6 pl-6">
                <div class="filter-inputs">
                    <div class="form-group position-relative w-lg-45 w-xl-40 w-xxl-45">
                        <input class="form-control focus-reset pl-13" type="text" placeholder="Profesión, palabra clave...">
                        <span class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6">
                            <i class="icon icon-zoom-2 text-primary font-weight-bold"></i>
                        </span>
                    </div>
                    <!-- .select-city starts -->
                    <div class="form-group position-relative w-lg-55 w-xl-60 w-xxl-55 search-places">
                        {{-- <select name="country" id="country" class="nice-select font-size-4 pl-13 h-100 arrow-3">
                            <option data-display="City, state, zip code or (Remote)">City</option>
                            <option value="">United States of America</option>
                            <option value="">United Arab Emirates</option>
                            <option value="">Bangladesh</option>
                            <option value="">Pakistan</option>
                        </select>
                        <span class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6">
                            <i class="icon icon-pin-3 text-primary font-weight-bold"></i>
                        </span> --}}
                        {{-- <input class="form-control focus-reset pl-13" type="text" placeholder="Guatemala"> --}}
                        <select name="place" class="font-size-4 pl-13 h-100 arrow-3 places2-select">
                            <option value="-1">Ciudad...</option>
                        </select>
                        <span class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6">
                            <i class="icon icon-pin-3 text-primary font-weight-bold"></i>
                        </span>
                    </div>
                    <!-- ./select-city ends -->
                </div>
                <div class="button-block">
                    <button class="btn btn-primary line-height-reset h-100 btn-submit w-100 text-uppercase">Buscar</button>
                </div>
            </div>
        </form>



        <div class="pt-12">

            {{-- Search results --}}
            <div class="d-flex align-items-center justify-content-between mb-6">
                <h5 class="font-size-4 font-weight-normal text-gray">
                    <span class="heading-default-color">120</span>
                    results for <span class="heading-default-color">Arquitecto</span>
                </h5>
                {{-- <div class="d-flex align-items-center result-view-type">
                    <a class="heading-default-color pl-5 font-size-6 hover-text-hitgray active" href="./search-list-1.html">
                        <i class="fa fa-list-ul"></i>
                    </a>
                    <a class="heading-default-color pl-5 font-size-6 hover-text-hitgray" href="./search-grid.html">
                        <i class="fa fa-th-large"></i>
                    </a>
                </div> --}}
            </div>


            @foreach ($jobs as $job)
                <div class="mb-8">
                    <!-- Single Featured Job -->
                    <div class="pt-9 px-xl-9 px-lg-7 px-7 pb-7 light-mode-texts bg-white rounded hover-shadow-3 ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="media align-items-center">
                                    <div class="square-72 d-block mr-8">
                                        <img src="{{asset('imgs/nophoto.jpg')}}" alt="" width="72" height="72">
                                    </div>
                                    <div>
                                        <h3 class="mb-0">
                                            <a class="font-size-6 heading-default-color" href="{{route('jobs.show',$job->url)}}">{{$job->title}}</a>
                                        </h3>
                                        <a href="{{route('profiles.company',$job->company->url)}}" class="font-size-3 text-default-color line-height-2">
                                            {{$job->company->name}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right pt-7 pt-md-5">
                                <div class="media justify-content-md-end">
                                    {{-- <div class="image mr-5 mt-2">
                                        <img src="./image/svg/icon-fire-rounded.svg" alt="">
                                    </div> --}}
                                    <p class="font-weight-bold font-size-7 text-hit-gray mb-0">
                                        Q<span class="text-black-2" data-salary-range='{{$job->salary_min}}|{{$job->salary_max}}'>-</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p class="font-size-3 px-md-10 pt-md-3" style="line-height:1.5">
                                {{substr($job->description, 0, 400)}}{{strlen($job->description) > 400 ? '...' : ''}}
                            </p>
                        </div>
                        <div class="row pt-8">
                            <div class="col-md-6">
                                <ul class="d-flex list-unstyled mr-n3 flex-wrap">
                                    <li>
                                        <a class="bg-regent-opacity-15 min-width-px-96 mr-3 text-center rounded-3 px-6 py-1 font-size-3 text-black-2 mt-2"
                                            href="#">Habilidad requerida</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="d-flex list-unstyled mr-n3 flex-wrap mr-n8 justify-content-md-end">
                                    <li class="mt-2 mr-8 font-size-small text-black-2 d-flex">

                                        <span class="font-weight-semibold">{{$job->place->name}}</span>
                                    </li>
                                    <li class="mt-2 mr-8 font-size-small text-black-2 d-flex">

                                        <span class="font-weight-semibold" data-days-range="{{$job->start_date}}|{{$job->end_date}}">-</span>
                                    </li>
                                    <li class="mt-2 mr-8 font-size-small text-black-2 d-flex">
                                        {{-- FIXME: add iconos --}}
                                        <span class="font-weight-semibold" data-created-at="{{$job->created_at}}" ></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Featured Job -->
                </div>
            @endforeach


        </div>

    </div>
@endsection
