<?php
namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Redirect;
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

    //Aqui va a poder ver las hojas al seleccionar de un pulldow
    public function hojas_medicasIndex()
    {
        $salas = hoja_evolucion::select('sala')->get();
      return view('enfermeria.hojas_med_index',['salas'=>$salas]);
    }

    public function hoja_med_salas($sala, $success=null)
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
          $x = DB::select('SELECT * FROM registro_evolucion re
          INNER JOIN dosis_medicamentos dosis ON re.id_registro_evolucion = dosis.id_registro_evolucion
          INNER JOIN medicamento med ON med.id_medicamento = dosis.id_medicamento
          WHERE re.id_registro_evolucion = ?',[$registros_evol[$i]->id_registro_evolucion]);
          $medicamentos+= $x;
      }

      //Esto me va a retornar las aplicaciones realizadas por dosis
      $aplicaciones_dosis = array();


      for ($i=0; $i < count($medicamentos); $i++) {
        $x= DB::select('SELECT * FROM `aplicaciones_medicamentos` WHERE id_dosis_aplicada = ?',[$medicamentos[$i]->id_dosis_medicamento]);
        $aplicaciones_dosis +=$x;

      }



      return view('enfermeria.hojas_med_sala', ['sala'=>$sala,'pacientes'=>$pacientes,'medicamentos'=>$medicamentos, 'success'=>$success]);
    }

    public function hojas_medicas($id_paciente)
    {
        $paciente = paciente::find($id_paciente);
        //Se tiene que mostrar los medicamentos que se le tienen que aplicar
        //Estos deben pueden ser traidos desde el kardex
        return view('enfermeria.hojasmedicas',['p'=>$paciente]);
    }

    public function historialAplicacion($id)
    {
      //Esto me va a retornar las aplicaciones realizadas por dosis
      $aplic = DB::select('SELECT * FROM aplicaciones_medicamentos am
INNER JOIN  dosis_medicamentos on dosis_medicamentos.id_dosis_medicamento = am.id_dosis_aplicada
INNER JOIN medicamento on medicamento.id_medicamento = dosis_medicamentos.id_medicamento
WHERE am.id_dosis_aplicada = ?',[$id]);

      return view('enfermeria.dosis_aplicaciones',['aplic'=>$aplic]);
    }


    public function aplicarDosis($id_sala,$id_dosis)
    {
      $aplic = DB::select('SELECT * FROM aplicaciones_medicamentos am
      INNER JOIN  dosis_medicamentos on dosis_medicamentos.id_dosis_medicamento = am.id_dosis_aplicada
      INNER JOIN medicamento on medicamento.id_medicamento = dosis_medicamentos.id_medicamento
      WHERE am.id_dosis_aplicada = ?',[$id_dosis]);
        try {
           DB::select('INSERT INTO `aplicaciones_medicamentos` (`id_aplicacion`, `id_dosis_aplicada`, `tiempo_aplicacion`) VALUES (NULL, ?, CURRENT_TIMESTAMP);',[$id_dosis]);
           $res = 1;
        } catch (Exception $e) {
          $res = null;
        }
        return Redirect::to('enfermeria/hojas_medicas/sala/'.$id_sala)->with('status','Dosis aplicada '.$aplic[0]->nombre.' correctamente!');
    }
}
