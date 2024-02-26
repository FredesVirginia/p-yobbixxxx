<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PageController extends Controller
{

   public function pricing() {
    return view('app.membership_info');
   }

}
