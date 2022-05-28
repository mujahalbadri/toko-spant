<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Spant') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
		rel="stylesheet">

	{{-- Icon --}}
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

	<livewire:styles />
	<livewire:scripts />
</head>

<body>
	<div id="app">

		<livewire:navbar />
		<main class="py-4 min-vh-100">
			@yield('content')
		</main>

		@include('layouts.footer')
	</div>

	{{-- Turbolink --}}
	<script src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js"></script>

	{{-- Fontawesome --}}
	<script src="https://kit.fontawesome.com/d4b3ec99d5.js" crossorigin="anonymous"></script>
</body>

</html>