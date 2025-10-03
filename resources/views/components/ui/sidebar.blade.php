@props(['activeItem' => 'home'])

<aside class="w-64 h-full">
    <div class="p-2 pt-6">
        <!-- Navigation Items -->
        <nav class="space-y-1">
            <x-ui.sidebar.sidebar-item 
                title="Home" 
                href="#" 
                :isActive="$activeItem === 'home'" 
                icon="fas fa-home" 
            />
            
            <x-ui.sidebar.sidebar-item 
                title="My Files" 
                href="#" 
                :isActive="$activeItem === 'files'" 
                icon="fas fa-folder" 
            />
            
            <x-ui.sidebar.sidebar-item 
                title="Your Shared" 
                href="#" 
                :isActive="$activeItem === 'shared'" 
                icon="fas fa-share-alt" 
            />
            
            <x-ui.sidebar.sidebar-item 
                title="Trash" 
                href="#" 
                :isActive="$activeItem === 'trash'" 
                icon="fas fa-trash" 
            />
        </nav>
        
        <!-- Storage Usage -->
        <x-ui.sidebar.sidebar-storage-usage :used="14.8" :total="20" />
    </div>
</aside>
