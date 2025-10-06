@props(['type' => 'info', 'message' => '', 'title' => null, 'dismissible' => true, 'icon' => null])

@php
    $typeClasses = match($type) {
        'success' => 'bg-green-50 border-green-200 text-green-800',
        'error' => 'bg-red-50 border-red-200 text-red-800',
        'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
        'info' => 'bg-blue-50 border-blue-200 text-blue-800',
        default => 'bg-blue-50 border-blue-200 text-blue-800'
    };
    
    $iconClasses = match($type) {
        'success' => 'text-green-400',
        'error' => 'text-red-400',
        'warning' => 'text-yellow-400',
        'info' => 'text-blue-400',
        default => 'text-blue-400'
    };
    
    $defaultIcons = [
        'success' => 'fas fa-check-circle',
        'error' => 'fas fa-exclamation-circle',
        'warning' => 'fas fa-exclamation-triangle',
        'info' => 'fas fa-info-circle'
    ];
    
    $displayIcon = $icon ?? $defaultIcons[$type] ?? $defaultIcons['info'];
@endphp

<div {{ $attributes->class([
    'border rounded-lg p-4 mb-4',
    $typeClasses,
    'relative' => $dismissible
]) }} 
     x-data="{ show: true }" 
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-95"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-95">
    
    <div class="flex items-center">
        <!-- Icon -->
        <div class="flex-shrink-0 flex items-center justify-center">
            <i class="{{ $displayIcon }} {{ $iconClasses }} text-3xl"></i>
        </div>
        
        <!-- Content -->
        <div class="ml-4 flex-1">
            @if($title)
                <h3 class="text-sm font-medium mb-1">{{ $title }}</h3>
            @endif
            
            @if($message)
                <p class="text-sm">{{ $message }}</p>
            @endif
            
            @if($slot->isNotEmpty())
                <div class="text-sm">{{ $slot }}</div>
            @endif
        </div>
        
        <!-- Dismiss Button -->
        @if($dismissible)
            <div class="ml-4 flex-shrink-0">
                <button @click="show = false" 
                        class="inline-flex rounded-md p-1.5 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors {{ $iconClasses }} hover:bg-black/10">
                    <i class="fas fa-times text-sm"></i>
                </button>
            </div>
        @endif
    </div>
</div>
