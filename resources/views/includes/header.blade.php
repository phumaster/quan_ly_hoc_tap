<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('head.title')</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	@yield('head.meta')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	@yield('head.css')
	<script type="text/javascript" src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
	@yield('head.js')
</head>
<body>
<header>
	<div class="container-fuild">
		<div class="container">
			<div class="text-center">
				<div class="header-logo">
					<i class="fa fa-fw fa-github fa-2x"></i>
				</div>
				<div class="header-menu">
					@include('includes.menubar')
					@yield('head.menu')
				</div>
			</div>
		</div>
	</div>
</header>
