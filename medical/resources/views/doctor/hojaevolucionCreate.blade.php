@extends('adminlte::page')

@section('htmlheader_title')
    Change Title here!
@endsection

@section('contentheader_title','Ingresar Paciente')

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form method="POST" action="{{ action('Doctor\DoctorController@store_hoja') }}">
                            {!! csrf_field() !!}

                            <input type="hidden" name="id_expediente" value="{{$expediente->id_expediente}}">

                            <div class="form-group">
                            <label for="fecha_creacion">Fecha registro:</label>
                            <input type="date" name="fecha_creacion" class="form-control"  id="fecha_creacion">
                          </div>

                          <div class="form-group">
                            <label for="num_cama">Número de cama:</label>
                            <input type="text" name="num_cama" class="form-control"  id="num_cama">
                          </div>

                          <div class="form-group">
                            <label for="sala">Sala:</label>
                            <input type="text" name="sala" class="form-control"  id="sala">
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
