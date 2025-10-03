<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.9/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">
    <style>
        body, * {
            font-family: 'Open Sans', sans-serif !important;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
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
<body class="bg-gray-50 min-h-screen font-sans antialiased">
    <!-- Navbar - Full Width -->
    <x-ui.navbar :title="$navbarTitle ?? 'CloudStorage'" />
    
    <div class="flex h-[calc(100vh-5rem)]">
        <!-- Sidebar -->
        <x-ui.sidebar :activeItem="$activeSidebarItem ?? 'home'" />
        
        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </div>
    </div>
</body>
</html>
