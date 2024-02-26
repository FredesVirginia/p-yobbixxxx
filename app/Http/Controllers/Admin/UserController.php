<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Helpers\DataTablesJson;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.edit');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:6|max:30',
            'role' => 'required',
            'email' => 'required|email|max:20',
            'password' => 'required|max:255|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            'password_confirmation' => 'required|same:password|max:255',

        ]);




        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validated();
        $newUser = new User ( [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role_id' => $validated['role'],
            'password' => bcrypt($validated['password']),
        ]);

        $newUser->save();

        return redirect()->back()->withSuccess('Se creo el Usuario');
    }

    public function usersJS(Request $request)
    {

        $columns = [ "id", "name", "email", "role_id"];
        $searchable = [ "id", "name", "email" ];
        $orderable = [ "*" ];

        return DataTablesJson::getResponse(User::query(), $columns, $searchable, $orderable);
    }


}
