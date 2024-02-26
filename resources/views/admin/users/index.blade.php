@extends('dash.layout.dash', [
    'title' => 'Usuarios | Yobbix',
    'breadcrumb' => ['Dash', 'Usuarios'],
    'pageTitle' => 'Usuarios',
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
                :ajax="route('admin.usersJS')"
                id="users-table"
                :headers="['ID','Nombre','Email','Rol','Acciones']"
                columns="userColumns" {{-- debe ser igual a var userColumns (ver mas abajo) --}}
                classes="table table-striped"
            >
                <script>

                        var roles = @json(\App\Models\User::ROLES);
                        roles = Object.keys(roles).reduce((obj, key) => {
                            obj[roles[key]] = key;
                            return obj;
                        }, {});

                        var userColumns = [
                            { "data": 'id' }, // cuando usás data : 'XXX', toma la propiedad del modelo XXX
                            { "data": 'name' },
                            { "data": 'email' },
                            { "data": 'role_id',
                                "render": function ( role_id, type, row, meta ) {
                                    return `<span class="badge rounded-pill badge-danger role-${roles[role_id]}">${roles[role_id]}</span>`;
                                }
                            },
                            { "data": null,
                                "render": function ( data, type, row, meta ) {
                                    return `<ul class="action">
                                                <li class="edit"> <a href="#" onclick='event.preventDefault();onEditUser(${row.id})'><i class="fa fa-edit"></i></a></li>
                                                <li class="delete"><a href="#" onclick='event.preventDefault();onRemoveUser(${row.id},"${row.name}")'><i class="fa fa-trash-o"></i></a></li>
                                            </ul>`;
                                },
                                "orderable" : false,
                            }
                        ];

                        function onEditUser(id) {
                            window.location.href = "{{route('admin.users.edit', ['id' => '**'])}}".replace('**', id);
                        }

                        function onRemoveUser(id,name) {
                            swal({
                                title: `¿Desea eliminar al usuario ${name}?`,
                                text: "Esta acción no se puede deshacer",
                                icon: "warning",
                                buttons: {
                                    cancel: 'No',
                                    confirm: 'Sí',
                                },
                                dangerMode: true,
                            }).then((willDelete) => {
                                if (willDelete) {
                                    $('#delete_form').attr('action', $('#delete_form').attr('action').replace('**', id));
                                    $('#delete_form').submit();
                                }
                            });
                        }
                </script>
            </x-datatable>

        </div>

    </div>
</div>


@endsection
