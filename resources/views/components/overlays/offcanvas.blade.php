@props(['id' => 'offcanvas', 'width' => '50', 'title' => '', 'alignment' => 'right'])

@php
    $widthClass = match($width) {
        '25' => 'w-1/4',
        '50' => 'w-1/2',
        '75' => 'w-3/4',
        '100' => 'w-full h-full',
        default => 'w-1/2'
    };
    
    $alignmentClasses = match($alignment) {
        'left' => 'left-0 top-0 h-full',
        'right' => 'right-0 top-0 h-full',
        'top' => 'top-0 left-0 w-full',
        'bottom' => 'bottom-0 left-0 w-full',
        default => 'right-0 top-0 h-full'
    };
@endphp

<div id="{{ $id }}" class="fixed inset-0 z-50 overflow-hidden" x-data="{ open: false }" @open-offcanvas.window="if ($event.detail.id === '{{ $id }}') open = true" x-show="open" style="display: none;">
    <!-- Backdrop -->
    <div x-show="open" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/30 backdrop-blur-sm"
         @click="open = false">
    </div>

    <!-- Offcanvas Panel -->
    <div x-show="open"
         x-transition:enter="transition ease-in-out duration-300 transform"
         x-transition:enter-start="{{ $alignment === 'left' ? '-translate-x-full' : ($alignment === 'top' ? '-translate-y-full' : ($alignment === 'bottom' ? 'translate-y-full' : 'translate-x-full')) }}"
         x-transition:enter-end="translate-x-0 translate-y-0"
         x-transition:leave="transition ease-in-out duration-300 transform"
         x-transition:leave-start="translate-x-0 translate-y-0"
         x-transition:leave-end="{{ $alignment === 'left' ? '-translate-x-full' : ($alignment === 'top' ? '-translate-y-full' : ($alignment === 'bottom' ? 'translate-y-full' : 'translate-x-full')) }}"
         class="fixed {{ $alignmentClasses }} {{ $widthClass }} bg-white shadow-2xl">
        
        <!-- Header -->
        @if($title)
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 leading-6">{{ $title }}</h3>
            <button @click="open = false" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-gray-700 transition-all -mr-1">
                <i class="fas fa-times text-base"></i>
            </button>
        </div>
        @endif
        
        <!-- Content -->
        <div class="p-5">
            {{ $slot }}
        </div>
    </div>

</div>
