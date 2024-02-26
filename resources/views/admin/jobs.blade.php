@extends('dash.layout.dash', [
    'title' => 'Admin Anuncios | Yobbix',
    'breadcrumb' => ['Admin', 'Anuncios'],
    'pageTitle' => 'Anuncios',
])



@section('css')



@endsection

@section('js')

@endsection

@section('content')

<div class="row">

    <div class="col-12">

        <div class="bg-white shadow-8 rounded-4 pl-sm-10 pl-4 pr-sm-11 pr-4 pt-15 pb-13">

            <x-datatable
                :ajax="route('admin.jobsJS')"
                id="jobs-table"
                :headers="['ID', 'Title', 'Company']"
                columns="jobsColumns" {{-- debe ser igual a var aplicationsColumns (ver mas abajo) --}}
                classes="table table-striped"
            >

            <script>

                var jobsColumns = [
                    { "data": 'id' }, // cuando usás data : 'XXX', toma la propiedad del modelo XXX
                    { "data": 'title' },
                    { "data": 'company_id' },

                ];
            </script>


            </x-datatable>


        </div>
    </div>

</div>

@endsection
