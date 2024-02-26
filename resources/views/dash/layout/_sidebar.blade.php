<div class="dashboard-sidebar-wrapper pt-11" id="sidebar">
    <div class="brand-logo px-11">
        <a href="https://shade.uxtheme.net/shade-pro">
            <img src="image/logo-main-black.png" alt="">
        </a>
    </div>
    <div class="my-15 px-11">

        @if (auth()->user()->isWorker())
            <a  href="{{route('jobs')}}"  class="btn btn-primary btn-xl w-100 text-uppercase">
                Buscar Empleos
            </a>
        @elseif(auth()->user()->isCompany())
            <a  href="{{route('dash.jobs.create')}}"  class="btn btn-primary btn-xl w-100 text-uppercase">
                <span class="mr-5 d-inline-block">+</span> Publicar Empleo
            </a>
        @endif

    </div>


    <ul class=" list-unstyled  dashboard-layout-sidebar">

        <li class="active">
            <a href="{{route('dash')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                <i class="icon icon-layout-11 mr-7"></i> Vista Principal
            </a>
        </li>

        @if (auth()->user()->isCompany())
            <li>

                    <a href="#" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center sidebar-dropdown-button">
                        <i class="icon icon-receipt-list-43 mr-7"></i> Publicaciones
                        <span class="ml-auto px-1 h-1">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                        {{-- bg-dodger text-white font-size-3 rounded-5 max-height-px-18 flex-all-center --}}
                    </a>

                <ul class="list-unstyled sidebar-dropdown-submenu">
                    <li>
                        <a href="{{route('dash.jobs')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                            Todas
                        </a>
                    </li>

                    <li>
                        <a href="{{route('dash.jobs.create')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                            Nueva
                        </a>
                    </li>
                </ul>
            </li>
        @endif


        @if (auth()->user()->isWorker())

            <li>
                <a href="{{route('dash.aplications')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                    <i class="icon icon-pen mr-7"></i> Aplicaciones
                </a>
            </li>

        @endif


        @if (auth()->user()->isWorker() || auth()->user()->isCompany())


            <li>
                <a href="{{route('dash.profile')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                    <i class="icon icon-pen mr-7"></i> Perfil
                </a>
            </li>

            <li>
                <a href="{{route('dash.profile.membership')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                    <i class="icon icon-trophy mr-7"></i> Planes
                </a>
            </li>

            <li>
                <a href="{{route('dash.feedbacks')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                    <i class="icon icon-heart-2-2 mr-7"></i> Feedbacks
                </a>
            </li>

        @endif

        @if (auth()->user()->isRole('admin'))

            <li class="px-10 py-1 mb-5 mt-8 font-size-3 font-weight-semibold">
                ADMIN
            </li>

            <li>
                <a href="{{route('admin.users')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                    <i class="icon icon-users-wm mr-7"></i> Usuarios
                </a>
            </li>

            <li>
                <a href="{{route('admin.jobs')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                    <i class="icon icon-users-wm mr-7"></i> Todos los Anuncios
                </a>
            </li>
            <li>
                <a href="{{route('admin.aplications')}}" class="px-10 py-1 my-5 font-size-4 font-weight-semibold flex-y-center">
                    <i class="icon icon-users-wm mr-7"></i> Todas las Aplicaciones
                </a>
            </li>


        @endif

    </ul>

</div>
<a class="sidebar-mobile-button" data-toggle="collapse" href="#sidebar" role="button" aria-expanded="false" aria-controls="sidebar">
    <i class="icon icon-sidebar-2"></i>
</a>
