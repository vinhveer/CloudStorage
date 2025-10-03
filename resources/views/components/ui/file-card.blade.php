@props(['iconClass' => 'fas fa-file', 'title', 'subtitle', 'detailsHref' => '#', 'linkHref' => '#', 'width' => '100'])

@php
    $widthClass = 'w-[' . $width . '%]';
@endphp

<div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-lg transition-all duration-200 hover:border-gray-300 {{ $widthClass }}">
    <div class="mb-4">
        <i class="{{ $iconClass }} text-blue-600 text-6xl"></i>
    </div>
    <div class="mb-4">
        <h3 class="text-lg font-semibold text-gray-900">{{ $title }}</h3>
        <p class="text-sm text-gray-500 mt-1">{{ $subtitle }}</p>
    </div>
    <div>
        <a href="{{ $detailsHref }}" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-sm">
            Details
        </a>
    </div>
</div>
