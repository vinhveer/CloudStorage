@props(['value', 'href', 'type' => 'primary', 'icon' => null, 'size' => 'md', 'modalId' => null, 'confirmText' => 'Are you sure?', 'confirmButtonText' => 'Confirm', 'cancelButtonText' => 'Cancel'])

@php
    $modalId = $modalId ?: 'modal-' . uniqid();
    
    $baseClasses = 'inline-flex items-center border font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 ease-in-out';
    
    $typeClasses = match($type) {
        'primary' => 'bg-teal-700 hover:bg-teal-600 text-white border-transparent focus:ring-teal-500',
        'secondary' => 'bg-white hover:bg-teal-700 text-teal-700 hover:text-white border-teal-700 hover:border-teal-700 focus:ring-teal-500',
        'danger' => 'bg-red-600 hover:bg-red-500 text-white border-transparent focus:ring-red-500',
        default => 'bg-teal-700 hover:bg-teal-600 text-white border-transparent focus:ring-teal-500'
    };
    
    $sizeClasses = match($size) {
        'sm' => 'px-2 py-1 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
        default => 'px-4 py-2 text-sm'
    };
    
    $classes = $baseClasses . ' ' . $typeClasses . ' ' . $sizeClasses;
@endphp

<button type="button" class="{{ $classes }}" onclick="openModal('{{ $modalId }}')">
    @if($icon && isset($value) && $value)
        <i class="{{ $icon }} mr-2"></i>
        {{ $value }}
    @elseif($icon)
        <i class="{{ $icon }}"></i>
    @elseif(isset($value) && $value)
        {{ $value }}
    @endif
</button>

<!-- Modal -->
<div id="{{ $modalId }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Confirm Action</h3>
                    <p class="text-sm text-gray-500 mb-6">{{ $confirmText }}</p>
                    <div class="flex space-x-3 justify-center">
                        <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500" onclick="closeModal('{{ $modalId }}')">
                            {{ $cancelButtonText }}
                        </button>
                        <a href="{{ $href }}" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            {{ $confirmButtonText }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('bg-opacity-50')) {
        event.target.classList.add('hidden');
    }
});
</script>
