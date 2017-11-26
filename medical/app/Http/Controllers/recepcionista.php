<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class recepcionista extends Controller
{
    public function index(){
    	return view('recepcionista/index');
    }
}
