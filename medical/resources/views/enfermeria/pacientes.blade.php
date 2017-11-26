@extends('adminlte::page')

@section('htmlheader_title')
	Pacientes
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">                
            @if(count($pacientes) > 0 )
            <h2>Pacientes activos</h2>
            <div class="list-group">
                 @foreach($pacientes as $p)
                 
                    <a href="pacientes/{{$p->id_paciente}}" class="list-group-item">
                    <h3><b> {{$p->nombres}}</b></h2>     
                    </a>                                                         
                 @endforeach
                 </div>                 
            @else
                <h2>No hay items</h2>
            @endif
			</div>
		</div>
	</div>
@endsection
