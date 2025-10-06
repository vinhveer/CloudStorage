@props(['title' => null, 'subtitle' => null, 'padding' => 'lg', 'shadow' => 'lg', 'border' => true])

@php
    $paddingClasses = match($padding) {
        'none' => '',
        'sm' => 'p-4',
        'md' => 'p-6',
        'lg' => 'p-8',
        'xl' => 'p-10',
        default => 'p-8'
    };
    
    $shadowClasses = match($shadow) {
        'none' => '',
        'sm' => 'shadow-sm',
        'md' => 'shadow-md',
        'lg' => 'shadow-lg',
        'xl' => 'shadow-xl',
        '2xl' => 'shadow-2xl',
        default => 'shadow-lg'
    };
    
    $borderClasses = $border ? 'border border-gray-200' : '';
@endphp

<div {{ $attributes->class([
    'bg-white rounded-xl',
    $paddingClasses,
    $shadowClasses,
    $borderClasses,
]) }}>
    
    @if($title || $subtitle)
        <div class="mb-6">
            @if($title)
                <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $title }}</h2>
            @endif
            
            @if($subtitle)
                <p class="text-sm text-gray-600">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
    
    <div class="space-y-6">
        {{ $slot }}
    </div>
</div>
