@extends('adminlte::page')

@section('htmlheader_title')
	Change Title here!
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Selecciona la sala para generar las hojas de medicación...
						<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						@foreach($salas as $s)
						<li><a href="hojas_medicas/sala/{{$s->sala}}">{{$s->sala}}</a></li>
						@endforeach
				</ul>
				</div>


			</div>
		</div>
	</div>
@endsection
