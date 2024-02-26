<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
  <!-- Custom stylesheet -->
  @yield('css')
</head>

<body>


    <div class="site-wrapper overflow-hidden bg-default-2">

        @include('app.layout._appheader')

        <div class="bg-default-1 pt-26 pt-lg-28 pb-13 pb-lg-25">
            <div class="container">
                <div class="row">

                        @if (isset($sidebar) && $sidebar)
                            @include('app.layout._appsidebar')
                        @endif

                        @yield('content')

                </div>
            </div>
        </div>

        @include('app.layout._appfooter')


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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script> var PLACES_API_URL = "{{route('places.api')}}"; </script>

    <!-- Activation Script -->
    {{-- <script src="{{asset('js/jc/drag-n-drop.js')}}"></script> --}}
    <script src="{{asset("js/moment-locale.js")}}"></script>
    <script src="{{asset("js/moment-timezone.js")}}"></script>
    <script>
        moment.locale("es");
        moment.tz.setDefault('America/Guatemala');
    </script>
    <script src="{{asset('js/jc/custom.js')}}"></script>
    <script src="{{asset('js/c.js')}}"></script>

  @yield('js')
</body>
