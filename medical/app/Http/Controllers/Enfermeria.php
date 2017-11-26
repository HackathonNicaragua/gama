<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Enfermeria extends Controller
{
    public function index(){
    	return view('enfermeria.index');
    }

    public function hojamedica($id){
    	return view('enfermeria.hojasmedica', ['id' => $id]);
    }

    public function kardex(){
    	return 'Aqui vamos a mostrar una lista del kardex';
    }

    public function kardexPaciente($id){
    	return 'Vamos a trabajar el kardex del paciente '.$id;
    }
}
