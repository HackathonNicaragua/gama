@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<h2>Registros de Evolución</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">                
                <div class="panel panel-default">
                    <div class="panel-body"> 
                    	<div class="col-md-12">
                    		<p><strong>Fecha registro:</strong> <span>{{date('M d, Y', strtotime($hoja_expediente->fecha_creacion))}}</span></p>
					        <p><strong>Cama:</strong> <span>{{$hoja_expediente->num_cama}}</span></p>
					        <p><strong>Sala:</strong> <span>{{$hoja_expediente->sala}}</span></p>  
                    	</div>  
                    	<div class="col-md-12">
                    		<div class="table-responsive">
                             <table class="table table-condensed table-striped table-bordered text-center">
                                 <thead>
                                   	 <th >Fecha de Creacion</th>
                                     <th >Estancia hospitalaria</th>
                                     <th >Sintomas</th>
                                     <th >Descripcion Fisica</th>
                                     <th >Resumen</th>
                                     <th >Plan Alimenticio</th>
                                 </thead>
                                 <tbody>
                                     @foreach($registros_evolucion as $r)
                                        <tr>
                                            <td class="text-center">{{date('M d, Y', strtotime($r->fecha_hora))}}</td>
                                            <td class="text-center">{{$r->estancia_hospitalaria}}</td>
                                            <td class="text-center">{{$r->sintomas}}</td>       
                                            <td class="text-center">{{$r->descripcion_fisica}}</td>
                                            <td class="text-center">{{$r->resumen}}</td> 
                                            <td class="text-center">{{$r->plan_alimentacion}}</td>                                     
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
	</div>
@endsection
