<header class="site-header site-header--menu-right bg-navbar position-fixed py-7 py-xs-0 site-header--absolute">
    <div class="container-fluid-fluid px-10">
        <nav class="navbar site-navbar offcanvas-active navbar-expand-lg  px-0 py-0">
            <!-- Brand Logo-->
            <div class="brand-logo">
                <a href="./index.html">
                    <!-- light version logo (logo must be black)-->
                    <img src="{{ asset('imgs/logo.png') }}" alt="" class="light-version-logo default-logo"
                        style="max-height:30px;">
                    {{-- <!-- Dark version logo (logo must be White)-->
                <img src="image/logo-main-white.png" alt="" class="dark-version-logo"> --}}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="mobile-menu">
                <div class="navbar-nav-wrapper">
                    <ul class="navbar-nav main-menu">

                        @auth

                            <li class="nav-item">
                                @if (auth()->user()->isWorker())
                                    TRABAJADOR
                                @elseif(auth()->user()->isCompany())
                                    EMPRESA
                                @elseif(auth()->user()->isRole('admin'))
                                    ADMIN
                                @else
                                    ROL DESCONOCIDO
                                @endif
                            </li>
                        @endauth


                        {{-- Home --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Home</a>
                        </li>

                        {{-- Búsqueda --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('jobs')}}">Búsqueda</a>
                        </li>

                    </ul>
                </div>

                @auth

                    <div class="header-btn-devider ml-auto ml-lg-5 pl-2 d-none d-xs-flex align-items-center">

                        <div>
                            <div class="dropdown show-gr-dropdown py-5">
                            <a class="proile media ml-7 flex-y-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="circle-40">
                                <img src="{{asset('imgs/nophoto.jpg')}}" alt="" height="35" width="35" style="border-radius: 50%">
                                </div>
                                <i class="fas fa-chevron-down color-navbar-text ml-6"></i>
                            </a>
                            <div class="dropdown-menu gr-menu-dropdown dropdown-right border-0 border-width-2 py-2 w-auto bg-default" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item py-2 font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="{{route('dash')}}">Panel </a>
                                <a class="dropdown-item py-2 font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="#">Configuración </a>
                                <a class="dropdown-item py-2 font-size-3 font-weight-semibold line-height-1p2 text-uppercase" href="{{route('dash.profile')}}">Perfil</a>

                                {{-- Logout --}}
                                <a class="dropdown-item py-2 text-red font-size-3 font-weight-semibold line-height-1p2 text-uppercase js-logout-button" href="#">Log Out</a>
                                <form class="js-logout-form" action="{{route('logout')}}" method="POST" style="display: none;"> @csrf </form>
                                <script>
                                    document.querySelector('.js-logout-button').addEventListener('click', function(e) {
                                        e.preventDefault();
                                        document.querySelector('.js-logout-form').submit();
                                    });
                                </script>
                            </div>
                            </div>
                        </div>
                    </div>

                @endauth

                @guest

                    <div class="header-btns header-btn-devider ml-auto pr-2 ml-lg-6 d-none d-xs-flex">
                        <a class="btn btn-transparent text-uppercase font-size-3 heading-default-color focus-reset px-4"  data-toggle="modal" data-target="#login_modal" data-is-company-form="true">
                            Ingreso Empresas
                        </a>

                        <a class="btn btn-primary text-uppercase font-size-3 px-4" href="#" data-toggle="modal" data-target="#login_modal" data-is-worker-form="true">
                            Ingreso Candidatos
                        </a>
                    </div>

                @endguest
                <button class="d-block d-lg-none offcanvas-btn-close focus-reset" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="true" aria-label="Toggle navigation">
                    <i class="gr-cross-icon"></i>
                </button>
            </div>

            <!-- Mobile Menu Hamburger-->
            <button class="navbar-toggler btn-close-off-canvas  hamburger-icon border-0" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <i class="icon icon-simple-remove icon-close"></i> -->
                <span class="hamburger hamburger--squeeze js-hamburger">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </span>
            </button>
            <!--/.Mobile Menu Hamburger Ends-->
        </nav>
    </div>
</header>


@guest
    @include('app.layout._login_modal')
@endguest
