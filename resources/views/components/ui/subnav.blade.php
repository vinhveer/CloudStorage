@props(['items' => [], 'activeItem' => null, 'orientation' => 'horizontal'])

@php
    $orientationClasses = match($orientation) {
        'vertical' => 'flex-col space-y-1',
        'horizontal' => 'flex-row space-x-1',
        default => 'flex-row space-x-1'
    };
@endphp

<nav class="flex {{ $orientationClasses }} p-1 bg-gray-100 rounded-lg">
    @foreach($items as $item)
        @php
            $isActive = $activeItem === $item['id'] || $activeItem === $item['label'];
            $itemClasses = $isActive 
                ? 'bg-white text-gray-900 shadow-sm' 
                : 'text-gray-600 hover:text-gray-900 hover:bg-white/50';
        @endphp
        
        <a href="{{ $item['href'] ?? '#' }}" 
           class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all duration-200 {{ $itemClasses }}">
            @if(isset($item['icon']))
                <i class="{{ $item['icon'] }} mr-2 text-xs"></i>
            @endif
            {{ $item['label'] }}
            @if(isset($item['badge']))
                <span class="ml-2 px-1.5 py-0.5 text-xs font-medium bg-gray-200 text-gray-700 rounded-full">
                    {{ $item['badge'] }}
                </span>
            @endif
        </a>
    @endforeach
</nav>
