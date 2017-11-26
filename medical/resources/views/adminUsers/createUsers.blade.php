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

						<form method="POST" action="{{ action('AdminUsers\AdminController@store') }}">
							{!! csrf_field() !!}

							<div class="form-group">
						    <label for="nombres">Usuario:</label>
						    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre de usuario">
						  </div>

							<div class="form-group">
						    <label for="nombres">Nombres:</label>
						    <input type="text" name="nombres" class="form-control" id="nombres" >
						  </div>

							<div class="form-group">
						    <label for="apellidos">Apellidos:</label>
						    <input type="text" name="apellidos" class="form-control" id="apellidos">
						  </div>

							<div class="form-group">
						    <label for="cedula">Cedula:</label>
						    <input type="text" name="cedula" class="form-control" id="cedula" placeholder="000111111000X">
						  </div>

							<div class="form-group">
						    <label for="edad">Fecha Registro:</label>
						    <input type="date" name="fecha_registro" class="form-control"  id="fecha_registro">
						  </div>

						  <div class="form-group">
						    <label for="edad">Correo:</label>
						    <input type="email" name="email" class="form-control"  id="email" placeholder="ejemplo@ejemplo.com">
						  </div>

							 <div class="form-group">
							  <label for="sel1">Tipo:</label>
							  <select class="form-control" id="tipo" name="tipo">
							    <option value="3">Enfermero/a</option>
							    <option value="2">Recepcionista</option>
							    <option value="1">Doctor/a</option>
							    <option value="0">Admin</option>
							  
							  </select>
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
