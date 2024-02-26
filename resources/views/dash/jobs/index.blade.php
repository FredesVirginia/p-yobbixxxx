@extends('dash.layout.dash', [
    'title' => 'Anuncios| Yobbix',
    'breadcrumb' => ['Anuncios', 'Publicar Empleo'],
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
                    :ajax="route('dash.jobsJS')"
                    id="aplications-table"
                    :headers="['ID', 'Title' , 'Company']"
                    columns="aplicationsColumns"
                >
    
                <script>
    
                    var aplicationsColumns = [
                        { "data": 'id' }, 
                        { "data": 'title' },
                        { "data": 'company_id' },
                       
                    ];
                </script>
    
    
                </x-datatable>
    
    
            </div>
        </div>
    
    </div>
@endsection