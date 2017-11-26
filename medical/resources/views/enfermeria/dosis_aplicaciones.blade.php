@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>{{$aplic[0]->nombre}}</b> {{$aplic[0]->presentacion}}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
											<h5>Período: {{$aplic[0]->periodo}} hrs</h5>
											<table class="table table-responsive">
											<thead>
											<th>
													Hora de aplicacion
											</th>
											</thead>
											<tbody>

												@foreach($aplic as $p)
												<tr>
													<td>{{$p->tiempo_aplicacion}}</td>
												</tr>
											@endforeach
											</tbody>
									</table>
									</div>
                    </div>
                    <!-- /.box-body -->
            </div>

			</div>
		</div>
	</div>
@endsection
