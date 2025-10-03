@props(['type' => 'button', 'variant' => 'primary', 'size' => 'md', 'disabled' => false])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 ease-in-out shadow-sm';
    
    $variantClasses = match($variant) {
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white border-0 focus:ring-blue-500',
        'secondary' => 'bg-white hover:bg-gray-50 text-gray-900 border border-gray-300 focus:ring-blue-500',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white border-0 focus:ring-red-500',
        'success' => 'bg-green-600 hover:bg-green-700 text-white border-0 focus:ring-green-500',
        'warning' => 'bg-yellow-600 hover:bg-yellow-700 text-white border-0 focus:ring-yellow-500',
        default => 'bg-blue-600 hover:bg-blue-700 text-white border-0 focus:ring-blue-500'
    };
    
    $sizeClasses = match($size) {
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
        'xl' => 'px-8 py-4 text-lg',
        default => 'px-4 py-2 text-sm'
    };
    
    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
@endphp

<button 
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->class([
        $baseClasses,
        $variantClasses,
        $sizeClasses,
        $disabledClasses,
    ])->except(['type', 'variant', 'size', 'disabled']) }}
>
    {{ $slot }}
</button>
