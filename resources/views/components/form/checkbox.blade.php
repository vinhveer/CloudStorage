@props(['label' => null, 'required' => false, 'error' => null, 'help' => null])

<div class="space-y-2">
    <div class="flex items-center space-x-3">
        <input 
            type="checkbox"
            {{ $required ? 'required' : '' }}
            {{ $attributes->class([
                'w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 transition-all duration-200',
                'border-red-300 focus:ring-red-500' => $error,
            ]) }}
        />
        
        @if($label)
            <label class="text-sm font-medium text-gray-700 cursor-pointer">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>
        @endif
    </div>
    
    @if($error)
        <p class="text-sm text-red-600 ml-8">{{ $error }}</p>
    @elseif($help)
        <p class="text-sm text-gray-500 ml-8">{{ $help }}</p>
    @endif
</div>
