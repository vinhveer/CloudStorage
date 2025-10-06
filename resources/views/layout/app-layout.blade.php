@extends('layout.base-layout')

@section('body')
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
@endsection