@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                             <table id="tabla" class="table table-condensed table-striped table-bo	rdered text-center">
                                 <thead>
                                     <th >Cédula</th>
                                     <th >Nombre</th>
                                     <th >Fecha registro</th>
                                     <th >Opciones</th>
                                 </thead>
                                 <tbody>
                                     @foreach($usuarios as $usuario)
                                        <tr>
                                            <td class="text-center">{{$usuario->cedula}}</td>
                                            <td class="text-center">{{$usuario->nombres.' '.$usuario->apellidos}}</td>
                                            <td class="text-center">{{date('M d, Y', strtotime($usuario->fecha_registro))}}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pacientemodal" rel="tooltip" title="Detalles"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-success" data-toggle="tooltip" title="Editar"><i class="fa fa-file"></i></a>
                                                <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash-o"></i></a>
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
