@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Lista de produtos</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-7">
					{!! Form::open(['url' => 'product/index', 'method' => 'GET', 'class' => 'form-inline']) !!}
						{{ csrf_field() }}
						<div class="form-group">
							{!! Form::text('name', '', ['class' => 'form-controll', 'size' => 50, 'placeholder' => 'Nome do produto']) !!}
						</div>
						<div class="form-group">
							{!! Form::submit('Buscar', ['class' => 'btn btn-primary btn-sm']) !!}
						</div>						
					{!! Form::close() !!}
				</div>
				<div class="col-md-1 col-md-offset-4">
					{!! link_to('product/create', $title = 'Novo', $attributes = ['class' => 'btn btn-primary btn-sm']) !!}
				</div>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Código</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Estoque</th>
						<th>Criado</th>
						<th>Atualizado</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
					<tr>
						<td>{{ $product->id }}</td>
						<td>{{ $product->name }}</td>
						<td>R$ {{ $product->price }}</td>
						<td>{{ $product->stock_amount }}</td>
						<td>{{ $product->created_at }}</td>
						<td>{{ $product->updated_at }}</td>
						<td>
							{!! link_to_action('ProductController@edit', $title = 'Editar', $parameters = ['id' => $product->id], $attributes = ['id' => $product->id, 'class' => 'btn btn-warning btn-sm']) !!}						
							{!! link_to_action('ProductController@destroy', $title = 'Deletar', $parameters = ['id' => $product->id], $attributes = ['id' => $product->id, 'class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("Tem certeza que deseja excluir este registro?");']) !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $products->links() }}
		</div>
	</div>

	<script type="text/javascript">
		$(function() {
			//alert("irrra");
		});
	</script>
@endsection