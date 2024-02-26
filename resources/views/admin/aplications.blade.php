@extends('dash.layout.dash', [
    'title' => 'Admin Aplicaciones | Yobbix',
    'breadcrumb' => ['Admin', 'Aplicaciones'],
    'pageTitle' => 'Aplicaciones',
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
                :ajax="route('admin.aplicationsJS')"
                id="aplications-table"
                :headers="['ID', 'Anuncio', 'Trabajador', 'Mensaje']"
                columns="aplicationsColumns" {{-- debe ser igual a var aplicationsColumns (ver mas abajo) --}}
                classes="table table-striped"
            >

            <script>

                var aplicationsColumns = [
                    { "data": 'id' }, // cuando usás data : 'XXX', toma la propiedad del modelo XXX
                    { "data": 'job_id',
                        "render": function ( data, type, row, meta ) {
                            return row.job.title;
                        }
                    },
                    { "data": 'worker_id',
                        "render": function ( data, type, row, meta ) {
                            return row.worker.name;
                        }
                    },
                    { "data": 'worker_msg' },
                ];
            </script>


            </x-datatable>


        </div>
    </div>

</div>

@endsection
