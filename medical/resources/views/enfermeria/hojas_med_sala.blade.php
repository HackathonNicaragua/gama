@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				@if (session('status'))
			    <div class="alert alert-success">
			        <h3><b>{{ session('status') }}</b></h3>
			    </div>
			@endif
				<h1>Hojas médicas para la sala {{$sala}}</h1>
				@foreach($pacientes as $p)
				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Paciente: <b>{{$p->nombres}}</b> <br> Cama <b>{{$p->num_cama}}</b></h3>
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
											<th>Estado</th>
											</thead>
											<tbody>

											@foreach($medicamentos as $m)
											<tr>
													<td>{{$m->nombre}} - {{$m->presentacion}}</td>
													<td>{{$m->cantidad_medicamento}}</td>
													<td>Cada {{$m->periodo}} hrs</td>
													<td>
														<a href="{{url('enfermeria/'.$sala.'/aplicardosis/'.$m->id_dosis_medicamento)}}" class="btn btn-warning"> Aplicar</a>
													<a href="{{url('enfermeria/hojas_medicas/'.$m->id_dosis_medicamento.'/historial')}}" class="btn btn-success"> Historial</a>


													</td>
											</tr>
											@endforeach
											</tbody>
									</table>
									<p class="text-muted"> Generada: {{$p->fecha_creacion}} </p>
									</div>
                    </div>
                    <!-- /.box-body -->
            </div>



				@endforeach
			</div>
		</div>
	</div>

@endsection
