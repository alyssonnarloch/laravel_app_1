@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Novo</div>
		<div class="panel-body">
			{!! Form::open(['url' => 'product', 'class' => 'form-horizontal']) !!}
			@include('products._form')
			{!! Form::close() !!}
		</div>
	</div>
@endsection