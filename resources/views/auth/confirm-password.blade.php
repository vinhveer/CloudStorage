@extends('layout.layout')

@section('title', 'Confirm Password')

@section('content')
<x-form.card title="Confirm Password" subtitle="Please confirm your password to continue." action="{{ route('password.confirm') }}" method="POST">

    <div class="text-sm text-gray-600 mb-4">
        This is a secure area of the application. Please confirm your password before continuing.
    </div>

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

    <x-form.button type="submit" variant="primary" class="w-full">
        Confirm
    </x-form.button>

</x-form.card>
@endsection
