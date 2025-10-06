@props(['title' => 'CloudStorage'])

<nav class="bg-white border-b border-gray-200 px-4 py-2">
    <div class="flex items-center justify-between">
        <!-- Left: Title -->
        <div class="flex items-center">
            <h1 class="text-xl font-semibold text-gray-900">{{ $title }}</h1>
        </div>
        
        <!-- Center: Search -->
        <div class="flex-1 max-w-md mx-8" x-data="searchComponent()">
            <div class="relative">
                <input type="text" 
                       x-model="query"
                       @input="handleSearch()"
                       placeholder="Search everything..." 
                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 focus:bg-white transition-colors">
                
                <!-- Search Results Dropdown -->
                <div x-show="showResults" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     @click.away="showResults = false"
                     class="absolute top-full left-0 right-0 mt-1 bg-white rounded-lg shadow-lg border border-gray-200 max-h-96 overflow-y-auto z-50">
                    
                    <!-- Results -->
                    <template x-for="result in results" :key="result.id">
                        <a :href="result.url" 
                           class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100 last:border-b-0">
                            <div class="flex items-center">
                                <i :class="result.icon" class="mr-3 text-gray-400"></i>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900" x-text="result.title"></p>
                                    <p class="text-xs text-gray-500" x-text="result.description"></p>
                                </div>
                            </div>
                        </a>
                    </template>
                    
                    <!-- No Results Found -->
                    <div x-show="!isLoading && results.length === 0" class="px-4 py-3 text-center">
                        <i class="fas fa-search text-gray-300 text-lg mb-2"></i>
                        <p class="text-sm text-gray-500">No results found</p>
                        <p class="text-xs text-gray-400">Try different keywords</p>
                    </div>
                    
                    <!-- Loading -->
                    <div x-show="isLoading" class="px-4 py-3 text-center">
                        <i class="fas fa-spinner fa-spin text-gray-400"></i>
                        <span class="ml-2 text-sm text-gray-500">Searching...</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right: Actions & Account -->
        <div class="flex items-center space-x-3">
            <x-buttons.button-link href="#" type="primary" icon="fas fa-upload" size="md" />
            <x-ui.navbar.account-dropdown />
        </div>
    </div>
</nav>
