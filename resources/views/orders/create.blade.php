@extends('template.layout')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Novo pedido</div>
		<div class="panel-body">
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
			
			<div class="row">
				<div class="col-md-1 col-md-offset-9">
				{!! Form::open(['url' => 'order/store', 'id' => 'form_order', 'class' => 'form-horizontal']) !!}
					{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-sm']) !!}
				{!! Form::close() !!}
				</div>
			</div>	
		</div>
	</div>

	<script type="text/javascript">
		function getHtmlFormInput(productId) {			
			return '<input type="hidden" id="product_' + productId + '" name="products_id[]" value="' + productId + '">';
		}

		function getHtmlTableRow(product) {
			var html = '';

			html += '<tr>';
			html += '<td>' + product.id + '</td>';
			html += '<td>' + product.name + '</td>';
			html += '<td>R$ ' + product.price + '</td>';
			html += '<td>Opção</td>';
			html += '</tr>';
			
			return html;
		}

		$(function() {
			$("#btn_add_product").on('click', function(e) {
				e.preventDefault();
				
				var productId = $("#cmb_products").val();

				if(productId > 0) {
					$.get('product/' + productId, function(response) {

						$("#cmb_products").val(0);
						$("option[value=" + productId + "]").css('display', 'none');

						$("#tb_body").append(getHtmlTableRow(response));
						$("#form_order").append(getHtmlFormInput(productId));
					}, "json");
				}
			});
		});
	</script>
@endsection