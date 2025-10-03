@props(['label' => null, 'required' => false, 'error' => null, 'help' => null, 'options' => []])

<div class="space-y-2">
    @if($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <select 
        {{ $required ? 'required' : '' }}
        {{ $attributes->class([
            'block w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 bg-white',
            'border-red-300 focus:ring-red-500 focus:border-red-500' => $error,
        ]) }}
    >
        @if(!$required)
            <option value="">Choose an option...</option>
        @endif
        
        @foreach($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
        
        {{ $slot }}
    </select>
    
    @if($error)
        <p class="text-sm text-red-600">{{ $error }}</p>
    @elseif($help)
        <p class="text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
