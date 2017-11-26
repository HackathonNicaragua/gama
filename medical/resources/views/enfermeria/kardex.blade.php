@extends('adminlte::page')

@section('htmlheader_title')
	Enfermeria-Kardex
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<h2>Kardex del paciente {{$k->nombres}}</h2>
				<p>	{{$k}}	</p>
			</div>
		</div>
	</div>
@endsection
