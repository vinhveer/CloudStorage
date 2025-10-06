@props(['id' => null, 'title' => 'Confirm Action', 'confirmText' => 'Are you sure?', 'confirmButtonText' => 'Confirm', 'cancelButtonText' => 'Cancel', 'confirmHref' => '#', 'confirmType' => 'danger'])

@php
    $modalId = $id ?: 'modal-' . uniqid();
@endphp

<div id="{{ $modalId }}" class="fixed inset-0 bg-black/30 backdrop-blur-sm hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-6">
        <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full overflow-hidden">
            <div class="px-6 pt-5 pb-4">
                <div class="mb-3">
                    <h3 class="text-xl font-semibold text-gray-900 leading-6">{{ $title }}</h3>
                </div>
                <div class="mb-5">
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $confirmText }}</p>
                </div>
                <div class="flex gap-2">
                    <button type="button" class="flex-1 px-4 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 font-medium text-sm transition-all" onclick="closeModal('{{ $modalId }}')">
                        {{ $cancelButtonText }}
                    </button>
                    @if($confirmType === 'danger')
                        <a href="{{ $confirmHref }}" class="flex-1 px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 font-medium text-sm transition-all shadow-sm text-center">
                            {{ $confirmButtonText }}
                        </a>
                    @elseif($confirmType === 'primary')
                        <a href="{{ $confirmHref }}" class="flex-1 px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 font-medium text-sm transition-all shadow-sm text-center">
                            {{ $confirmButtonText }}
                        </a>
                    @else
                        <a href="{{ $confirmHref }}" class="flex-1 px-4 py-2.5 bg-gray-700 text-white rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 font-medium text-sm transition-all shadow-sm text-center">
                            {{ $confirmButtonText }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
