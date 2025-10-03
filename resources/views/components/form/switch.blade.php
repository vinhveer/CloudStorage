@props(['label' => null, 'required' => false, 'error' => null, 'help' => null])

<div class="space-y-2" x-data="switchComponent({{ $attributes->get('checked', false) ? 'true' : 'false' }})">
    <div class="flex items-center justify-between">
        @if($label)
            <label class="text-sm font-medium text-gray-700">
                {{ $label }}
                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>
        @endif
        
        <button 
            type="button"
            @click="toggle()"
            :class="checked ? 'bg-blue-600' : 'bg-gray-200'"
            class="relative inline-flex h-6 w-11 items-center justify-center rounded-full transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            <span 
                :class="checked ? 'translate-x-2.5' : '-translate-x-2.5'"
                class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 ease-in-out"
            ></span>
        </button>
    </div>
    
    @if($error)
        <p class="text-sm text-red-600">{{ $error }}</p>
    @elseif($help)
        <p class="text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
