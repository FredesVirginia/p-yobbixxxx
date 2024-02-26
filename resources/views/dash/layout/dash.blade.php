<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Landing Page Template</title>
    <link rel="shortcut icon" href="{{asset('imgs/ico.png')}}" type="image/x-icon">
    <!-- Bootstrap , fonts & icons  -->
    <link rel="stylesheet" href="{{asset('css/jc/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/icon-font/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/typography-font/typo.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome-5/css/all.css')}}">
    <!-- Plugin'stylesheets  -->
    <link rel="stylesheet" href="{{asset('css/jc/aos.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jc/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jc/nice-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jc/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jc/jquery-ui.css')}}">
    <!-- Vendor stylesheets  -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/jc/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/c.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset("css/datatable/datatables.css")}}"> --}}

    <!-- Custom stylesheet -->
    @yield('css')
</head>

<body>


    <div class="site-wrapper overflow-hidden bg-default-2">

        @include('app.layout._appheader')

        @include('dash.layout._sidebar')

        @include('dash.layout._sidebar')
        <div class="dashboard-main-container mt-25 mt-lg-31" id="dashboard-body" style="min-height:100vh;">
            <div class="container px-lg-13 px-6">

                <div class="row">
                    <div class="col-12">
                        <h5 class="font-size-6 font-weight-semibold mb-11">{{$pageTitle ?? "Título"}}</h5>
                    </div>
                </div>

                @yield('content')

            </div>
        </div>


    </div>

  <!-- Vendor Scripts -->
  <script src="{{asset('js/jc/vendor.min.js')}}"></script>
  <!-- Plugin's Scripts -->
  <script src="{{asset('js/jc/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('js/jc/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('js/jc/aos.min.js')}}"></script>
  <script src="{{asset('js/jc/slick.min.js')}}"></script>
  <script src="{{asset('js/jc/jquery.counterup.min.js')}}"></script>
  <script src="{{asset('js/jc/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('js/jc/jquery-ui.js')}}"></script>
  <!-- Activation Script -->
  <!-- <script src="{{asset('js/jc/drag-n-drop.js')}}"></script> -->
  <script src="{{asset('js/jc/custom.js')}}"></script>
  <script src="{{asset("js/datatable/jquery.dataTables.min.js")}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script> var PLACES_API_URL = "{{route('places.api')}}"; </script>

  @env('local')
    <script src="{{asset('js/fake_filler.js')}}"></script>
  @endenv

  <script src="{{asset('js/c.js')}}"></script>
  @yield('js')
</body>
