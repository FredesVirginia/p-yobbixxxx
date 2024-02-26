@props([
    // 'data' => [],
    'ajax' => '',
    'id' => 'c-table',
    'columns' => 'columns',
    'headers' => [],
    'classes' => null
])


    <div class="table-responsive table-datatable">
        <table class="display" id="{{$id}}" style="width:100%">
            <thead>
                <tr>
                    @foreach ($headers as $header)
                        <th>{{$header}}</th>
                    @endforeach
                </tr>
            </thead>
        </table>
    </div>


    {{-- For custom scripts --}}
    {{$slot}}


    <script>

        document.addEventListener("DOMContentLoaded", function() {
            (function ($) {

                var len = window.location.search.match(/len=(\d+)/);
                len = len ? parseInt(len[1], 10) : 10;
                var pageLength = len;

                // gets page attribute from url
                var page = window.location.search.match(/page=(\d+)/);
                page = page ? parseInt(page[1], 10) : 1;
                var displayStart = pageLength * (page - 1);

                // gets search attribute from url
                var search = window.location.search.match(/search=([^&]+)/);
                search = search ? decodeURI(search[1]) : "";

                var table = $('#{{$id}}').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "searchDelay": 350,
                    "pageLength" : pageLength,
                    "displayStart" : displayStart,
                    "search": {
                        "return": true, // on enter pressed
                        "search": search,
                    },
                    "ajax": {
                        "url": "{{$ajax}}",
                        "method": "POST",
                        "data": {
                            "_token": "{{ csrf_token() }}"
                        },
                        // See https://datatables.net/manual/server-side
                        dataSrc : function (response) {
                            console.log("DATASRC:", response)
                            // response.draw = response.draw;
                            // response.recordsTotal = response.total;
                            // response.recordsFiltered = response.total;
                            return response.data;
                        },
                        // data: function(json) {
                        //     console.log("DATA:", json)
                        //     return json.data;
                        // },
                        complete: function(response) {
                            console.log(response);
                        },
                    },
                    "columns" : {{$columns}},
                    // "columns": [
                    //     { "data": 'id' },
                    //     { "data": 'name' },
                    //     { "data": 'email' },
                    //     { "data": 'role_id' },
                    //     { "data": null,
                    //         "render": function ( data, type, row, meta ) {
                    //             return `<ul class="action">
                    //                         <li class="edit"> <a href="#" data-id='${data.id}'><i class="fa fa-edit"></i></a></li>
                    //                         <li class="delete"><a href="#" data-id='${data.id}'><i class="fa fa-trash-o"></i></a></li>
                    //                     </ul>`;
                    //         },
                    //         "createdCell": function (td, cellData, rowData, row, col) {
                    //             // el contenedor <td> a crear
                    //         },
                    //         "orderable" : false,
                    //     }
                    //     // { "data": null, defaultContent: '<button>Click!</button>' },
                    // ],

                    "language": {
                        "searchPlaceholder": "Presionar enter para buscar",
                    }
                });


                // table.on( 'preDraw', function () {
                //     //  triggered as the table is about to be redrawn.
                // });

                function setHistory() {
                    try {
                        var state = {};
                        var params = "?";

                        var info = table.page.info();
                        var page = info.page + 1;
                        if(page > 1) {
                            params += "page=" + page;
                            state.page = page;
                        }

                        var len = table.page.len();
                        if(len != 10) {
                            if(params.length > 1) {
                                params += "&";
                            }
                            params += "len=" + len;
                            state.len = len;
                        }

                        var search = table.search();
                        if(search.length > 0) {
                            if(params.length > 1) {
                                params += "&";
                            }
                            search = encodeURI(search);
                            params += "search=" + search;
                            state.search = search;
                        }

                        window.history.pushState(state, "", params);

                    } catch (error) {

                    }
                }

                table.on( 'page.dt', function () {
                    setHistory();
                } );

                table.on( 'length.dt', function () {
                    setHistory();
                } );

                table.on( 'search.dt', function () {
                    setHistory();
                } );

                table.on( 'draw', function () {
                    // adds to table table table-striped
                    @if ($classes)
                        $('#{{$id}}').addClass('{{$classes}}');
                    @endif
                });

            })(jQuery);
        });

    </script>
