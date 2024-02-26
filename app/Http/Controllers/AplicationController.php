<?php

namespace App\Http\Controllers;
use App\Helpers\DataTablesJson;
use App\Models\Ability;
use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\Place;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class AplicationController extends Controller
{
    public function index()
    {

        $aplications = Application::all();
        return view('dash.aplications.index')->withAplication($aplications);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|max:255',
            'job_id' => 'integer|exists:jobs,id'

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $validated = $validator->validated();

        $newAplication = new Application([
            'worker_id' => auth()->user()->id,
            'job_id' => $request->input('job_id'),
            'worker_msg' => $validated['message'],
            'status' => 1,
        ]);

        $newAplication->save();

        return redirect()->route('dash.aplications')->withSuccess('¡Has aplicado a este anuncio correctamente!');
    }



    public function aplicationsJS (){
        $columns = [ "id", "worker_id", "job_id", "worker_msg"];
        $searchable = [ "id", "worker_id", "job_id", "worker_msg"];
        $orderable = [ "*" ];

        return DataTablesJson::getResponse(Application::query(), $columns, $searchable, $orderable);

    }
}
