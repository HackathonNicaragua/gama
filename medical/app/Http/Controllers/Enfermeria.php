<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\paciente;
use App\Model\expediente;
use App\Model\kardex;
use App\Model\medicamento;
use App\Model\hoja_evolucion;
use App\Model\registro_evolucion;

use Illuminate\Support\Facades\DB;


class Enfermeria extends Controller
{
    public function index(){
    	return view('enfermeria.index');
    }

    public function hojamedica($id){        
        $kardex =
        medicamento::select(
            'medicamento.nombre', 
            'medicamento.presentacion',
            'dosis_medicamentos.*',
            'paciente.*'                      
        )
        ->join('dosis_medicamentos','medicamento.id_medicamento', '=', 'dosis_medicamentos.id_dosis_medicamento')
        ->join('registro_evolucion','registro_evolucion.id_registro_evolucion', '=', 'dosis_medicamentos.id_dosis_medicamento')
        ->join('hoja_evolucion','hoja_evolucion.id_hoja_evolucion', '=', 'registro_evolucion.id_registro_evolucion')
        ->join('expediente','expediente.id_expediente', '=', 'hoja_evolucion.id_expediente')
        ->join('paciente','paciente.id_paciente', '=', 'expediente.id_expediente')
        ->where('paciente.id_paciente', '=', $id)
        ->first(); 
            if (isset($k)) {
                return view('enfermeria.hojasmedica', ['k'=>$kardex]);   
            }else{
                abort(404);
            }    	
    }

    //
    public function pacientes(){
    	//id_paciente	nombres	apellidos	edad	sexo	cedula	fecha_ingreso
    	$p = paciente::all();    	
    	return view('enfermeria.pacientes', ['pacientes'=>$p]);
    }
    
    public function pacientesID($id)
    {        
        $paciente = paciente::find($id);        
        $registros_evol = DB::select('SELECT 
        *
        FROM paciente pa        
        INNER JOIN expediente exp ON pa.id_paciente = exp.id_paciente
        INNER JOIN hoja_evolucion he ON he.id_expediente = exp.id_expediente
        INNER JOIN registro_evolucion re ON re.id_hoja_evolucion = he.id_hoja_evolucion        
        WHERE pa.id_paciente = ?', [$id]);                          
        $medicamentos = [];

        for ($i=0; $i < count($registros_evol); $i++) {             
            $x = DB::select('SELECT 
            *
            FROM registro_evolucion re
            
            INNER JOIN dosis_medicamentos dosis ON re.id_registro_evolucion = dosis.id_registro_evolucion
            INNER JOIN medicamento med ON med.id_medicamento = dosis.id_medicamento
            WHERE re.id_registro_evolucion = ?',[$registros_evol[$i]->id_registro_evolucion]);
            $medicamentos+= $x;
        }            
        //return dd($medicamentos);
    	return view('enfermeria.paciente_detalle', ['medicamentos'=>$medicamentos,'p'=>$paciente]);
    }

    //Esta ruta te permite ver los kardex por sala
    public function kardex()
    {
        //Vamos a traer los numeros de sala que hay registrados en el servidor
        $salas = hoja_evolucion::select('sala')->get();        
        return view('enfermeria.kardex', ['salas'=>$salas]);
    }


    public function kardex_sala($sala)
    {   
        
        //Buscando los pacientes que esten registrados en la $sala
        $pacientes = paciente::select('paciente.*','hoja_evolucion.*')        
        ->join('expediente','expediente.id_paciente', '=', 'paciente.id_paciente')
        ->join('hoja_evolucion','expediente.id_expediente', '=', 'hoja_evolucion.id_expediente')                
        ->where('hoja_evolucion.sala', '=', $sala)
        ->get();        

        $registros_evol;
        
        //Un foreach
        foreach ($pacientes as $paciente) {                  
            $registros_evol = DB::select('SELECT 
            *
            FROM paciente pa        
            INNER JOIN expediente exp ON pa.id_paciente = exp.id_paciente
            INNER JOIN hoja_evolucion he ON he.id_expediente = exp.id_expediente
            INNER JOIN registro_evolucion re ON re.id_hoja_evolucion = he.id_hoja_evolucion        
            WHERE pa.id_paciente = ?', [$paciente->id_paciente]);
            
            
        }    
        $medicamentos = [];

        for ($i=0; $i < count($registros_evol); $i++) {             
            $x = DB::select('SELECT 
            *
            FROM registro_evolucion re
            
            INNER JOIN dosis_medicamentos dosis ON re.id_registro_evolucion = dosis.id_registro_evolucion
            INNER JOIN medicamento med ON med.id_medicamento = dosis.id_medicamento
            WHERE re.id_registro_evolucion = ?',[$registros_evol[$i]->id_registro_evolucion]);
            $medicamentos+= $x;
        }       
            
        
        return view('enfermeria.kardex_sala', ['sala'=>$sala,'pacientes'=>$pacientes,'medicamentos'=>$medicamentos]);
    }

    public function kardexPaciente($id){

        $kardex =
        medicamento::select(
            'medicamento.nombre', 
            'medicamento.presentacion',
            'dosis_medicamentos.*',
            'paciente.*'                         
        )
        ->join('dosis_medicamentos','medicamento.id_medicamento', '=', 'dosis_medicamentos.id_dosis_medicamento')
        ->join('registro_evolucion','registro_evolucion.id_registro_evolucion', '=', 'dosis_medicamentos.id_dosis_medicamento')
        ->join('hoja_evolucion','hoja_evolucion.id_hoja_evolucion', '=', 'registro_evolucion.id_registro_evolucion')
        ->join('expediente','expediente.id_expediente', '=', 'hoja_evolucion.id_expediente')
        ->join('paciente','paciente.id_paciente', '=', 'expediente.id_expediente')
        ->where('paciente.id_paciente', '=', $id)
        ->first(); 
        if (isset($kardex)) {
            return view('enfermeria.kardex_paciente', ['k'=>$kardex]);   
        }else{
            abort(404);
        }              	
    }    
}
