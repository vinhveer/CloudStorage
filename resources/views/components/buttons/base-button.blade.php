@props(['type' => 'primary', 'size' => 'md', 'icon' => null, 'value' => null, 'tag' => 'button'])

@php
    $isIconOnly = $icon && !isset($value) && !$value;
    $isCircular = $isIconOnly;
    
    $baseClasses = 'inline-flex items-center justify-center font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 ease-in-out shadow-sm';
    $shapeClasses = $isCircular ? 'rounded-full' : 'rounded-lg';
    
    $typeClasses = match($type) {
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white border-0 focus:ring-blue-500',
        'secondary' => 'bg-white hover:bg-gray-50 text-gray-900 border border-gray-300 focus:ring-blue-500',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white border-0 focus:ring-red-500',
        default => 'bg-blue-600 hover:bg-blue-700 text-white border-0 focus:ring-blue-500'
    };
    
    $sizeClasses = match($size) {
        'sm' => $isCircular ? 'w-8 h-8 text-xs' : 'px-3 py-1.5 text-xs',
        'md' => $isCircular ? 'w-10 h-10 text-sm' : 'px-4 py-2 text-sm',
        'lg' => $isCircular ? 'w-12 h-12 text-base' : 'px-6 py-2.5 text-base',
        'xl' => $isCircular ? 'w-14 h-14 text-lg' : 'px-8 py-3 text-lg',
        '2xl' => $isCircular ? 'w-16 h-16 text-xl' : 'px-10 py-4 text-xl',
        default => $isCircular ? 'w-10 h-10 text-sm' : 'px-4 py-2 text-sm'
    };
@endphp

<{{ $tag }} {{ $attributes->class([
    $baseClasses,
    $shapeClasses,
    $typeClasses,
    $sizeClasses,
])->except(['type', 'size', 'icon', 'value', 'tag']) }}>
    @if($icon && isset($value) && $value)
        <i class="{{ $icon }} mr-2"></i>
        {{ $value }}
    @elseif($icon)
        <i class="{{ $icon }}"></i>
    @elseif(isset($value) && $value)
        {{ $value }}
    @endif
    {{ $slot }}
</{{ $tag }}>
