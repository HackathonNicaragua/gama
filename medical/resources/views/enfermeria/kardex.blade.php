@extends('adminlte::page')

@section('htmlheader_title')
	Kardex-Sala
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">                
            <h1>Ver kardex de pacientes por sala:</h1>
                <div class="dropdown">                
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Selecciona la sala...
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @foreach($salas as $s)
                        <li><a href="kardex/{{$s->sala}}">{{$s->sala}}</a></li>                    
                        @endforeach                                                 
                    </ul>
                    </div>
			</div>
		</div>
	</div>
@endsection
