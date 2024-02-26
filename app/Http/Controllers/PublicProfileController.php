<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Worker;

class PublicProfileController extends Controller
{

    public function showWorker($url)
    {
        // $worker = Worker::findOrFail($id);
        $worker = Worker::where('url',$url)->firstOrFail();

        return view('app.profiles.worker')->withWorker($worker);
    }

    public function showCompany($url)
    {
        $company = Company::with('place:id,name')->where('url',$url)->firstOrFail();

        return view('app.profiles.company')->withCompany($company);
    }

}
