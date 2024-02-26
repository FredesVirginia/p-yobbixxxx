@extends('dash.layout.dash', [
    'title' => 'Trabajador | Yobbix',
    'breadcrumb' => ['Dash', 'Trabajador'],
    'pageTitle' => 'Trabajador',
])



@section('css')



@endsection

@section('js')

@endsection

@section('content')


<div class="contact-form bg-white shadow-8 rounded-4 pl-sm-10 pl-4 pr-sm-11 pr-4 pt-15 pb-13">
    <form action="{{ route('dash.profile.store') }}" method="POST">

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

        @if ($worker == null)
            <div class="alert alert-info">
                Complete la información para poder aparecer en las búsquedas
            </div>
        @endif


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Nombre</label>
                        <input class="form-control h-px-48" name="name"
                            value="{{ old('name') ?? ($worker->name ?? '') }}" >
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Fecha de Nacimiento </label>
                        <input type="date" class="form-control h-px-48" name="birthday"
                            value="{{ old('birthday') ?? ($worker->birthday ?? '') }}">
                    </div>
                </div>
            </div>
            <div class="row mb-xl-1 mb-9">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Teléfono 1 </label>
                        <input type="text" class="form-control h-px-48" name="phone1"
                            value="{{ old('phone1') ?? ($worker->phone1 ?? '') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Teléfono 2 </label>

                        <input type="text" class="form-control h-px-48" name="phone2"
                            value="{{ old('phone2') ?? ($worker->phone2 ?? '') }}">
                    </div>
                </div>
            </div>
            <div class="row mb-xl-1 mb-9">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Direccion </label>
                        <input class="form-control h-px-48" name="address"
                            value="{{ old('address') ?? ($worker->address ?? '') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Sitio Web </label>
                        <input class="form-control h-px-48" name="web"
                            value="{{ old('web') ?? ($worker->web ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="row mb-xl-1 mb-9">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Lugar </label>
                        <select name="main_place_id" class="pl-6 h-px-48 arrow-3 w-100 font-size-4 places2-select">
                            <option value="">Seleccione una Opción</option>
                            @if (isset($worker->place))
                                <option value="{{ $worker->place->id }}" selected>{{ $worker->place->name }}</option>
                            @endif
                        </select>

                    </div>
                </div>
                <div class="col-lg-6 mb-8">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Profesión </label>


                            <select name="main_profession_id" id="experience" class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">

                                @foreach (App\Models\Company::CATEGORY as $key => $value)
                                    <option value="{{ $value }}"
                                        @selected( (old('main_profession_id',  $worker->main_profession_id ?? '') == $value) )
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
                                value="{{ old('url') ?? ($worker->url ?? '') }}">
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
                Editar </button>
        </fieldset>
    </form>
</div>






@endsection

