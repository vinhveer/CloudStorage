@props(['label' => null, 'required' => false, 'error' => null, 'help' => null, 'options' => [], 'name' => 'radio'])

<div class="space-y-2">
    @if($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <div class="space-y-2">
        @foreach($options as $value => $optionLabel)
            <div class="flex items-center space-x-3">
                <input 
                    type="radio"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    {{ $required ? 'required' : '' }}
                    {{ $attributes->class([
                        'w-5 h-5 text-blue-600 border-gray-300 focus:ring-blue-500 focus:ring-2 transition-all duration-200',
                        'border-red-300 focus:ring-red-500' => $error,
                    ]) }}
                />
                <label class="text-sm text-gray-700 cursor-pointer">{{ $optionLabel }}</label>
            </div>
        @endforeach
        
        {{ $slot }}
    </div>
    
    @if($error)
        <p class="text-sm text-red-600">{{ $error }}</p>
    @elseif($help)
        <p class="text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
