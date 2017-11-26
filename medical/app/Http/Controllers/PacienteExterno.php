<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\paciente;
use Exception;

class PacienteExterno extends Controller
{
    public function pacientesID(Request $request)
    {
      $s = $request['s'];
      try {
        $p1 = DB::table('paciente')
                  ->where('cedula', 'like', '%'.$s.'%')
                  ->first();
                  $registros_evol = DB::select('SELECT
                  *
                  FROM paciente pa
                  INNER JOIN expediente exp ON pa.id_paciente = exp.id_paciente
                  INNER JOIN hoja_evolucion he ON he.id_expediente = exp.id_expediente
                  INNER JOIN registro_evolucion re ON re.id_hoja_evolucion = he.id_hoja_evolucion
                  WHERE pa.id_paciente = ?', [$p1->id_paciente]);
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
                  return view('paciente.paciente_externo', ['medicamentos'=>$medicamentos,'p'=>$p1]);
      } catch (Exception $e) {
          abort(404);
      }


    }
}
