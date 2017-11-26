@extends('adminlte::page')

@section('htmlheader_title')
	
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				
				<h1>Mostrando la hoja medica de {{$k->nombres}}</h1>				
				{{$k}}
			</div>
		</div>
	</div>
@endsection
