<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashController extends Controller
{

    public function index(){

        if( auth()->user()->isWorker() || auth()->user()->isCompany() ){
            return view('dash.index');
        }else{
            return view('dash.select_role');
        }

    }

}
