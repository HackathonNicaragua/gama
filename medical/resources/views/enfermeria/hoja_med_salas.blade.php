@extends('adminlte::page')

@section('htmlheader_title')
	Hojas médicas por salas
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
			<h1>Mostrando las hojas medica de la sala {{$salas->numero}}</h1>

			</div>
		</div>
	</div>
@endsection
