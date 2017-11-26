<?php

namespace App\Http\Controllers\AdminUsers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Model\rel_hospital_user;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return view('adminUsers/indexUsers', ['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminUsers/createUsers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $usuario=new User;
        $usuario->name=$request->get('name');
        $usuario->nombres=$request->get('nombres');
        $usuario->apellidos=$request->get('apellidos');
        $usuario->cedula=$request->get('cedula');
        $usuario->fecha_registro= $request->get('fecha_registro') ." 00:00:00";
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt('contra');
        $usuario->tipo=$request->get('tipo');;
        $usuario->save();

        $idU = $usuario->id;

        $hu = new rel_hospital_user;

        // Creando el expediente
        $h = rel_hospital_user::select('id_hospital')->where('id','=',auth()->user()->id)->first();
        // return $h->id_hospital;
        $hu->id_hospital = $h->id_hospital;
        $hu->id = $idU;

        $hu->save();

        return Redirect::to('administrador/usuarios/ver');

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
