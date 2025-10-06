@extends('layout.layout')

@section('title', 'Reset Password')

@section('content')
<x-form.card title="Reset Password" subtitle="Enter your new password below." action="{{ route('password.store') }}" method="POST">

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <x-form.input
        label="Email"
        type="email"
        name="email"
        id="email"
        :value="old('email', $request->email)"
        placeholder="Enter your email"
        required
        :error="$errors->first('email')"
        autocomplete="username"
        autofocus
    />

    <x-form.input
        label="New Password"
        type="password"
        name="password"
        id="password"
        placeholder="Enter new password"
        required
        :error="$errors->first('password')"
        autocomplete="new-password"
    />

    <x-form.input
        label="Confirm Password"
        type="password"
        name="password_confirmation"
        id="password_confirmation"
        placeholder="Confirm new password"
        required
        :error="$errors->first('password_confirmation')"
        autocomplete="new-password"
    />

    <x-form.button type="submit" variant="primary" class="w-full">
        Reset Password
    </x-form.button>

</x-form.card>
@endsection
