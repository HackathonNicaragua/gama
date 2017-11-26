@extends('adminlte::page')

@section('htmlheader_title')
	Kardex-Sala
@endsection
@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">                
            <h1 class="text-center">Ver kardex de pacientes para la sala {{$sala}}</h1>
            @foreach ($pacientes as $p)
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
            @endforeach            
			</div>
		</div>
	</div>
@endsection
