<?php

namespace App\Http\Controllers\Dash;

use App\Helpers\DataTablesJson;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function jobs()
    {
        return view('admin.jobs');
    }


    public function jobsJS()
    {
        $columns = [ "id", "title", "company_id"];
        $searchable = [ "id", "title", "company_id"];
        $orderable = [ "*" ];

        return DataTablesJson::getResponse(Job::query(), $columns, $searchable, $orderable);
    }

    public function aplications()
    {
        return view('admin.aplications');
    }


    public function aplicationsJS()
    {
        $columns = [ "id", "worker_id", "job_id", "worker_msg"];
        $searchable = [ "id", "worker_id", "job_id", "worker_msg"];
        $orderable = [ "*" ];

        return DataTablesJson::getResponse(Application::query(), $columns, $searchable, $orderable,
        fnBeforePaginate: function($query){
            $query->with('job:id,title');
            $query->with('worker:id,name');
            return $query;
        }
    );

    }


}
