@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
<div class="h-screen flex flex-col">
    <!-- Navbar -->
    <x-ui.navbar title="CloudStorage" />

    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <x-ui.sidebar activeItem="home" />

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Welcome Section -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}!</h2>
                    <p class="text-gray-600 mt-1">Here's what's happening with your files today.</p>
                </div>
        </main>
    </div>
</div>
@endsection

