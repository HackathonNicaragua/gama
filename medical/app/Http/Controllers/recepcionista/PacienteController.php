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

    public function createForm($id=null)
    {
      $p = paciente::find($id);
      //$p = new paciente;
      //$p->id_paciente=$id;
    	return view('recepcionista.paciente.creation',['paciente'=>$p]);
    }

    public function create()
    {

        if(request()->input("record_id")==null)
        {
            $p = paciente::save(request()->all());
        }else{
            $p = paciente::find(request()->input("record_id"));

            if(request()->input("nombres")!=null)
              $p->nombres = request()->input("nombres");

            if(request()->input("apellidos")!=null)
              $p->apellidos = request()->input("apellidos");

            if(request()->input("cedula")!=null)
              $p->cedula = request()->input("cedula");

            if(request()->input("edad")!=null)
              $p->edad = request()->input("edad");

            if(request()->input("sexo")!=null)
              $p->sexo = request()->input("sexo");

        }


        return dd(request());
    }
}
