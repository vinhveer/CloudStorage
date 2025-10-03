@props(['label' => null, 'required' => false, 'error' => null, 'help' => null, 'accept' => '*', 'multiple' => false])

<div class="space-y-2" x-data="fileUploadComponent()">
    @if($label)
        <label class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <div 
        class="relative border-2 border-dashed rounded-lg p-6 text-center transition-colors duration-200"
        :class="isDragging ? 'border-blue-400 bg-blue-50' : 'border-gray-300 hover:border-gray-400'"
        @drop="handleDrop($event)"
        @dragover="handleDragOver($event)"
        @dragleave="handleDragLeave($event)"
    >
        <input 
            x-ref="fileInput"
            type="file"
            accept="{{ $accept }}"
            {{ $multiple ? 'multiple' : '' }}
            {{ $required ? 'required' : '' }}
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
            {{ $attributes->except(['class']) }}
        />
        
        <div class="space-y-2">
            <div class="flex justify-center">
                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">
                    <span class="font-medium text-blue-600 hover:text-blue-500 cursor-pointer">Click to upload</span>
                    or drag and drop
                </p>
                <p class="text-xs text-gray-500 mt-1">
                    @if($accept !== '*')
                        {{ str_replace('*', 'any', $accept) }}
                    @else
                        Any file type
                    @endif
                    @if($multiple)
                        (multiple files allowed)
                    @endif
                </p>
            </div>
        </div>
    </div>
    
    @if($error)
        <p class="text-sm text-red-600">{{ $error }}</p>
    @elseif($help)
        <p class="text-sm text-gray-500">{{ $help }}</p>
    @endif
</div>
