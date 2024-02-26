<?php

namespace App\Http\Controllers\Dash;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Worker;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Place;

class ProfileController extends Controller
{

    public function edit()
    {

        if (auth()->user()->isWorker()) {
            // Si es trabajador
            $worker = auth()->user()->worker()->with('place:id,name')->first();

            return view('dash.profiles.worker')
                ->withWorker($worker);

        } else if (auth()->user()->isCompany()) {

            // Si es compañía
            $company = auth()->user()->company;

            return view('dash.profiles.company')
                ->withCompany($company);
        }

        // Solo administrador puede llegar aquí
        abort(404, 'No se encontró el perfil');
    }


    public function showCompany (){


      if(auth()->user()->isCompany()){
        $company = auth()->user()->company;
        $place = $company->place;
        $categoryName = array_search($company->category_id, Company::CATEGORY);

        return view('app.profiles.company', compact('company', 'categoryName', 'place'));
      }


        abort(404, 'No se encontró el perfil');
    }


    public function store(Request $request)
    {

        if (auth()->user()->isWorker()) {
            // Si es trabajador
            return $this->storeWorker($request, auth()->user()->worker ?? null);

        } else if (auth()->user()->isCompany()) {

            // Si es compañía
            return $this->storeCompany($request, auth()->user()->company ?? null);

        }
    }

    public function storeWorker(Request $request, ?Worker $worker)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:6|max:30',
            'birthday' => 'required|date',
            'phone1' => 'nullable|string|max:20',
            'phone2' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'web' => 'nullable|url|max:255',
            'main_profession_id' =>'required',
            'main_place_id' => 'required',
            'description' =>'required|string|max:600',
            'url' =>'required|alpha_dash:ascii|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $data = [
            'name' => $validated['name'],
            'birthday' => $validated['birthday'],
            'phone1' => $validated['phone1'],
            'phone2' => $validated['phone2'],
            'address' => $validated['address'],
            'web' => $validated['web'],
            'main_profession_id' => $validated['main_profession_id'],
            'main_place_id' => $validated['main_place_id'],
            'description' => $validated['description'],
            'url' => $validated['url'],
            'status' => 1,
        ];


        if(!$worker){
            auth()->user()->worker()->create($data);
            return redirect()->back()->withSuccess("Perfil trabajador creado correctamente.");
        }else{
            $worker->update($data);
            return redirect()->back()->withSuccess("Perfil editado correctamente.");
        }


    }





    public function storeCompany(Request $request, ?Company $company)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:6|max:30',
            'phone1' => 'nullable|string|max:20',
            'phone2' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'web' => 'nullable|url|max:255',
            'nit' => 'required|integer|digits:8',
            'main_place_id' => 'required|integer|exists:places,id',
            'category_id' => 'required|integer|in:' . implode(',', Company::CATEGORY),
            'description' =>'required|string|max:600',
            'url' =>'required|alpha_dash:ascii|max:50',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $data = [
            'name' => $validated['name'],
            'phone1' => $validated['phone1'],
            'phone2' => $validated['phone2'],
            'address' => $validated['address'],
            'web' => $validated['web'],
            'nit' => $validated['nit'],
            'main_place_id' => $validated['main_place_id'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'url' => $validated['url'],
            'status' => 1,
        ];

        if(!$company){
            auth()->user()->company()->create($data + ['main_user_id' => auth()->id()]);
            return redirect()->back()->withSuccess("Compañía creada correctamente.");
        }else{
            $company->update($data);
            return redirect()->back()->withSuccess("Compañía editada correctamente.");
        }


    }



}
