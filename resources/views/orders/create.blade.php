@extends('template.layout')

@section('content')
	<div class="panel panel-default">
		
		<div class="panel-heading">Novo pedido</div>

		<div class="row">
			<div class="col-md-4 col-md-offset-3">
				{!! Form::open(['url' => 'order', 'class' => 'form-horizontal']) !!}
				<div class="form-group">
					{!! Form::label('name', 'Produto', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-2">
						{!! Form::select('product', $products, null, ['id' => 'cmb_products', 'class' => 'form-controll']) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>	
			<div class="col-md-1">
				{!! link_to('#', $title = 'Adicionar', $attributes = ['id' => 'btn_add_product', 'class' => 'btn btn-success btn-sm']) !!}
			</div>
		</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>Preço</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody id="tb_body">
			</tbody>
		</table>
	</div>

	<script type="text/javascript">
		$(function() {
			$("#btn_add_product").on('click', function(e) {
				e.preventDefault();
				
				var productId = $("#cmb_products").val();
				$.get('product/' + productId, function(response) {
					var html = '';

					html += '<tr>';
					html += '<td>' + response.id + '</td>';
					html += '<td>' + response.name + '</td>';
					html += '<td>R$ ' + response.price + '</td>';
					html += '<td>Opção</td>';
					html += '</tr>';

					$("#tb_body").append(html);
				}, "json");

			});
		});
	</script>
@endsection