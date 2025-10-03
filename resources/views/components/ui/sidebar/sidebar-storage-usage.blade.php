@props(['used' => '14.8', 'total' => '20'])

@php
    $percentage = round(($used / $total) * 100);
    $widthClass = match(true) {
        $percentage <= 10 => 'w-[10%]',
        $percentage <= 20 => 'w-[20%]',
        $percentage <= 30 => 'w-[30%]',
        $percentage <= 40 => 'w-[40%]',
        $percentage <= 50 => 'w-[50%]',
        $percentage <= 60 => 'w-[60%]',
        $percentage <= 70 => 'w-[70%]',
        $percentage <= 80 => 'w-[80%]',
        $percentage <= 90 => 'w-[90%]',
        default => 'w-full'
    };
@endphp

<div class="mt-8 p-3 bg-gray-50 rounded-lg">
    <div class="flex items-center justify-between mb-2">
        <span class="text-xs font-medium text-gray-600">Storage</span>
        <span class="text-xs text-gray-500">{{ $used }} GB of {{ $total }} GB</span>
    </div>
    <div class="w-full bg-gray-200 rounded-full h-1.5">
        <div class="bg-blue-600 h-1.5 rounded-full {{ $widthClass }}"></div>
    </div>
</div>
