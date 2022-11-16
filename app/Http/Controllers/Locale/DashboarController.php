<?php

namespace App\Http\Controllers\Locale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    //
    public function index(){
        //
        
        return view('Principal.Dashboard');
    }

}
