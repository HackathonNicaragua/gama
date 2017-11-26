<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\expediente;
use App\Model\hoja_evolucion;
use App\Model\registro_evolucion;
use Illuminate\Support\Facades\Redirect;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $expedientes = expediente::join('paciente', 'paciente.id_paciente', '=', 'expediente.id_paciente')
        ->get();

        //return dd($);

        return view('doctor/indexExpediente', ['expedientes'=>$expedientes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function create_hoja($id_expediente)
    {
        $expediente = expediente::findOrFail($id_expediente);
        return view('doctor/hojaevolucionCreate', ['expediente'=>$expediente]);
    }
    public function create_registro_evolucion($id_hoja_evolucion)
    {
        $hoja_evolucion = hoja_evolucion::findOrFail($id_hoja_evolucion);
        return view('doctor/registroevolucionCreate', ['hoja_evolucion'=>$hoja_evolucion]);
    }

    public function store_registro_evolucion(Request $request)
    {
        $registro_evolucion = new registro_evolucion;
        $registro_evolucion->id_hoja_evolucion = $request->get('id_hoja_evolucion');
        $registro_evolucion->fecha_hora = $request->get('fecha_hora')." 00:00:00";
        $registro_evolucion->id = 1;
        $registro_evolucion->estancia_hospitalaria = $request->get('estancia_hospitalaria');
        $registro_evolucion->sintomas = $request->get('sintomas');
        $registro_evolucion->descripcion_fisica = $request->get('descripcion_fisica');
        $registro_evolucion->resumen = $request->get('resumen');
        $registro_evolucion->plan_alimentacion = $request->get('plan_alimentacion');
        $registro_evolucion->reportar_evento = 1;

        $registro_evolucion->save();
        return Redirect::to('doctor/expediente/ver');
    }

    public function store_hoja(Request $request)
    {
        $hoja_evolucion=new hoja_evolucion;

        $hoja_evolucion->id_hospital=22;
        $hoja_evolucion->id_expediente=$request->get('id_expediente');
        $hoja_evolucion->fecha_creacion= $request->get('fecha_creacion') ." 00:00:00";
        $hoja_evolucion->num_cama=$request->get('num_cama');
        $hoja_evolucion->sala=$request->get('sala');
        $hoja_evolucion->activo=1;
        $hoja_evolucion->save();

        return Redirect::to('doctor/expediente/ver');
    }

    public function index_hoja($id_expediente)
    {
        $hojas_expediente = hoja_evolucion::all()->where('id_expediente',$id_expediente);
        
        // return dd($id_expediente);
        return view('doctor/hojasevolucionIndex', ['hojas_expediente'=>$hojas_expediente]);

    }

    public function index_registros($id_hoja)
    {
        $hoja_expediente = hoja_evolucion::find($id_hoja);
        $registros_evolucion = registro_evolucion::all()->where('id_hoja_evolucion',$id_hoja);
        
        // return dd($id_expediente);
        return view('doctor/registrosevolucionIndex', ['registros_evolucion'=>$registros_evolucion,'hoja_expediente'=>$hoja_expediente]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
