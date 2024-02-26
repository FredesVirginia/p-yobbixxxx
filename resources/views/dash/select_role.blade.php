@extends('dash.layout.dash', [
    'title' => 'Dash | Yobbix',
    'breadcrumb' => ['Dash', 'Selecciona un perfil'],
    'pageTitle' => 'Selecciona un perfil',
])



@section('css')

    <style>
        .role_choosen{
            display: none;
        }
        .role_choosen + label{
            background-color: #efefef!important;
        }
        .role_choosen:checked + label{
            background-color: #ffffff!important;
            outline: 2px solid #007bff;
        }

        .role-form{
            display: none;
        }

        .role-form.active{
            display: block;
        }

    </style>

@endsection

@section('js')

    <script>

        $(document).ready(function(){

            $('input[name="role-choosen"]').change(function(){
                var role = $(this).val();

                $('.role-form').removeClass('active');
                $('#'+role+'-form').addClass('active');

            });

        });



    </script>

@endsection

@section('content')
    <div class="container">

        <div class="row mb-7">

            <div class="col-6">
                <input type="radio" name="role-choosen" value="worker" id="worker-choosen" class="role_choosen">
                <label for="worker-choosen" style="cursor: pointer;" class="media bg-white rounded-4 pl-8 pt-9 pb-9 pr-7 hover-shadow-1 mb-9 shadow-8">
                    <div class="text-blue bg-blue-opacity-1 circle-56 font-size-6 mr-7">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="">
                        <h5 class="font-size-8 font-weight-semibold text-black-2 line-height-reset font-weight-bold mb-1">
                            Perfil Trabajador
                        </h5>
                        <p class="font-size-4 font-weight-normal text-gray mb-0">Encuentra oportunidades de empleo</p>
                    </div>
                </label>
            </div>

            <div class="col-6">
                <input type="radio" name="role-choosen" value="company" id="company-choosen" class="role_choosen">
                <label for="company-choosen" style="cursor: pointer;" class="media bg-white rounded-4 pl-8 pt-9 pb-9 pr-7 hover-shadow-1 mb-9 shadow-8">
                    <div class="text-pink bg-pink-opacity-1 circle-56 font-size-6 mr-7">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="">
                        <h5 class="font-size-8 font-weight-semibold text-black-2 line-height-reset font-weight-bold mb-1">
                            Perfil Empresa
                        </h5>
                        <p class="font-size-4 font-weight-normal text-gray mb-0">Publica anuncios para encontrar colaboradores</p>
                    </div>
                </label>
            </div>

        </div>


        {{---------------------- WORKER PROFILE ------------------------}}

        <div id="worker-form" class="role-form">

            <div class="contact-form bg-white shadow-8 rounded-4 pl-sm-10 pl-4 pr-sm-11 pr-4 pt-15 pb-13">
                <form action="{{ route('dash.profile.store') }}" method="POST">
                    <input type="hidden" name="role-choosen" value="worker">

                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">

                            <h4>Datos Incorrectos</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif
                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Nombre</label>
                                    <input class="form-control h-px-48" name="name"
                                        value="{{ old('name') ?? '' }}" >
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Fecha de Nacimiento </label>
                                    <input type="date" class="form-control h-px-48" name="birthday"
                                        value="{{ old('birthday') ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-xl-1 mb-9">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Teléfono 1 </label>
                                    <input type="text" class="form-control h-px-48" name="phone1"
                                        value="{{ old('phone1') ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Teléfono 2 </label>

                                    <input type="text" class="form-control h-px-48" name="phone2"
                                        value="{{ old('phone2') ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-xl-1 mb-9">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Direccion </label>
                                    <input class="form-control h-px-48" name="address"
                                        value="{{ old('address') ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Sitio Web </label>
                                    <input class="form-control h-px-48" name="web"
                                        value="{{ old('web') ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-xl-1 mb-9">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Lugar </label>
                                    <select name="places" class="pl-6 h-px-48 arrow-3 w-100 font-size-4 places2-select">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-8">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Profesión </label>


                                        <select name="main_profession_id" id="experience" class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">

                                            @foreach (App\Models\Company::CATEGORY as $key => $value)
                                                <option value="{{ $value }}"
                                                    @selected( old('main_profession_id') )
                                                >{{ $key }}</option>
                                            @endforeach

                                        </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Url</label>
                                    <input class="form-control h-px-48" name="url"
                                        value="{{ old('url') ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-12 mt-6">
                                <div class="form-group">
                                    <label  class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Descripción</label>
                                    <textarea name="description" id="description" cols="30" rows="7" class="border border-mercury text-gray w-100 pt-4 pl-6" placeholder="Describe about the company what make it unique"> {{ old('description') ?? ($worker->description ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-green btn-h-60 text-white min-width-px-210 rounded-5 text-uppercase">
                            Publicar Perfil de Trabajador
                        </button>
                    </fieldset>
                </form>
            </div>
        </div>



        {{---------------------- COMPANY PROFILE ------------------------}}

        <div id="company-form" class="role-form">


            <div class="contact-form bg-white shadow-8 rounded-4 pl-sm-10 pl-4 pr-sm-11 pr-4 pt-15 pb-13">
                <form action="{{ route('dash.profile.store') }}" method="POST">
                    <input type="hidden" name="role-choosen" value="company">

                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">

                            <h4>Datos Incorrectos JBJH</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Nombre</label>
                                    <input class="form-control h-px-48" name="name"
                                        value="{{ old('name') ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-xl-1 mb-9">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Teléfono 1 </label>
                                    <input type="text" class="form-control h-px-48" name="phone1"
                                        value="{{ old('phone1') ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Teléfono 2 </label>

                                    <input type="text" class="form-control h-px-48" name="phone2"
                                        value="{{ old('phone2') ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-xl-1 mb-9">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Direccion </label>
                                    <input class="form-control h-px-48" name="address"
                                        value="{{ old('address') ?? '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Sitio Web </label>
                                    <input class="form-control h-px-48" name="web"
                                        value="{{ old('web') ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-xl-1 mb-9">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Lugar </label>
                                    <select name="places" class="pl-6 h-px-48 arrow-3 w-100 font-size-4 places2-select">
                                        <option value="">Seleccione una Opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Categoria </label>
                                <select name="category_id" id="experience" class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">
                                    @foreach (App\Models\Company::CATEGORY as $key => $value)
                                            <option value="{{ $key }}"
                                            @selected( (old('category_id') == $value) )
                                        >{{ $key }}</option>
                                    @endforeach

                                    </select>

                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Nit</label>
                                    <input type="text" class="form-control h-px-48" name="nit"
                                        value="{{ old('nit') ?? ($company->nit ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Url</label>
                                    <input class="form-control h-px-48" name="url"
                                        value="{{ old('url') ?? ($company->url ?? '') }}" >
                                </div>
                            </div>

                            <div class="col-md-12 mt-6">
                                <div class="form-group">
                                <label  class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Descripción</label>
                                <textarea name="description" id="description" cols="30" rows="7" class="border border-mercury text-gray w-100 pt-4 pl-6" placeholder="Describe about the company what make it unique" > {{ old('description') ?? ($company->description ?? '') }} </textarea>
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-green btn-h-60 text-white min-width-px-210 rounded-5 text-uppercase">
                            Publicar Perfil de Empresa
                        </button>
                    </fieldset>
                </form>
            </div>


        </div>



    </div>
@endsection
