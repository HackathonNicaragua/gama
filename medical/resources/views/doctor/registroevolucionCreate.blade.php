@extends('adminlte::page')

@section('htmlheader_title')
    Change Title here!
@endsection

@section('contentheader_title','Ingresar Registro')

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form method="POST" action="{{ action('Doctor\DoctorController@store_registro_evolucion') }}">
                            {!! csrf_field() !!}

                            <input type="hidden" name="id_hoja_evolucion" value="{{$hoja_evolucion->id_hoja_evolucion}}">

                            <div class="form-group">
                            <label for="fecha_hora">Fecha registro:</label>
                            <input type="date" name="fecha_hora" class="form-control"  id="fecha_hora">
                          </div>

                          <div class="form-group">
                            <label for="estancia_hospitalaria">Estancia hospitalaria:</label>
                            <input type="text" name="estancia_hospitalaria" id="estancia_hospitalaria" class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="sintomas">Sintomas:</label>
                            <textarea class="form-control" style="min-width: 100%;max-width: 100%;  max-height: 150px;" name="sintomas"  id="sintomas"> 
                            </textarea>
                          </div>
                          <div class="form-group">
                            <label for="descripcion_fisica">Descripcion Fisica:</label>
                            <textarea class="form-control" style="min-width: 100%;max-width: 100%;  max-height: 150px;" name="descripcion_fisica"  id="descripcion_fisica"> 
                            </textarea>
                          </div>
                          <div class="form-group">
                            <label for="resumen">Resumen:</label>
                            <textarea class="form-control" style="min-width: 100%;max-width: 100%;  max-height: 150px;" name="resumen"  id="resumen"> 
                            </textarea>
                          </div>
                          <div class="form-group">
                            <label for="plan_alimentacion">Plan Alimenticio:</label>
                            <textarea class="form-control" style="min-width: 100%;max-width: 100%;  max-height: 150px;" name="plan_alimentacion"  id="plan_alimentacion"> 
                            </textarea>
                          </div>

                          <button type="submit" id="submit_button" class="btn btn-primary">Guardar</button>
                          <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
