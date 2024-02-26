<?php

namespace App\Http\Controllers;

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
use App\Helpers\DataTablesJson;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function index(Request $request)
    {
        // Buscar por
        // company,

        // filtros
        // professions
        // abilities (no por ahora)
        // lugar
        // start date
        // salary min / max

        $jobs = Job::with(['company:id,name,url','place:id,name'])->paginate();
        // return $jobs;
        return view('app.jobs.index')
            ->withJobs($jobs);
    }

    public function create()
    {
        $professions = Profession::all();
        $abilities = Ability::all();
        $companies = Company::all();
        return view('dash.jobs.edit', compact('professions', 'abilities', 'companies'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:6|max:30',
            'description' => 'required|string',
            'profession' => 'required',
            'ability' => 'required',
            'places' => 'required',
            'companies' => 'required',
            'experience' => 'required',
            'job_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'start_type' => 'required',
            'salary_min' => 'required|numeric|min:1',
            'salary_max' => 'required|numeric|gt:salary_min',
            'periodicity_payment' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $validated = $validator->validated();
        //  $url = Str::slug($validated['title']);
        $url = Str::slug($validated['title']);
        // Verifica si ya existe una URL similar en la base de datos y ajusta si es necesario
        $count = Job::where('url', 'like', $url . '%')->count();

        if ($count > 0) {
            $url = $url . '_' . ($count + 1);
        }

        $newJob = new Job([

            'title' => $validated['title'],
            'description' => $validated['description'],
            'place_id' =>  $validated['places'],
            'company_id' => $validated['companies'],
            'cached_profession_ids' => $validated['profession'],
            'job_type_id' => $validated['job_type'],
            'cached_ability_ids' => $validated['ability'],
            'experience_type_id' => implode($validated['experience']),
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'start_type_id' => implode($validated['start_type']),
            'salary_min' => $validated['salary_min'],
            'salary_max'  => $validated['salary_max'],
            'payment_periodicity_id' => implode($validated['periodicity_payment']),
            'status' => $validated['status'],
            'url' => $url, // Agrega la URL al objeto Job
        ]);




        $newJob->user_id = auth()->user()->id;
        $newJob->save();

        // Resto de la lógica...

        return redirect()->back()->withSuccess('Se creo el trabajo');
    }



    public function show($url)
    {
       // $id = auth()->user() ? auth()->user()->id : 4;

        // Verificar si hay alguna aplicación asociada al ID del trabajador
        //  $workerAplicationExists = Application::where('worker_id', $id)->exists();

            // Crear la variable $id con el valor correspondiente
        //  $idWorker = ($workerAplicationExists) ? 1 : 0;

        ////////////////////////////////////////////
        // Verificar si hay alguna aplicación asociada al ID del trabajador
        // $workerAplicationExists = Application::where('worker_id', auth()->user()?->id ?? 4)->exists();

        // Crear la variable $idWorker con el valor correspondiente
        // $idWorker = $workerAplicationExists ? 1 : 0;

        // $job = Job::findOrFail($id);
        //payment_periodicity_id
        // $paymentPeriodicityTranslations = Job::TRANS_PAYMENT_PERIODICITY;
        // Busca la coincidencia en el array de traducción
        // $paymentPeriodicityText = collect($paymentPeriodicityTranslations)->search($job->payment_periodicity_id);
        //experience_type_id

        // $now = "Sin Especificar";
        // $professionName = $job->profession ? $job->profession->name : $now;

        //START TYPES
        // $start_type_traslation = Job::TRANS_START_TYPES;
        // $start_type = collect($start_type_traslation)->search($job->start_type_id);
        //TYPE JOB
        // $job_types_traslation = Job::TRANS_JOB_TYPES;
        // $job_types = collect($job_types_traslation)->search($job->job_type_id);
        //ABILITIES
        // $abilitiesName = $job->abilities ? $job->abilities->name : $now;
        //COMPANYS

        // $job = Job::with('company')->where('url', $url)->firstOrFail();

        // $companies = $job->company->name;
        //place
        // $job = Job::with('place')->where('url', $url)->firstOrFail();
        // $place = $job->place->name;

        // $jobData = (object)[
        //     'id' => $job->id,
        //     'job' => $job,
        //     'idWorker' => $idWorker,
        //     'title' => $job->title,
        //     'salary_min' => $job->salary_min,
        //     'salary_max' => $job->salary_max,
        //     'professionName' => $professionName,
        //     'paymentPeriodicityText' => $paymentPeriodicityText,
        //     'start_type' => $start_type,
        //     'job_types' => $job_types,
        //     'abilitiesName' => $abilitiesName,
        //     'companies' => $companies,
        //     'place' => $place,
        //     'description' => $job->description,
        //     'start_date' => $job->start_date,
        //     'end_date' => $job->end_date,
        // ];
        $job = Job::where('url', $url)->with(['company:id,name'])->firstOrFail();

        $applyButton = 'need-register';
        if(auth()->check()){
            if(auth()->user()->isWorker()){
                $applyButton = Application::where('worker_id', auth()->user()->id)->where('job_id', $job->id)->exists() ? 'applied' : 'apply';
            }else{
                $applyButton = 'company';
            }
        }

        return view('app.jobs.show')
            ->withJob($job)
            ->withApplyButton($applyButton);
    }

    public function jobsJS()
    {
        $columns = [ "id", "title", "company_id"];
        $searchable = [ "id", "title", "company_id"];
        $orderable = [ "*" ];

        return DataTablesJson::getResponse(Job::query(), $columns, $searchable, $orderable);
    }

}
