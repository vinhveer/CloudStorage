@props(['title' => 'CloudStorage'])

<nav class="bg-white border-b border-gray-200 px-4 py-2">
    <div class="flex items-center justify-between">
        <!-- Left: Title -->
        <div class="flex items-center">
            <h1 class="text-xl font-semibold text-gray-900">{{ $title }}</h1>
        </div>
        
        <!-- Center: Search -->
        <div class="flex-1 max-w-md mx-8">
            <input type="text" 
                   placeholder="Search everything..." 
                   class="block w-full px-4 py-3 border border-gray-300 rounded-lg text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 focus:bg-white transition-colors">
        </div>
        
        <!-- Right: Actions & Account -->
        <div class="flex items-center space-x-3">
            <x-buttons.button-link href="#" type="primary" icon="fas fa-upload" size="md" />
            <x-ui.account-dropdown />
        </div>
    </div>
</nav>
