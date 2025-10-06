@extends('layout.welcome-layout')

@section('title', 'Welcome')

@section('content')
<div class="space-y-8">
<div>
<div class="flex items-center gap-3 mb-8">
<i class="fas fa-cloud text-blue-600 text-3xl"></i>
<h1 class="text-2xl font-bold text-gray-900">CloudStorage</h1>
</div>
<h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-4">
Your Files, <span class="text-blue-600">Anywhere</span>
</h2>
<p class="text-gray-600 text-lg max-w-xl">Secure, fast, and reliable cloud storage solution. Store, share, and access your files from anywhere in the world.</p>
</div>

<div class="flex gap-4">

<x-buttons.button-link
href="{{ route('login') }}"
type="secondary"
size="2xl"
value="Sign In"
/>

<x-buttons.button-link
href="{{ route('register') }}"
type="primary"
size="2xl"
value="Sign Up"
/>

</div>
</div>
@endsection
