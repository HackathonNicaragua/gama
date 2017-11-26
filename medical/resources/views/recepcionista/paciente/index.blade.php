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
                             <table id="tabla" class="table table-condensed table-striped table-bordered text-center">
                                 <thead>
                                     <th >Cedula</th>
                                     <th >Nombre</th>
                                     <th >Edad</th>
                                     <th >Sexo</th>
                                     <th ><i class="fa fa-bolt"></i></th>
                                 </thead>
                                 <tbody>
                                     @foreach($pacientes as $p)
                                        <tr>
                                            <td class="text-center">{{$p->cedula}}</td>
                                            <td class="text-center">{{$p->nombres.' '.$p->apellidos}}</td>
                                            <td class="text-center">{{$p->edad}}</td>
                                            <td class="text-center">{{$p->sexo}}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pacientemodal" rel="tooltip" title="Detalles"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-success" data-toggle="tooltip" title="Editar"><i class="fa fa-file-text-o"></i></a>
                                                <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @include('recepcionista.paciente.pacientemodal')
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
