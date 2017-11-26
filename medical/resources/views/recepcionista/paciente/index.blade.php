@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection

@section('contentheader_title','Pacientes')

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-16">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                             <table id="tabla" class="table table-condensed table-striped table-bordered">
                                 <thead>
                                     <th class="text-center">Cedula</th>
                                     <th class="text-center">Nombre</th>
                                     <th class="text-center">Edad</th>
                                     <th class="text-center">Sexo</th>
                                     <th class="text-center"><i class="fa fa-bolt"></i></th>
                                 </thead>
                                 <tbody>
                                     @foreach($pacientes as $p)
                                        <tr class="text-center">
                                            <td>{{$p->cedula}}</td>
                                            <td>{{$p->nombres.' '.$p->apellidos}}</td>
                                            <td>{{$p->edad}}</td>
                                            <td>{{$p->sexo}}</td>
                                            <td>
                                                <a href="{{URL::action('recepcionista\PacienteController@create',$p->id_paciente)}}" class="btn btn-success" data-toggle="tooltip" title="Editar"><i class="fa fa-file-text-o"></i></a>
                                            </td>   
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
