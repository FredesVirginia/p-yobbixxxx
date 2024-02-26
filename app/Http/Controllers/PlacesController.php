<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlacesController extends Controller
{

    public function api(Request $request)
    {
        $places = Place::where('name', 'like', '%' . $request->input('q') . '%')->take(5)->get(['id', 'name']);
        return response()->json($places);
    }

}
