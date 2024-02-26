@extends('app.layout.app', [
    'title' => 'Anuncio | Yobbix',
    'pageTitle' => 'Anuncio',
    'sidebar' => false,
])

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <div class="col-12 row justify-content-center">

        <div class="col-xl-10 col-lg-11 mt-4 ml-xxl-32 ml-xl-15 dark-mode-texts">
            <div class="mb-9">
                <a class="d-flex align-items-center ml-4" href="dashboard-main.html"> <i
                        class="icon icon-small-left bg-white circle-40 mr-5 font-size-7 text-black font-weight-bold shadow-8">
                    </i><span class="text-uppercase font-size-3 font-weight-bold text-gray">Back to job board</span></a>
            </div>
        </div>

        @if(session('success'))

            <div class="col-xl-10 col-lg-11 mt-4 ml-xxl-32 ml-xl-15 dark-mode-texts">
                <div class="mb-9">

                        <span class="text-uppercase font-size-6 font-weight-bold text-gray">   {{ session('success') }}</span>
                </div>
            </div>

        @endif



        <div class="col-xl-9 col-lg-11 mb-8 px-xxl-15 px-xl-0">
            <div class="bg-white rounded-4 border border-mercury shadow-9">
                <!-- Single Featured Job -->
                <div
                    class="pt-9 pl-sm-9 pl-5 pr-sm-9 pr-5 pb-8 border-bottom border-width-1 border-default-color light-mode-texts">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- media start -->
                            <div class="media align-items-center">
                                <!-- media logo start -->
                                <div class="square-72 d-block mr-8">
                                    <img src="/imgs/icon-dolor.svg" alt="">
                                </div>
                                <!-- media logo end -->
                                <!-- media texts start -->
                                <div>
                                    <div>

                                        <h3 class="font-size-6 mb-0"> {{ $job->title }}</h3>
                                        <input type="hidden" name="job_id" value="{{ $job->id }}">

                                        <span class="font-size-3 text-gray line-height-2">{{$job->company->name}}</span>


                                    </div>



                                </div>

                                <!-- media texts end -->
                            </div>
                            <!-- media end -->
                        </div>
                        {{-- <div class="col-md-6 text-right pt-7 pt-md-0 mt-md-n1">
                            <!-- media date start -->
                            <div class="media justify-content-md-end">
                                <p class="font-size-4 text-gray mb-0"></p>
                            </div>
                            <!-- media date end -->
                        </div> --}}
                    </div>
                    <div class="row pt-9">
                        <div class="col-12">
                            <!-- card-btn-group start -->
                            <div class="card-btn-group">

                                @switch($applyButton)
                                    @case('need-register')
                                        <a class="btn btn-primary text-uppercase font-size-3" href="#" data-toggle="modal" data-target="#login_modal" data-is-aplication-form="true"> REGISTRARSE PARA APLICAR </a>
                                        @break
                                    @case('applied')
                                        <span class="text-uppercase font-size-3 font-weight-bold text-gray">Usted ya aplicó para esta búsqueda</span>
                                        @break
                                    @case('apply')
                                    <a class="btn btn-primary text-uppercase font-size-3" href="#" data-toggle="modal" data-target="#job-application-modal">Aplicar para esta búsqueda</a>
                                        @break
                                @endswitch

                            </div>

                            <!-- card-btn-group end -->
                        </div>
                    </div>
                </div>
                <!-- End Single Featured Job -->
                <div
                    class="job-details-content pt-8 pl-sm-9 pl-6 pr-sm-9 pr-6 pb-10 border-bottom border-width-1 border-default-color light-mode-texts">
                    <div class="row mb-7">
                        <div class="col-md-4 mb-md-0 mb-6">
                            <div class="media justify-content-md-start">
                                <div class="image mr-5">
                                    <img src="/imgs/icon-dolor.svg" alt="">
                                </div>
                                <p class="font-weight-semibold font-size-5 text-black-2 mb-0">{{ $job->salary_min }} --
                                    {{ $job->salary_max }}</p>
                            </div>
                        </div>
                        <div class="col-md-4 pr-lg-0 pl-lg-10 mb-md-0 mb-6">
                            <div class="media justify-content-md-start">
                                <div class="image mr-5">
                                    <img src="/imgs/icon-briefcase.svg" alt="">
                                </div>
                                <p class="font-weight-semibold font-size-5 text-black-2 mb-0">{{ $job->paymentPeriodicityText }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 pl-lg-0">
                            <div class="media justify-content-md-start">
                                <div class="image mr-5">
                                    <img src="/imgs/icon-location.svg" alt="">
                                </div>
                                <p class="font-size-5 text-gray mb-0">777 Brockton Avenue, <br
                                        class="d-md-none d-lg-block d-block">
                                    Abington MA 2351</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-lg-0 mb-10">
                            <div class="">
                                <span class="font-size-4 d-block mb-4 text-gray"> Comienzo de Trabajo</span>
                                <h6 class="font-size-5 text-black-2 font-weight-semibold mb-9">{{ $job->start_type }}</h6>
                            </div>

                        </div>
                        <div class="col-md-4 pr-lg-0 pl-lg-10 mb-lg-0 mb-8">
                            <div class="">
                                <span class="font-size-4 d-block mb-4 text-gray">Tipo de Trabajo</span>
                                <h6 class="font-size-5 text-black-2 font-weight-semibold mb-9">{{ $job->job_types }}</h6>
                            </div>

                        </div>
                        <div class="col-md-4 pl-lg-0">
                            <div class="">
                                <span class="font-size-4 d-block mb-4 text-gray">Tipo de Habilidad</span>
                                <h6 class="font-size-5 text-black-2 font-weight-semibold mb-0">{{ $job->abilitiesName }}</h6>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-4 mb-lg-0 mb-10">
                            <div class="">
                                <span class="font-size-4 d-block mb-4 text-gray"> Lugar</span>
                                <h6 class="font-size-5 text-black-2 font-weight-semibold mb-9">{{ $job->place }}</h6>
                            </div>

                        </div>
                        <div class="col-md-4 pr-lg-0 pl-lg-10 mb-lg-0 mb-8">
                            <div class="">
                                <span class="font-size-4 d-block mb-4 text-gray">Compañia</span>
                                <h6 class="font-size-5 text-black-2 font-weight-semibold mb-9">{{ $job->companies }}</h6>
                            </div>
                        </div>
                            <div class="col-md-4 pr-lg-0 pl-lg-10 mb-lg-0 mb-8">
                                <div class="">
                                    <span class="font-size-4 d-block mb-4 text-gray">Experiencia</span>
                                    <h6 class="font-size-5 text-black-2 font-weight-semibold mb-9">
                                        {{ $job->experienceTypeText }}</h6>
                                </div>

                            </div>

                        </div>
                        <div class="col-xl-11 mt-10 col-md-12 pr-xxl-9 pr-xl-10 pr-lg-20">
                          <div class="">
                              <div class="">
                                  <span class="font-size-4 d-block mb-4 text-gray"> Fecha</span>
                                  <h6 class="font-size-5 text-black-2 font-weight-semibold mb-9"> <span class="font-size-4  mb-4 text-gray">Desde: </span>  {{$job->start_date }} <span class="font-size-4  mb-4 text-gray">Hasta: </span> {{$job->end_date}}</h6>
                              </div>

                          </div>

                      </div>
                    </div>


                    <div class="col-xl-11 ml-10 mt-10 col-md-12 pr-xxl-9 pr-xl-10 pr-lg-20 pb-10">
                        <div class="">
                            <p class="mb-4 font-size-4 text-gray">Descripción del Trabajo</p>
                            <p class="font-size-4 text-black-2 mb-7"> {{ $job->description }} </p>
                        </div>
                        <div class="">

                            @switch($applyButton)
                                @case('need-register')
                                    <a class="btn btn-primary text-uppercase font-size-3" href="#" data-toggle="modal" data-target="#login_modal" data-is-aplication-form="true"> REGISTRARSE PARA APLICAR </a>
                                    @break
                                @case('applied')
                                    <span class="text-uppercase font-size-3 font-weight-bold text-gray">Usted ya aplicó para esta búsqueda</span>
                                    @break
                                @case('apply')
                                <a class="btn btn-primary text-uppercase font-size-3" href="#" data-toggle="modal" data-target="#job-application-modal">Aplicar para esta búsqueda</a>
                                    @break
                            @endswitch

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>


       <!-- Modal para Aplicar a busqueda -->
    <div class="modal" id="job-application-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aplica a este trabajo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario en el modal -->
                    <form   action="{{route('dash.aplications.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <div class="form-group">
                            <label for="mensaje">Escribe un mensaje</label>
                            <textarea class="form-control" id="mensaje" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

