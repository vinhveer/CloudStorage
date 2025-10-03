@props(['iconClass' => 'fas fa-file', 'title', 'subtitle', 'detailsHref' => '#', 'linkHref' => '#', 'width' => '100'])

@php
    $widthClass = 'w-[' . $width . '%]';
@endphp

<div class="bg-white border border-teal-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow duration-200 {{ $widthClass }}">
    <div class="mb-3">
        <i class="{{ $iconClass }} text-teal-600 text-6xl"></i>
    </div>
    <div class="mb-3">
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
        <p class="text-sm text-gray-500 mt-1">{{ $subtitle }}</p>
    </div>
    <div>
        <a href="{{ $detailsHref }}" class="inline-block px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
            Details
        </a>
    </div>
</div>
