@extends('adminlte::page')

@section('htmlheader_title')
	Pacientes
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">                
            @if(count($pacientes) > 0 )
                 <ul>                            
                 @foreach($pacientes as $p)
                     <li>
                        <h2>Paciente {{$p->nombres}} {{$p->apellidos}}. Edad:{{$p->edad}}. Fecha de ingreso {{$p->fecha_ingreso}}</h2>     
                     </li>
                    
                 @endforeach
                 </ul>
            @else
                <h2>No hay items</h2>
            @endif
			</div>
		</div>
	</div>
@endsection
