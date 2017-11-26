@extends('adminlte::page')

@section('htmlheader_title')
	Enfermeria-Kardex
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
                    Kardex del paciente {{$k->nombres}}
					{{$k}}
					
			</div>
		</div>
	</div>
@endsection
