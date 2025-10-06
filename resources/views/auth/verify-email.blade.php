@extends('layout.layout')

@section('title', 'Verify Email')

@section('content')
<x-form.card title="Verify Email" subtitle="Please verify your email address to continue.">

    <div class="text-sm text-gray-600 mb-4">
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
    </div>

    @if (session('status') == 'verification-link-sent')
        <x-ui.alert type="success" message="A new verification link has been sent to your email address." />
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="mb-4">
        @csrf
        <x-form.button type="submit" variant="primary" class="w-full">
            Resend Verification Email
        </x-form.button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-form.button type="submit" variant="secondary" class="w-full">
            Log Out
        </x-form.button>
    </form>

</x-form.card>
@endsection
