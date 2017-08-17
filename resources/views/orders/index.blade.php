@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Lista de pedidos</div>
		<div class="panel-body">
			<div class="row">			
				<div class="col-md-1 col-md-offset-11">
					{!! link_to('order/create', $title = 'Novo', $attributes = ['class' => 'btn btn-primary btn-sm']) !!}
				</div>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Número</th>
						<th>Criado em</th>
						<th>Preço</th>
						<th>Total de itens</th>
						<th>Opções</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>

	<script type="text/javascript">
		$(function() {
			//alert("irrra");
		});
	</script>
@endsection