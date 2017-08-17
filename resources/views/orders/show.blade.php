@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Itens do pedido</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>Preço Unitário</th>
					<th>Quantidade</th>										
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->name }}</td>
					<td>R$ {{ $product->price }}</td>
					<td>{{ $product->pivot->amount }}</td>
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