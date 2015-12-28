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
		<div class="header-nav">
			<div class="text-right">
				<div class="option-admin primary-link">
					Hey, <b>@if(\Auth::check())
						<i>{{ \Auth::user()->lastName }}</i>
						<i class="fa fa-angle-down"></i>
					@else
						<i>Guys!</i>
					@endif</b>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="text-center">
				<div class="header-menu">
					@yield('head.menu')
				</div>
			</div>
		</div>
	</div>
</header>
