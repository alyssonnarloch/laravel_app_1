@extends('template.layout')

@section('content')
	<h2>Edição</h2>
	{!! Form::open(['url' => 'product/' . $product->id, 'method' => 'put', 'class' => 'form-horizontal']) !!}
	@include('products._form')
	{!! Form::close() !!}
@endsection