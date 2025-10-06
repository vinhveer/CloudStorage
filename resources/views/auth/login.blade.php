@extends('layout.layout')

@section('title', 'Sign In')

@section('content')
<x-form.card title="Sign In" subtitle="Welcome back! Please sign in to your account." action="{{ route('login') }}" method="POST">

    @if(session('status'))
        <x-ui.alert type="success" :message="session('status')" />
    @endif

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
        autofocus
    />

    <x-form.input
        label="Password"
        type="password"
        name="password"
        id="password"
        placeholder="Enter your password"
        required
        :error="$errors->first('password')"
        autocomplete="current-password"
    />

    <x-form.checkbox
        label="Remember me"
        name="remember"
        id="remember_me"
    />

    <x-form.button type="submit" variant="primary" class="w-full" size="lg">
        Sign In
    </x-form.button>

    <x-slot:footer>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                Forgot your password?
            </a>
        @endif
        @if (Route::has('register'))
            <span class="text-sm text-gray-600 mx-2">|</span>
            <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                Create new account
            </a>
        @endif
    </x-slot:footer>

</x-form.card>
@endsection
