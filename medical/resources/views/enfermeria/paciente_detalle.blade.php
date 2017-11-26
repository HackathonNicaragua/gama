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
                        <h1 class="box-title">{{$p->nombres}} {{$p->apellidos}}</h3>
                        <div class="box-tools pull-right">                            
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">                        
                        <table class="table table-responsive">
                        <thead>
                        <tr>
                            <h1>Datos básicos</h1>
                        </tr>
                        </thead>
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

			</div>
		</div>
	</div>
@endsection
