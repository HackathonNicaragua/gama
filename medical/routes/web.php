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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
     Route::get("enfermeria", 'Enfermeria@index');
     Route::get("enfermeria/pacientes/", 'Enfermeria@pacientes');
     Route::get("enfermeria/paciente/{id}/hojamedica", 'Enfermeria@hojamedica');     
     //Esta ruta va a mostrarme un kardex en especifico
     //Aqui el enfermero podra imprimir el kardex si lo desea
     Route::get("enfermeria/paciente/{id}/kardex", "Enfermeria@kardexPaciente");


});

Route::auth();
