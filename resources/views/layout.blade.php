<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', config('app.name', 'Laravel'))</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
	<style>
		body, * {
			font-family: 'Open Sans', sans-serif !important;
		}
		.fas, .fa-solid {
			font-family: "Font Awesome 6 Free" !important;
		}
		.far, .fa-regular {
			font-family: "Font Awesome 6 Free" !important;
		}
		.fab, .fa-brands {
			font-family: "Font Awesome 6 Brands" !important;
		}
	</style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col font-sans">
	<header class="bg-white shadow p-4 mb-6">
		<h1 class="text-2xl font-bold text-gray-800">@yield('header', config('app.name', 'Laravel'))</h1>
	</header>
	<main class="flex-1 container mx-auto px-4">
		@yield('content')
	</main>
	<footer class="bg-white shadow p-4 mt-6 text-center text-gray-500">
		&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}
	</footer>
</body>
</html>
