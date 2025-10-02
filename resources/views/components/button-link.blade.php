@props(['value', 'href', 'type' => 'primary', 'icon' => null, 'size' => 'md'])

@php
    $baseClasses = 'inline-flex items-center border font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 ease-in-out';
    
    $typeClasses = match($type) {
        'primary' => 'bg-teal-700 hover:bg-teal-600 text-white border-transparent focus:ring-teal-500',
        'secondary' => 'bg-white hover:bg-teal-700 text-teal-700 hover:text-white border-teal-700 hover:border-teal-700 focus:ring-teal-500',
        'danger' => 'bg-red-600 hover:bg-red-500 text-white border-transparent focus:ring-red-500',
        default => 'bg-teal-700 hover:bg-teal-600 text-white border-transparent focus:ring-teal-500'
    };
    
    $sizeClasses = match($size) {
        'sm' => 'px-2 py-1 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
        default => 'px-4 py-2 text-sm'
    };
    
    $classes = $baseClasses . ' ' . $typeClasses . ' ' . $sizeClasses;
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    @if($icon && isset($value) && $value)
        <i class="{{ $icon }} mr-2"></i>
        {{ $value }}
    @elseif($icon)
        <i class="{{ $icon }}"></i>
    @elseif(isset($value) && $value)
        {{ $value }}
    @endif
</a>
