@props(['files' => [], 'viewMode' => 'list'])

@php
    $viewModes = [
        'list' => ['icon' => 'fas fa-list', 'label' => 'List View'],
        'grid' => ['icon' => 'fas fa-th', 'label' => 'Grid View'],
        'tiles' => ['icon' => 'fas fa-th-large', 'label' => 'Tiles View'],
        'details' => ['icon' => 'fas fa-align-justify', 'label' => 'Details View']
    ];
@endphp

<div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden" x-data="fileListComponent('{{ $viewMode }}', {{ count($files) }})">
    <!-- View Mode Selector -->
    <div class="px-6 py-3 bg-gray-50 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <!-- View Mode Dropdown -->
                <div class="relative">
                    <button 
                        @click="open = !open"
                        class="flex items-center space-x-2 px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200"
                    >
                        <i :class="getCurrentViewIcon()" class="text-sm"></i>
                        <span x-text="getCurrentViewLabel()"></span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    
                    <div 
                        x-show="open"
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50"
                        style="display: none;"
                    >
                        @foreach($viewModes as $mode => $config)
                            <button 
                                @click="changeViewMode('{{ $mode }}'); open = false"
                                class="flex items-center space-x-3 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200"
                            >
                                <i class="{{ $config['icon'] }} text-sm"></i>
                                <span>{{ $config['label'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Selection Mode Toggle -->
                <button 
                    @click="toggleSelectionMode()"
                    :class="selectionMode ? 'bg-blue-600 text-white hover:bg-blue-700 border-blue-600' : 'bg-white text-gray-700 hover:bg-gray-50 border-gray-300'"
                    class="flex items-center space-x-2 px-3 py-2 text-sm font-medium border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200"
                >
                    <i class="fas fa-check-square text-sm"></i>
                    <span x-text="selectionMode ? 'Cancel' : 'Select'"></span>
                </button>

                <!-- Selection Actions (shown when in selection mode) -->
                <div x-show="selectionMode" class="flex items-center space-x-2">
                    <button 
                        @click="selectAll()"
                        class="px-3 py-2 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-200"
                    >
                        Select All
                    </button>
                    <button 
                        @click="deselectAll()"
                        class="px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 rounded-lg transition-colors duration-200"
                    >
                        Deselect All
                    </button>
                    <span class="text-sm text-gray-500" x-show="selectedItems.length > 0">
                        (<span x-text="selectedItems.length"></span> selected)
                    </span>
                </div>
            </div>
            <div class="text-sm text-gray-500">
                {{ count($files) }} items
            </div>
        </div>
    </div>

    <!-- Content Area -->
    <div class="overflow-x-auto">
        <div x-show="currentViewMode === 'list'">
            <!-- List View -->
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modified</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($files as $index => $file)
                        <tr 
                            @click="selectionMode && toggleItem({{ $index }})"
                            :class="selectionMode && isSelected({{ $index }}) ? 'bg-blue-50' : ''"
                            class="hover:bg-gray-50 transition-colors duration-200 cursor-pointer"
                        >
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <!-- Selection Checkbox -->
                                    <div x-show="selectionMode" class="mr-3">
                                        <div 
                                            :class="isSelected({{ $index }}) ? 'bg-blue-600 border-blue-600' : 'bg-white border-gray-300'"
                                            class="w-5 h-5 rounded border-2 flex items-center justify-center transition-colors duration-200"
                                        >
                                            <i x-show="isSelected({{ $index }})" class="fas fa-check text-white text-xs"></i>
                                        </div>
                                    </div>

                                    <div class="flex-shrink-0 mr-5">
                                        <i class="{{ $file['icon'] ?? 'fas fa-file' }} text-blue-600 text-4xl"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $file['name'] ?? 'Unknown' }}</div>
                                        <div class="text-sm text-gray-500">{{ $file['type'] ?? 'File' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $file['modified'] ?? 'Unknown' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $file['size'] ?? 'Unknown' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-12 text-center text-sm text-gray-500">
                                <i class="fas fa-folder-open text-4xl text-gray-300 mb-2"></i>
                                <p>No files found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div x-show="currentViewMode === 'grid'">
            <!-- Grid View -->
            <div class="p-6">
                <div class="grid grid-cols-3 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10 gap-3">
                    @forelse($files as $index => $file)
                        <div 
                            @click="selectionMode && toggleItem({{ $index }})"
                            :class="selectionMode && isSelected({{ $index }}) ? 'bg-blue-50 border-blue-500' : 'bg-white border-transparent'"
                            class="relative flex flex-col items-center p-3 rounded-lg border-2 hover:bg-gray-50 transition-all duration-200 cursor-pointer"
                        >
                            <!-- Selection Checkbox -->
                            <div x-show="selectionMode" class="absolute top-1 right-1">
                                <div 
                                    :class="isSelected({{ $index }}) ? 'bg-blue-600 border-blue-600' : 'bg-white border-gray-300'"
                                    class="w-5 h-5 rounded border-2 flex items-center justify-center transition-colors duration-200"
                                >
                                    <i x-show="isSelected({{ $index }})" class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>

                            <div class="mb-2">
                                <i class="{{ $file['icon'] ?? 'fas fa-file' }} text-blue-600 text-3xl"></i>
                            </div>
                            <div class="text-center w-full">
                                <div class="text-xs font-medium text-gray-900 truncate" title="{{ $file['name'] ?? 'Unknown' }}">
                                    {{ $file['name'] ?? 'Unknown' }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-sm text-gray-500">
                            <i class="fas fa-folder-open text-4xl text-gray-300 mb-2"></i>
                            <p>No files found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div x-show="currentViewMode === 'tiles'">
            <!-- Tiles View -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($files as $index => $file)
                        <div 
                            @click="selectionMode && toggleItem({{ $index }})"
                            :class="selectionMode && isSelected({{ $index }}) ? 'bg-blue-50 border-blue-500' : 'bg-gray-50 border-transparent'"
                            class="relative flex items-center p-4 border-2 rounded-lg hover:bg-gray-100 transition-all duration-200 cursor-pointer"
                        >
                            <!-- Selection Checkbox -->
                            <div x-show="selectionMode" class="absolute top-2 left-2">
                                <div 
                                    :class="isSelected({{ $index }}) ? 'bg-blue-600 border-blue-600' : 'bg-white border-gray-300'"
                                    class="w-5 h-5 rounded border-2 flex items-center justify-center transition-colors duration-200"
                                >
                                    <i x-show="isSelected({{ $index }})" class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>

                            <div class="flex-shrink-0 mr-4">
                                <i class="{{ $file['icon'] ?? 'fas fa-file' }} text-blue-600 text-3xl"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-medium text-gray-900 truncate">{{ $file['name'] ?? 'Unknown' }}</div>
                                <div class="text-xs text-gray-500">{{ $file['type'] ?? 'File' }}</div>
                                <div class="text-xs text-gray-400">{{ $file['modified'] ?? 'Unknown' }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 text-sm text-gray-500">
                            <i class="fas fa-folder-open text-4xl text-gray-300 mb-2"></i>
                            <p>No files found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div x-show="currentViewMode === 'details'">
            <!-- Details View -->
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modified</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($files as $index => $file)
                        <tr 
                            @click="selectionMode && toggleItem({{ $index }})"
                            :class="selectionMode && isSelected({{ $index }}) ? 'bg-blue-50' : ''"
                            class="hover:bg-gray-50 transition-colors duration-200 cursor-pointer"
                        >
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <!-- Selection Checkbox -->
                                    <div x-show="selectionMode" class="mr-3">
                                        <div 
                                            :class="isSelected({{ $index }}) ? 'bg-blue-600 border-blue-600' : 'bg-white border-gray-300'"
                                            class="w-5 h-5 rounded border-2 flex items-center justify-center transition-colors duration-200"
                                        >
                                            <i x-show="isSelected({{ $index }})" class="fas fa-check text-white text-xs"></i>
                                        </div>
                                    </div>

                                    <div class="flex-shrink-0 mr-3">
                                        <i class="{{ $file['icon'] ?? 'fas fa-file' }} text-blue-600 text-lg"></i>
                                    </div>
                                    <div class="text-sm font-medium text-gray-900">{{ $file['name'] ?? 'Unknown' }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $file['type'] ?? 'File' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $file['modified'] ?? 'Unknown' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $file['size'] ?? 'Unknown' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-sm text-gray-500">
                                <i class="fas fa-folder-open text-4xl text-gray-300 mb-2"></i>
                                <p>No files found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
