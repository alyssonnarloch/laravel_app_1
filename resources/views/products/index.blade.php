@extends('template.layout')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Lista de produtos</div>
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				{!! Form::open(['url' => 'product/index', 'method' => 'GET', 'class' => 'form-inline']) !!}
					<div class="form-group">
						{!! Form::text('name', '', ['class' => 'form-controll', 'size' => 50, 'placeholder' => 'Nome do produto']) !!}
						{!! Form::submit('Buscar', ['class' => 'btn btn-primary btn-sm']) !!}
					</div>
				{!! Form::close() !!}
			</div>
			<div class="col-md-1 col-md-offset-3">
				{!! link_to('product/create', $title = 'Novo', $attributes = ['class' => 'btn btn-primary btn-sm']) !!}
			</div>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>Estoque</th>
					<th>Criado</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td>{{ $product->stock_amount }}</td>
					<td>{{ $product->created_at }}</td>
					<td></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<script type="text/javascript">
		$(function() {
			//alert("irrra");
		});
	</script>
@endsection