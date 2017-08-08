@extends('template.layout')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Lista de produtos</div>
		<div>
			<button type="button" class="btn btn-default">
				Novo
			</button>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>Estoque</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td>{{ $product->stock_amount }}</td>
					<td></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection