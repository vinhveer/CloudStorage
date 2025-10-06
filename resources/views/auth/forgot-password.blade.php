@extends('layout.layout')

@section('title', 'Forgot Password')

@section('content')
<x-form.card title="Forgot Password" subtitle="Enter your email to receive a password reset link." action="{{ route('password.email') }}" method="POST">

    @if(session('status'))
        <x-ui.alert type="success" :message="session('status')" />
    @endif

    <div class="text-sm text-gray-600 mb-4">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
    </div>

    <x-form.input
        label="Email"
        type="email"
        name="email"
        id="email"
        :value="old('email')"
        placeholder="Enter your email"
        required
        :error="$errors->first('email')"
        autofocus
    />

    <x-form.button type="submit" variant="primary" class="w-full">
        Send Reset Link
    </x-form.button>

    <x-slot:footer>
        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
            Back to sign in
        </a>
    </x-slot:footer>

</x-form.card>
@endsection
