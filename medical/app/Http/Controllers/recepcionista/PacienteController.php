<?php

namespace App\Http\Controllers\recepcionista;

use Illuminate\Http\Request;
use App\Model\paciente;
use App\Model\expediente;
use App\Model\rel_hospital_user;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
    public function index(){
    	$p = paciente::all();
    	return view('recepcionista.paciente.index',['pacientes'=>$p]);
    }

    public function create($id=null)
    {
      $p = paciente::find($id);
      //$p = new paciente;
      //$p->id_paciente=$id;
    	return view('recepcionista.paciente.creation',['paciente'=>$p]);
    }

    public function store()
    {
        $forms = request()->except('_token');

        if(request()->input('id_paciente')!=null)
          $p = paciente::find(request()->input('id_paciente'));
        else{
          $p = new paciente;
          $e = new expediente;
        }

        if(request()->input('nombres')!=null)
          $p->nombres = request()->input('nombres');

        if(request()->input('apellidos')!=null)
          $p->apellidos = request()->input('apellidos');

        if(request()->input('cedula')!=null)
          $p->cedula = request()->input('cedula');

        if(request()->input('edad')!=null)
          $p->edad = request()->input('edad');

        if(request()->input('sexo')!=null)
          $p->sexo = request()->input('sexo');

        $p->save();
        $idp = $p->id_paciente;

        // Creando el expediente
      	$h = rel_hospital_user::select('id_hospital')->where('id','=',auth()->user()->id)->first();
        // return $h->id_hospital;
        $e->id_hospital = $h->id_hospital;
        $e->id_paciente = $idp;
        $e->id = auth()->user()->id;

        $e->save();

        // return $id_hospital;
        return $this->create($p['id_paciente']);

    }
}
