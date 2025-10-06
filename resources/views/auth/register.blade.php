@extends('layout.layout')

@section('title', 'Sign Up')

@section('content')
<x-form.card title="Sign Up" subtitle="Create your account to get started." action="{{ route('register') }}" method="POST">

    <x-form.input
        label="Name"
        type="text"
        name="name"
        id="name"
        :value="old('name')"
        placeholder="Enter your full name"
        required
        :error="$errors->first('name')"
        autocomplete="name"
        autofocus
    />

    <x-form.input
        label="Email"
        type="email"
        name="email"
        id="email"
        :value="old('email')"
        placeholder="Enter your email"
        required
        :error="$errors->first('email')"
        autocomplete="username"
    />

    <x-form.input
        label="Password"
        type="password"
        name="password"
        id="password"
        placeholder="Enter your password"
        required
        :error="$errors->first('password')"
        autocomplete="new-password"
    />

    <x-form.input
        label="Confirm Password"
        type="password"
        name="password_confirmation"
        id="password_confirmation"
        placeholder="Confirm your password"
        required
        :error="$errors->first('password_confirmation')"
        autocomplete="new-password"
    />

    <x-form.button type="submit" variant="primary" class="w-full" size="lg">
        Create Account
    </x-form.button>

    <x-slot:footer>
        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
            Already have an account? Sign in
        </a>
    </x-slot:footer>

</x-form.card>
@endsection
