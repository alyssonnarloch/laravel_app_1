@extends('template.layout')

@section('content')
	<h2>Novo</h2>
	{!! Form::open(['url' => 'product', 'class' => 'form-horizontal']) !!}
	@include('products._form')
	{!! Form::close() !!}
@endsection