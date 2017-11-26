<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('adminlte::auth.login2');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
     Route::get("enfermeria", 'Enfermeria@index');
     Route::get("enfermeria/pacientes/", 'Enfermeria@pacientes');
     Route::get("enfermeria/pacientes/{id}", 'Enfermeria@pacientesID');
     Route::get("enfermeria/pacientes/{id}/hojamedica", 'Enfermeria@hojamedica');
     Route::get("enfermeria/kardex", 'Enfermeria@kardex');
     Route::get("enfermeria/kardex/{sala}",'Enfermeria@kardex_sala');
     Route::get("enfermeria/pacientes/", 'Enfermeria@pacientes');
     Route::get("enfermeria/pacientes/{id}", 'Enfermeria@pacientesID');
     Route::get("enfermeria/pacientes/{id}/hojas_medicas", 'Enfermeria@hojas_medicas');
     //Esta ruta va a mostrarme un kardex en especifico
     //Aqui el enfermero podra imprimir el kardex si lo desea
     Route::get("enfermeria/hojas_medicas", "Enfermeria@hojas_medicasIndex");
     Route::get("enfermeria/hojas_medicas/sala/{id}", "Enfermeria@hoja_med_salas");
     Route::get("enfermeria/hojas_medicas/{id}/historial","Enfermeria@historialAplicacion");
     Route::get("enfermeria/pacientes/{id}/kardex", "Enfermeria@kardexPaciente");
     Route::get("enfermeria/{id_sala}/aplicardosis/{id}", "Enfermeria@aplicarDosis");

     // Rutas Recepcionista
       Route::get('recepcionista/pacientes','recepcionista\PacienteController@index');
       Route::get('recepcionista/pacientes/ingreso/{id?}','recepcionista\PacienteController@create');
       Route::post('recepcionista/pacientes/ingreso','recepcionista\PacienteController@store');
       Route::get('administrador/usuarios/ver', 'AdminUsers\AdminController@index');
       Route::get('administrador/usuarios/crear', 'AdminUsers\AdminController@create');
       Route::post('administrador/usuarios/creado', 'AdminUsers\AdminController@store');
});

Route::auth();
