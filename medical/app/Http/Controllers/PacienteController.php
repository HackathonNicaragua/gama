<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Model\paciente;

class PacienteController extends Controller
{
    public function index(){
    	return view('recepcionista.paciente.index');
    }
}
