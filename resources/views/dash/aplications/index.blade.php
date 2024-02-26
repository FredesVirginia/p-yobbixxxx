@extends('dash.layout.dash', [
    'title' => 'Aplicaciones| Yobbix',
    'breadcrumb' => ['Aplicaciones', 'Publicar Empleo'],
    'pageTitle' => 'Aplicaciones',
])



@section('css')
@endsection

@section('js')
@endsection

@section('content')
    @if (session('success'))
        <div class="col-xl-10 col-lg-11 mt-4 ml-xxl-32 ml-xl-15 dark-mode-texts">
            <div class="mb-9">

                <span class="text-uppercase font-size-6 font-weight-bold text-gray"> {{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="row">

        <div class="col-12">
    
            <div class="bg-white shadow-8 rounded-4 pl-sm-10 pl-4 pr-sm-11 pr-4 pt-15 pb-13">
    
                <x-datatable
                    :ajax="route('dash.aplicationsJS')"
                    id="aplications-table"
                    :headers="['ID', 'Worker ID', 'Job ID', 'Worker Msg']"
                    columns="aplicationsColumns"
                >
    
                <script>
    
                    var aplicationsColumns = [
                        { "data": 'id' }, 
                        { "data": 'worker_id' },
                        { "data": 'job_id' },
                        { "data": 'worker_msg' },
                    ];
                </script>
    
    
                </x-datatable>
    
    
            </div>
        </div>
    
    </div>
@endsection
