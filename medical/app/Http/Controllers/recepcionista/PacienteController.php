<?php

namespace App\Http\Controllers\recepcionista;

use Illuminate\Http\Request;
use App\Model\paciente;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
    public function index(){
    	$p = paciente::all();
    	return view('recepcionista.paciente.index',['pacientes'=>$p]);
    }
    public function show($id){
    	$p = paciente::find($id):

    	return 
    }
}
