@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
                <h2>Hojas de Evolución</h2>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                             <table id="tabla" class="table table-condensed table-striped table-bordered text-center">
                                 <thead>
                                    <th >Fecha de Creacion</th>
                                     <th >Cama</th>
                                     <th >Sala</th>
                                     <th >Opciones</th>                                     
                                 </thead>
                                 <tbody>
                                     @foreach($hojas_expediente as $hoja_expediente)
                                        <tr>
                                            <td class="text-center">{{date('M d, Y', strtotime($hoja_expediente->fecha_creacion))}}</td>
                                            <td class="text-center">{{$hoja_expediente->num_cama}}</td>
                                            <td class="text-center">{{$hoja_expediente->sala}}</td>
                                            <td class="text-center">
                                                <a href="{{url('doctor/expediente/hoja_evolucion/registro_evolucion/crear', $hoja_expediente->id_hoja_evolucion)}}" class="btn btn-primary" rel="tooltip" title="Agregar registro evolución"><i class="fa fa-plus"></i></a>
                                                <a href="{{url('doctor/expediente/hoja_evolucion/registros_evolucion/ver', $hoja_expediente->id_hoja_evolucion)}}" class="btn btn-default" rel="tooltip" title="Ver registros de evolución"><i class="fa fa-eye"></i></a>
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
