@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection

@section('contentheader_title','Ingresar Paciente')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

											<form method="POST" action="{{ action('recepcionista\PacienteController@create') }}">
												{!! csrf_field() !!}
                				<input id="record_id" type="text" name="id_paciente" class="hidden" value="@if($paciente['id_paciente']){{$paciente['id_paciente']}}@endif" />

												<div class="form-group">
											    <label for="nombres">Nombres:</label>
											    <input type="text" name="nombres" class="form-control" id="pname" value="@if($paciente['nombres']){{$paciente['nombres']}}@endif" >
											  </div>

												<div class="form-group">
											    <label for="apellidos">Apellidos:</label>
											    <input type="text" name="apellidos" class="form-control" id="papellidos"  value="@if($paciente['apellidos']){{$paciente['apellidos']}}@endif" >
											  </div>

												<div class="form-group">
											    <label for="cedula">Cedula:</label>
											    <input type="text" name="cedula" class="form-control" id="pcedula"  value="@if($paciente['cedula']){{$paciente['cedula']}}@endif" >
											  </div>

												<div class="form-group">
											    <label for="edad">Edad:</label>
											    <input type="text" name="edad" class="form-control"  id="pedad"  value="@if($paciente['edad']){{$paciente['edad']}}@endif" >
											  </div>

												<div class="form-group">
													<label for="sexo">Sexo:</label>
													<input type="text" name="sexo" class="form-control"  id="psexo"  value="@if($paciente['sexo']){{$paciente['sexo']}}@endif" >
												</div>

											  <button type="submit" id="submit_button" class="btn btn-default">Guardar</button>
											</form>

                    </div>
                </div>

			</div>
		</div>
	</div>


@endsection

@section("gerald_script")
<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('#submitbutton').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url:  '/recepcionista/paciente/ingreso',
            data:  {record_id : "1"

									},
            success: function( msg ) {
              alert(msg);  //$("#ajaxResponse").append("<div>"+msg+"</div>");
            }
        });
    });
});

</script>
@endsection
