@extends('layout.app-layout')

@section('title', 'Account Settings')

@php
$navbarTitle = 'Account Settings';
$activeSidebarItem = 'settings';
@endphp

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Account Settings</h1>
        <p class="text-gray-600 mt-1">Manage your account information and security settings</p>
    </div>

    <!-- Update Name -->
    <x-ui.card title="Profile Information" class="mb-6" shadow="none">
        <form action="{{ route('settings.name') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <x-form.input
                label="Name"
                name="name"
                type="text"
                placeholder="Enter your name"
                value="{{ Auth::user()->name }}"
                required />

            <div class="flex justify-end">
                <x-buttons.base-button type="submit" value="Update Name" size="md" />
            </div>
        </form>
    </x-ui.card>

    <!-- Update Email -->
    <x-ui.card title="Email Address" class="mb-6" shadow="none">
        <form action="{{ route('settings.email') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <x-form.input
                label="Email"
                name="email"
                type="email"
                placeholder="Enter your email"
                value="{{ Auth::user()->email }}"
                required />

            <x-form.input
                label="Current Password"
                name="current_password"
                type="password"
                placeholder="Enter your current password"
                required />

            <div class="flex justify-end">
                <x-buttons.base-button type="submit" value="Update Email" size="md" />
            </div>
        </form>
    </x-ui.card>

    <!-- Update Password -->
    <x-ui.card title="Change Password" class="mb-6" shadow="none">
        <form action="{{ route('settings.password') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <x-form.input
                label="Current Password"
                name="current_password"
                type="password"
                placeholder="Enter your current password"
                required />

            <x-form.input
                label="New Password"
                name="password"
                type="password"
                placeholder="Enter new password"
                required />

            <x-form.input
                label="Confirm New Password"
                name="password_confirmation"
                type="password"
                placeholder="Confirm new password"
                required />

            <div class="flex justify-end">
                <x-buttons.base-button type="submit" value="Update Password" size="md" />
            </div>
        </form>
    </x-ui.card>
</div>
@endsection