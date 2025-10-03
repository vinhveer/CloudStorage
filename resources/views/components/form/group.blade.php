@props(['label' => null, 'error' => null, 'help' => null])

<div class="space-y-2">
    @if($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif
    
    <div class="space-y-2">
        {{ $slot }}
    </div>
    
    @if($error)
        <p class="text-sm text-red-600">{{ $error }}</p>
    @elseif($help)
        <p class="text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
