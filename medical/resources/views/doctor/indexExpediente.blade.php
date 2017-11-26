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
                                     <th >Nombres</th>
                                     <th >Apellidos</th>
                                     <th >Cédula</th>
                                     <th >Edad</th>
                                     <th >Sexo</th>
                                     <th >Fecha creación</th>
                                     <th >Opciones</th>
                                 </thead>
                                 <tbody>
                                     @foreach($expedientes as $expediente)
                                        <tr>
                                            <td class="text-center">{{$expediente->nombres}}</td>
                                            <td class="text-center">{{$expediente->apellidos}}</td>
                                            <td class="text-center">{{$expediente->cedula}}</td>
                                            <td class="text-center">{{$expediente->edad}}</td>
                                            <td class="text-center">{{$expediente->sexo}}</td>
                                            <td class="text-center">{{date('M d, Y', strtotime($expediente->fecha_creacion))}}</td>
                                            <td class="text-center">
                                                <a href="{{url('doctor/expediente/hoja_evolucion/crear', $expediente->id_expediente)}}" class="btn btn-primary" rel="tooltip" title="Agregar hoja evolución"><i class="fa fa-plus"></i></a>
                                                <a href="{{url('doctor/expediente/hoja_evolucion/ver', $expediente->id_expediente)}}" class="btn btn-default" rel="tooltip" title="Ver hojas de evolución"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-success" data-toggle="tooltip" title="Editar"><i class="fa fa-file-text-o"></i></a>
                                                <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        {{-- @include('adminUsers.usersmodal') --}}
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
