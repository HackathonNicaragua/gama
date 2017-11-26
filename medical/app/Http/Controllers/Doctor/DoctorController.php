<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\expediente;
use App\Model\hoja_evolucion;
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
        
        // return dd($hojas_expediente);
        return view('doctor/hojasevolucionIndex', ['hojas_expediente'=>$hojas_expediente]);

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
