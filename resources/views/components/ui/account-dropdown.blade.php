@props(['userName' => 'Nguyen Quang Vinh', 'userEmail' => 'contact.nguyenquangvinh@gmail.com', 'userAvatar' => null])

@php
    // Generate initials from name
    $nameParts = explode(' ', $userName);
    $initials = '';
    foreach ($nameParts as $part) {
        if (!empty($part)) {
            $initials .= strtoupper(substr($part, 0, 1));
        }
    }
    $initials = substr($initials, 0, 2); // Limit to 2 characters
@endphp

<div class="relative" x-data="accountDropdownComponent('{{ $userName }}', '{{ $userEmail }}')">
    <!-- Account Button - Circular with Initials -->
    <button @click="toggle()" 
            class="w-10 h-10 bg-blue-600 hover:bg-blue-700 rounded-full flex items-center justify-center text-white font-semibold text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        <span x-text="getInitials()"></span>
    </button>
    
    <!-- Dropdown Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         @click.away="close()"
         class="absolute right-0 mt-2 min-w-72 bg-white rounded-lg shadow-lg border border-gray-200 pt-3 z-50">
        
        <!-- User Info -->
        <div class="px-4 py-3 border-b border-gray-100">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                    <span x-text="getInitials()"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate" x-text="userName"></p>
                    <p class="text-xs text-gray-500 truncate" x-text="userEmail"></p>
                </div>
            </div>
        </div>
        
        <!-- Menu Items -->
        <div class="py-1">
            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                <i class="fas fa-cog mr-3 text-gray-400"></i>
                Account Settings
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Logout
            </a>
        </div>
    </div>
</div>
