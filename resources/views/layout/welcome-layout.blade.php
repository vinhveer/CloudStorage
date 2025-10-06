@extends('layout.base-layout')

@section('body-class', 'min-h-screen font-sans antialiased bg-gray-50')

@section('body')
<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-2xl w-full">
        @yield('content')
    </div>
</div>
@endsection