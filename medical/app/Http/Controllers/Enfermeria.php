<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\paciente;
use App\Model\expediente;
use App\Model\kardex;
use App\Model\medicamento;

class Enfermeria extends Controller
{
    public function index(){
    	return view('enfermeria.index');
    }

    public function hojamedica($id){
    	return view('enfermeria.hojasmedica', ['id' => $id]);
    }

    //
    public function pacientes(){
    	//id_paciente	nombres	apellidos	edad	sexo	cedula	fecha_ingreso
    	$p = paciente::all();
    	
    	return view('enfermeria.pacientes', ['pacientes'=>$p]);
    }

    public function kardexPaciente($id){

        $p = paciente::where('id_paciente',$id)->get();

        $kardex =
        medicamento::select(
            'medicamento.nombre', 'medicamento.presentacion'
        )
        ->join('dosis_medicamentos','medicamento.id_medicamento', '=', 'dosis_medicamentos.id_dosis_medicamento')
        ->join('registro_evolucion','registro_evolucion.id_registro_evolucion', '=', 'dosis_medicamentos.id_dosis_medicamento')
        ->join('hoja_evolucion','hoja_evolucion.id_hoja_evolucion', '=', 'registro_evolucion.id_registro_evolucion')
        ->join('expediente','expediente.id_expediente', '=', 'hoja_evolucion.id_expediente')
        ->join('paciente','paciente.id_paciente', '=', 'expediente.id_expediente')
        ->where('paciente.id_paciente', '=', $id)
        ->get();
        
    	return view('enfermeria/kardex',['p'=>$p,'kardex'=>$kardex]);
    }
}
