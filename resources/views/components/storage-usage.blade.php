@props(['used', 'total'])

@php
    $percentage = round(($used / $total) * 100);
    $usedFormatted = number_format($used, 2);
    $widthClass = 'w-[' . $percentage . '%]';
@endphp

<div class="space-y-2">
    <div class="text-sm font-medium text-gray-900">
        {{ $percentage }}% - Use {{ $usedFormatted }}GB of {{ $total }}GB
    </div>
    <div class="w-full bg-white border border-teal-200 rounded-full h-3 overflow-hidden">
        <div class="bg-teal-600 h-full rounded-full transition-all duration-300 {{ $widthClass }}"></div>
    </div>
</div>
