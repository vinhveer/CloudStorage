@extends('layout.layout')

@section('title', 'Sample Page')
@section('header', 'Sample Page')

@section('content')
<div class="space-y-8">
    <h3 class="text-4xl font-bold text-gray-900">Components Examples</h3>
    
    <h4 class="text-2xl font-semibold text-gray-900 mb-5">Button Link</h4>
    <div class="space-y-6">
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Size Variants:</h4>
            <div class="space-x-2">
                <x-buttons.button-link value="Small" href="#" type="primary" size="sm" />
                <x-buttons.button-link value="Medium" href="#" type="primary" size="md" />
                <x-buttons.button-link value="Large" href="#" type="primary" size="lg" />
            </div>
        </div>
        
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Text/Icon Display Logic:</h4>
            <div class="space-x-2">
                <x-buttons.button-link value="Text Only" href="#" type="secondary" />
                <x-buttons.button-link href="#" type="secondary" icon="fas fa-heart" />
                <x-buttons.button-link value="Both" href="#" type="secondary" icon="fas fa-star" />
            </div>
        </div>
        
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Type Variants:</h4>
            <div class="space-x-2">
                <x-buttons.button-link value="Primary" href="#" type="primary" icon="fas fa-check" />
                <x-buttons.button-link value="Secondary" href="#" type="secondary" icon="fas fa-user" />
                <x-buttons.button-link value="Danger" href="#" type="danger" icon="fas fa-trash" size="lg" />
            </div>
        </div>
        
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Modal Confirmation:</h4>
            <div class="space-x-2">
                <x-buttons.button-confirm value="Delete Item" href="#" type="danger" icon="fas fa-trash" confirmText="Are you sure you want to delete this item?" confirmButtonText="Delete" cancelButtonText="Cancel" />
                <x-buttons.button-confirm value="Logout" href="#" type="secondary" icon="fas fa-sign-out-alt" confirmText="Are you sure you want to logout?" confirmButtonText="Logout" cancelButtonText="Stay" />
                <x-buttons.button-confirm value="Reset" href="#" type="primary" icon="fas fa-undo" confirmText="This will reset all settings. Continue?" confirmButtonText="Reset" cancelButtonText="Cancel" />
            </div>
        </div>
    </div>

    <h4 class="text-2xl font-semibold text-gray-900 mb-5">File Card</h4>
    <div class="space-y-6">
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">File Card Examples:</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
                <x-ui.file-card 
                    iconClass="fas fa-file-code" 
                    title="hello.cpp" 
                    subtitle="Your open at 3 minutes" 
            detailsHref="#" 
                    linkHref="#" 
                />
                <x-ui.file-card 
                    iconClass="fas fa-file-alt" 
                    title="document.pdf" 
                    subtitle="Last modified 2 hours ago" 
            detailsHref="#" 
                    linkHref="#" 
                />
                <x-ui.file-card 
                    iconClass="fas fa-image" 
                    title="photo.jpg" 
                    subtitle="Uploaded yesterday" 
            detailsHref="#" 
                    linkHref="#" 
                />
            </div>
        </div>
    </div>

    <h4 class="text-2xl font-semibold text-gray-900 mb-5">File List (Multiple View Modes)</h4>
    <div class="space-y-6">
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">List View (Default):</h4>
            <x-ui.file-list :files="[
                [
                    'name' => 'report.xlsx',
                    'type' => 'Excel Spreadsheet',
                    'icon' => 'fas fa-file-excel',
                    'modified' => '1 day ago',
                    'size' => '2.4 MB'
                ],
                [
                    'name' => 'notes.docx',
                    'type' => 'Word Document',
                    'icon' => 'fas fa-file-word',
                    'modified' => '5 hours ago',
                    'size' => '1.2 MB'
                ],
                [
                    'name' => 'archive.zip',
                    'type' => 'ZIP Archive',
                    'icon' => 'fas fa-file-archive',
                    'modified' => '1 week ago',
                    'size' => '15.8 MB'
                ],
                [
                    'name' => 'presentation.mp4',
                    'type' => 'Video File',
                    'icon' => 'fas fa-file-video',
                    'modified' => '2 weeks ago',
                    'size' => '45.2 MB'
                ],
                [
                    'name' => 'photo.jpg',
                    'type' => 'JPEG Image',
                    'icon' => 'fas fa-file-image',
                    'modified' => '3 days ago',
                    'size' => '3.1 MB'
                ]
            ]" viewMode="list" />
        </div>

        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Grid View:</h4>
            <x-ui.file-list :files="[
                [
                    'name' => 'Documents',
                    'type' => 'Folder',
                    'icon' => 'fas fa-folder',
                    'modified' => '2 hours ago',
                    'size' => '--'
                ],
                [
                    'name' => 'Images',
                    'type' => 'Folder',
                    'icon' => 'fas fa-folder',
                    'modified' => '1 day ago',
                    'size' => '--'
                ],
                [
                    'name' => 'Videos',
                    'type' => 'Folder',
                    'icon' => 'fas fa-folder',
                    'modified' => '3 days ago',
                    'size' => '--'
                ],
                [
                    'name' => 'project.pdf',
                    'type' => 'PDF Document',
                    'icon' => 'fas fa-file-pdf',
                    'modified' => '1 week ago',
                    'size' => '5.2 MB'
                ],
                [
                    'name' => 'data.csv',
                    'type' => 'CSV File',
                    'icon' => 'fas fa-file-csv',
                    'modified' => '2 weeks ago',
                    'size' => '1.8 MB'
                ],
                [
                    'name' => 'script.js',
                    'type' => 'JavaScript',
                    'icon' => 'fas fa-file-code',
                    'modified' => '1 month ago',
                    'size' => '0.5 MB'
                ]
            ]" viewMode="grid" />
        </div>

        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Tiles View:</h4>
            <x-ui.file-list :files="[
                [
                    'name' => 'Personal Vault',
                    'type' => 'Secure Folder',
                    'icon' => 'fas fa-shield-alt',
                    'modified' => '1 hour ago',
                    'size' => '--'
                ],
                [
                    'name' => 'Shared Files',
                    'type' => 'Shared Folder',
                    'icon' => 'fas fa-share-alt',
                    'modified' => '4 hours ago',
                    'size' => '--'
                ],
                [
                    'name' => 'Backup',
                    'type' => 'Archive Folder',
                    'icon' => 'fas fa-archive',
                    'modified' => '1 day ago',
                    'size' => '--'
                ]
            ]" viewMode="tiles" />
        </div>

        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Details View:</h4>
            <x-ui.file-list :files="[
                [
                    'name' => 'Getting started with OneDrive.pdf',
                    'type' => 'PDF Document',
                    'icon' => 'fas fa-file-pdf',
                    'modified' => '2 days ago',
                    'size' => '3.2 MB'
                ],
                [
                    'name' => 'MauBaoCaoBaiTapNhom.docx',
                    'type' => 'Word Document',
                    'icon' => 'fas fa-file-word',
                    'modified' => '1 week ago',
                    'size' => '2.1 MB'
                ],
                [
                    'name' => 'screenshot.png',
                    'type' => 'PNG Image',
                    'icon' => 'fas fa-file-image',
                    'modified' => '3 days ago',
                    'size' => '1.5 MB'
                ]
            ]" viewMode="details" />
        </div>
    </div>

    <h4 class="text-2xl font-semibold text-gray-900 mb-5">Storage Usage</h4>
    <div class="space-y-6">
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Storage Usage Examples:</h4>
            <div class="space-y-4 max-w-md">
                <x-ui.storage-usage used="14.80" total="20" />
                <x-ui.storage-usage used="5.25" total="10" />
                <x-ui.storage-usage used="2.1" total="5" />
            </div>
        </div>
    </div>

    <h4 class="text-2xl font-semibold text-gray-900 mb-5">Offcanvas</h4>
    <div class="space-y-6">
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Offcanvas Examples:</h4>
            <div class="space-x-2 mb-4">
                <x-buttons.button-show-offcanvas id="small-panel" value="Small Panel" type="primary" icon="fas fa-bars" />
                <x-buttons.button-show-offcanvas id="medium-panel" value="Medium Panel" type="secondary" icon="fas fa-list" />
                <x-buttons.button-show-offcanvas id="large-panel" value="Large Panel" type="primary" icon="fas fa-th-large" />
                <x-buttons.button-show-offcanvas id="full-screen" value="Full Screen" type="danger" icon="fas fa-expand" />
            </div>
            
            <x-overlays.offcanvas id="small-panel" width="25" title="Small Panel" alignment="right">
                <p class="text-gray-600">This is a small offcanvas panel (25% width) that slides in from the right.</p>
            </x-overlays.offcanvas>
            
            <x-overlays.offcanvas id="medium-panel" width="50" title="Medium Panel" alignment="left">
                <p class="text-gray-600">This is a medium offcanvas panel (50% width) that slides in from the left.</p>
            </x-overlays.offcanvas>
            
            <x-overlays.offcanvas id="large-panel" width="75" title="Large Panel" alignment="right">
                <p class="text-gray-600">This is a large offcanvas panel (75% width) that slides in from the right.</p>
            </x-overlays.offcanvas>
            
            <x-overlays.offcanvas id="full-screen" width="100" title="Full Screen" alignment="top">
                <p class="text-gray-600">This is a full screen offcanvas panel that slides in from the top.</p>
            </x-overlays.offcanvas>
        </div>
    </div>

    <h4 class="text-2xl font-semibold text-gray-900 mb-5">Subnav</h4>
    <div class="space-y-6">
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Horizontal Subnav:</h4>
            <x-ui.subnav 
                :items="[
                    ['id' => 'overview', 'label' => 'Overview', 'href' => '#', 'icon' => 'fas fa-chart-line'],
                    ['id' => 'files', 'label' => 'Files', 'href' => '#', 'icon' => 'fas fa-folder', 'badge' => '12'],
                    ['id' => 'sharing', 'label' => 'Sharing', 'href' => '#', 'icon' => 'fas fa-share-alt'],
                    ['id' => 'settings', 'label' => 'Settings', 'href' => '#', 'icon' => 'fas fa-cog']
                ]"
                activeItem="files"
            />
        </div>
        
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Vertical Subnav:</h4>
            <div class="max-w-xs">
                <x-ui.subnav 
                    :items="[
                        ['id' => 'dashboard', 'label' => 'Dashboard', 'href' => '#', 'icon' => 'fas fa-home'],
                        ['id' => 'projects', 'label' => 'Projects', 'href' => '#', 'icon' => 'fas fa-folder-open', 'badge' => '5'],
                        ['id' => 'team', 'label' => 'Team', 'href' => '#', 'icon' => 'fas fa-users'],
                        ['id' => 'analytics', 'label' => 'Analytics', 'href' => '#', 'icon' => 'fas fa-chart-bar'],
                        ['id' => 'billing', 'label' => 'Billing', 'href' => '#', 'icon' => 'fas fa-credit-card']
                    ]"
                    activeItem="projects"
                    orientation="vertical"
                />
            </div>
        </div>
        
        <div>
            <h4 class="text-base font-semibold text-gray-700 mb-3">Simple Subnav (No Icons):</h4>
            <x-ui.subnav 
                :items="[
                    ['id' => 'all', 'label' => 'All', 'href' => '#'],
                    ['id' => 'recent', 'label' => 'Recent', 'href' => '#'],
                    ['id' => 'favorites', 'label' => 'Favorites', 'href' => '#'],
                    ['id' => 'trash', 'label' => 'Trash', 'href' => '#']
                ]"
                activeItem="recent"
            />
        </div>
    </div>

</div>
@endsection
