@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">

										 	<h2> Paciente: <b><u> {{$p->nombres}} {{$p->apellidos}}</u></b></h2>

				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h1 class="box-title">Datos básicos</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-responsive">

                        <tbody>
                        <tr>
                            <td><b>Edad</b></td>
                            <td>{{$p->edad}}</td>
                        </tr>
                        <tr>
                            <td><b>Cédula</b></td>
                            <td>{{$p->cedula}}</td>
                        </tr>
                        <tr>
                            <td><b>Fecha de ingreso</b></td>
                            <td>{{$p->fecha_ingreso}}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <h1></h1>
                <!-- Caja del ultimo kardex del paciente -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h1 class="box-title">Kardex activo</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-responsive">
                        <thead>
                        <th>
                            Medicamento
                        </th>
                        <th>
                            Dosis
                        </th>
                        <th>
                            Periodo
                        </th>
                        </thead>
                        <tbody>

                            @foreach($medicamentos as $m)
                            <tr>
                            <td>{{$m->nombre}} - {{$m->presentacion}}</td>
                            <td>{{$m->cantidad_medicamento}}</td>
                            <td>Cada {{$m->periodo}} hrs</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- Caja de eventos relacionados al paciente -->
                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h1 class="box-title">Últimos eventos</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-responsive">
                        <thead>
                        <th>
                            Hora
                        </th>
                        <th>
                            Enfermero
                        </th>
                        <th>
                            Tipo
                        </th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>8 AM</td>
                            <td>Jorge S.</td>
                            <td>Chequeo</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>

								<a href="{{url('/enfermeria/pacientes/'.$p->id_paciente.'/hojas_medicas')}}" class="btn btn-primary" >
									<span class="fa fa-bookmark"></span>
									 Ver hoja de medicación
									</a>
			</div>
		</div>
	</div>
@endsection
