<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSRF Token -->	    
	    <meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}"" rel="stylesheet">	
	</head>

	<body>
		<!-- VUE -->
		<div id="app"></div>

		<!-- Javascript -->
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/bootstrap/app.js') }}"></script>

		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-collapse collaple">
					<ul class="nav navbar-nav">
						<li>
							<a class="active" href="/product/index">Produtos</a>
						</li>
						<li>
							<a href="/order/index">Pedidos</a>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="#">Sair</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="container">
			@yield('content')
		</div>	
	</body>


</html>
