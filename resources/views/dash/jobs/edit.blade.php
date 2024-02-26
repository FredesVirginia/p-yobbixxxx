@extends('dash.layout.dash', [
    'title' => 'Dash | Yobbix',
    'breadcrumb' => ['Dash', 'Publicar Empleo'],
    'pageTitle' => 'Publicar Empleo',
])



@section('css')

@endsection

@section('js')
@endsection

@section('content')

    <div class="row">

        <div class="col-12">

            <div class="contact-form bg-white shadow-8 rounded-4 pl-sm-10 pl-4 pr-sm-11 pr-4 pt-15 pb-13">

                <form action="{{route('dash.create.jobs')}}" method="POST" >


                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h4>Datos Incorrectos</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @csrf
                    <fieldset>
                        <div class="row mb-xl-1 mb-9">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label  class="d-block text-black-2 font-size-4 font-weight-semibold mb-4" >Titulo
                                    </label>
                                    <input type="text" name="title" class="form-control h-px-48" id="namedash" placeholder="Titulo" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label  class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Estado
                                    </label>
                                    <input type="number" name="status" class="form-control h-px-48" placeholder="Estado" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-8">
                            <div class="col-lg-6 mb-xl-0 mb-7">
                                <div class="form-group position-relative">
                                    <label for="select3"
                                        class=" multipleProfession d-block text-black-2 font-size-4 font-weight-semibold mb-4">Profesión </label>


                                        <select name="profession" class=" form-control nice-select pl-6 arrow-3 h-px-48 w-100 font-size-4  ">
                                            <option value="">Seleccione una Opción</option>

                                            @foreach ($professions as $profession)
                                                <option value="{{ $profession->id }}">{{ $profession->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group position-relative">
                                    <label for="address"
                                        class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Habilidad </label>
                                    <select name="ability"
                                        class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">
                                        <option value="">Seleccione una Opción </option>

                                        @foreach ($abilities as $abilitie)
                                            <option value="{{ $abilitie->id }}">{{ $abilitie->name }}</option>
                                        @endforeach

                                    </select>

                                    <span
                                        class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-8">
                            <div class="col-lg-6 mb-xl-0 mb-7">
                                <div class="form-group">
                                    <label for="select3" class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">
                                        Lugar
                                    </label>
                                    <select name="places" class="pl-6 h-px-48 arrow-3 w-100 font-size-4 places2-select">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group position-relative">
                                    <label
                                        class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Compañia </label>
                                    <select name="companies"
                                        class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">
                                        <option value="">???? </option>

                                    </select>

                                    <span
                                        class="h-100 w-px-50 pos-abs-tl d-flex align-items-center justify-content-center font-size-6"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-8">
                            <div class="col-md-12 mb-10">
                                <div class="form-group">
                                    <label
                                        class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Experiencia </label>
                                        <select   name="experience[]" id="experience"   class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">
                                            <option value="0">Seleccione una Opción</option>

                                            @foreach (App\Models\Job::TRANS_EXPERIENCE_TYPES as $key => $value)
                                                <option value="{{ $value }}">{{ $key }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-8">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label  class="d-block text-black-2 font-size-4 font-weight-semibold mb-4" >Fecha de Inicio
                                    </label>
                                    <input type="date" name="start_date" class="form-control h-px-48"  placeholder="Titulo" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label  class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Fecha de Fin
                                    </label>
                                    <input type="date" name="end_date" class="form-control h-px-48" id="namedash" placeholder="Estado" required>
                                </div>
                            </div>
                        </div>
                            <div class="row mb-8">
                                <div class="col-md-12 ">
                                    <div class="form-group mb-11">
                                        <label  class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Tipo de
                                            trabajo </label>
                                        <select name="job_type"
                                            class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">
                                            <option value="0">Seleccione una Opción</option>

                                            @foreach (App\Models\Job::TRANS_JOB_TYPES as $key => $value)
                                                <option value="{{ $value }}">{{ $key }}</option>
                                            @endforeach



                                        </select>

                                    </div>
                                </div>
                            </div>
                                <div class=" row mb-xl-1 mb-9">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="namedash"
                                                class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Salario Minimo
                                            </label>
                                            <input type="number" name="salary_min" class="form-control h-px-48" id="salary_min"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="select2"
                                                class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Salario
                                                Maximo</label>
                                            <input type="number" name="salary_max" class="form-control h-px-48" id="salary_max"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class=" mt-4 row mb-xl-1 mb-9">


                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label
                                                class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Periodo de pago </label>


                                            <select name="periodicity_payment[]" id="job_type" multiple="multiple" select2 class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">
                                                <option value="0">Seleccione</option>

                                                @foreach (App\Models\Job:: TRANS_PAYMENT_PERIODICITY  as $key => $value)
                                                    <option value="{{ $value }}">{{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label
                                                class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Comienzo del Trabajo </label>

                                            <select name="start_type[]" id="job_type" multiple="multiple" select2 class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">
                                                <option value="0">Seleccione</option>

                                                @foreach (App\Models\Job:: TRANS_START_TYPES  as $key => $value)
                                                    <option value="{{ $value }}">{{ $key }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-6">
                                        <div class="form-group">
                                        <label  class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Descripción</label>
                                        <textarea name="description" id="description" cols="30" rows="7" class="border border-mercury text-gray w-100 pt-4 pl-6" placeholder="Describe about the company what make it unique"></textarea>
                                        </div>
                                    </div>
                                </div>

                                    <button class="btn btn-green btn-h-60 text-white min-width-px-210 rounded-5 text-uppercase" type= "submit"> Publicar trabajo RVTRVTRV </button>
                            </div>

                    </fieldset>
                </form>
            </div>


        </div>

    </div>



@endsection
