@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="form-group">
	{!! Form::label('name', 'Nome', ['class' => 'col-sm-2 control-label']) !!}
	<div class="col-sm-2">
		{!! Form::text('name', '', ['class' => 'form-controll', 'size' => 50]) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('stock_amount', 'Estoque', ['class' => 'col-sm-2 control-label']) !!}
	<div class="col-sm-2">
		{!! Form::number('stock_amount', '', ['class' => 'form-controll']) !!}
	</div>
</div>
<div class="row">
	<div class="col-md-2 col-md-offset-5">
		{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-sm']) !!}
	</div>
</div>
