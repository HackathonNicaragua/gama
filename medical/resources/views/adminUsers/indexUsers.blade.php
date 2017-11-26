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
                             <table id="tabla" class="table table-condensed table-striped table-bordered text-center">
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
                                            <td class="text-center">{{$usuario->fecha_registro}}</td>
                                            <td class="text-center">{{$usuario->fecha_registro}}</td>
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
