@extends('template.layout')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Edição</div>
		<div class="panel-body">
			{!! Form::open(['url' => 'product/' . $product->id, 'method' => 'put', 'class' => 'form-horizontal']) !!}
			@include('products._form')
			{!! Form::close() !!}
		</div>
	</div>
@endsection