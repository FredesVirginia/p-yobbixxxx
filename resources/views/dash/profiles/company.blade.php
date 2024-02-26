@extends('dash.layout.dash', [
    'title' => 'Perfil de Empresa | Yobbix',
    'breadcrumb' => ['Dash', 'Perfil de Empresa'],
    'pageTitle' => 'Perfil de Empresa',
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
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($company == null)
            <div class="alert alert-info">
                Complete la información para poder aparecer en las búsquedas
            </div>
        @endif

        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Nombre</label>
                        <input class="form-control h-px-48" name="name"
                            value="{{ old('name') ?? ($company->name ?? '') }}">
                    </div>
                </div>
            </div>
            <div class="row mb-xl-1 mb-9">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Teléfono 1 </label>
                        <input type="text" class="form-control h-px-48" name="phone1"
                            value="{{ old('phone1') ?? ($company->phone1 ?? '') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Teléfono 2 </label>

                        <input type="text" class="form-control h-px-48" name="phone2"
                            value="{{ old('phone2') ?? ($company->phone2 ?? '') }}">
                    </div>
                </div>
            </div>
            <div class="row mb-xl-1 mb-9">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Direccion </label>
                        <input class="form-control h-px-48" name="address"
                            value="{{ old('address') ?? ($company->address ?? '') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Sitio Web </label>
                        <input class="form-control h-px-48" name="web"
                            value="{{ old('web') ?? ($company->web ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="row mb-xl-1 mb-9">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Lugar </label>
                        <select name="main_place_id" class="pl-6 h-px-48 arrow-3 w-100 font-size-4 places2-select">
                            <option value="">Seleccione una Opción</option>
                        </select>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Categoria </label>
                       <select name="category_id" id="experience" class="nice-select pl-6 h-px-48 arrow-3 w-100 font-size-4">
                            <option value="">Seleccione una Opción</option>
                           @foreach (App\Models\Company::CATEGORY as $key => $value)
                                <option value="{{ $value }}"
                                    @selected( (old('category_id',  $company->category_id ?? '-1') == $value) )
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
                        <label class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Url del perfil</label>
                        <input class="form-control h-px-48" name="url"
                            value="{{ old('url') ?? ($company->url ?? '') }}" >
                        <small>Solo letras, números y guiones.</small>
                    </div>
                </div>
                <div class="col-md-12 mt-6">
                    <div class="form-group">
                        <label  class="d-block text-black-2 font-size-4 font-weight-semibold mb-4">Descripción de la empresa</label>
                        <textarea name="description" id="description" cols="30" rows="7" class="border border-mercury text-gray w-100 pt-4 pl-6" placeholder="Describe about the company what make it unique" > {{ old('description') ?? ($company->description ?? '') }} </textarea>
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-green btn-h-60 text-white min-width-px-210 rounded-5 text-uppercase">
                {{ $company == null ? 'Publicar' : 'Actualizar' }}
            </button>
        </fieldset>
    </form>
</div>


{{-- <div class="row">

    <div class="col-12">

        <div class="bg-white shadow-8 rounded-4 pl-sm-10 pl-4 pr-sm-11 pr-4 pt-15 pb-13">



        </div>

    </div>

</div> --}}


@endsection

