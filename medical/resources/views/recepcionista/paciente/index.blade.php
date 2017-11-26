@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection

@section('contentheader_title','Pacientes')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                             <table id="tabla" class="table table-condensed table-striped table-bordered text-center">
                                 <thead>
                                     <th >Cedula</th>
                                     <th >Nombre</th>
                                     <th >Edad</th>
                                     <th >Sexo</th>
                                     <th >Opciones</th>
                                 </thead>
                                 <tbody>
                                     @foreach($pacientes as $p)
                                        <tr>
                                            <td class="text-center">{{$p->cedula}}</td>
                                            <td class="text-center">{{$p->nombres.' '.$p->apellidos}}</td>
                                            <td class="text-center">{{$p->edad}}</td>
                                            <td class="text-center">{{$p->sexo}}</td>
                                        </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                        </div>
                    </div>                    
                </div>
                
			</div>
		</div>
	</div>
@endsection
