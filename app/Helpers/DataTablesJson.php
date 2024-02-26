<?php

namespace App\Helpers;


class DataTablesJson
{

    public static function getResponse(
        \Illuminate\Database\Eloquent\Builder $query,
        array $columns = ["*"],
        array $searchable = [],
        array $orderable = [],
        ?callable $fnBeforePaginate = null
    ){

        // $coumns = [ "id", "name", "email", "role_id", "created_at", "updated_at" ];
        // $searchable = [ "id", "name", "email" ];
        // $orderable = [ "*" ];
        $extra = [];

        // Search
        $searchInput = request()->input("search");
        if($searchInput["value"] != null){
            $query->where(function($query) use ($searchable, $searchInput){
                foreach($searchable as $column){
                    $query->orWhere($column, "LIKE", "%{$searchInput['value']}%");
                }
            });
        }

        // Orden
        $orderInput = request()->input("order");
        $columnsInput = request()->input("columns");
        $orderablingColumn = $columnsInput[$orderInput[0]["column"]];
        // Si no es ID o (es ID pero no es ASC)
        if( $orderablingColumn["data"] != "id" || $orderInput[0]["dir"] != "asc"  ){
            if(  ($orderable[0] == "*" || in_array($orderablingColumn["data"], $orderable))
                && in_array($orderablingColumn["data"], $columns) ){ // debe estar tmb en columns, evitar que ordenen por campos no públicos
                $query->orderBy($orderablingColumn["data"], $orderInput[0]["dir"]);
            }else{
                $extra["warning"] = "No se puede ordenar por {$orderablingColumn['data']} porque no es orderable";
            }
        }

        if($fnBeforePaginate != null){
            $query = $fnBeforePaginate($query);
            if(!($query instanceof \Illuminate\Database\Eloquent\Builder)){
                throw new \Exception("fnBeforePaginate must return a \Illuminate\Database\Eloquent\Builder");
            }
        }

        $users = $query->paginate(request()->input("length"), $columns , "page", request()->input("start") / request()->input("length") + 1);

        return response()
            ->json([
                "data" => $users->items(),
                "draw" => request()->input("draw"),
                "recordsTotal" => $users->total(),
                "recordsFiltered" => $users->total(),
                "extra" => [...$extra,
                    // "request" => request()->all()
                ]
            ]);
    }

}
