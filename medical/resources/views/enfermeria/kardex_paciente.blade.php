@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
                <h1>Medicamentos a suministrar al paciente {{$k->nombres}}</h1>
				<div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$k->nombre}}</h3>
                        <div class="box-tools pull-right">                            
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    {{$k}}
                    <div class="box-body">
                        <h2><b>Dosis: </b> {{$k->cantidad_medicamento}}</h2>
                    </div>
                    <!-- /.box-body -->
                </div>

			</div>
		</div>
	</div>
@endsection
