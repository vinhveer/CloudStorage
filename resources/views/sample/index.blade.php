@extends('layout')

@section('title', 'Sample Page')
@section('header', 'Sample Page')

@section('content')
<div class="space-y-6">
    <h3 class="text-3xl font-semibold text-gray-700">Components Examples</h3>
    
    <h4 class="text-xl font-medium text-gray-600 mb-5">Button Link</h4>
    <div class="space-y-4">
        <div>
            <h4 class="text-md font-medium text-gray-600 mb-2">Size Variants:</h4>
            <div class="space-x-2">
                <x-button-link value="Small" href="#" type="primary" size="sm" />
                <x-button-link value="Medium" href="#" type="primary" size="md" />
                <x-button-link value="Large" href="#" type="primary" size="lg" />
            </div>
        </div>
        
        <div>
            <h4 class="text-md font-medium text-gray-600 mb-2">Text/Icon Display Logic:</h4>
            <div class="space-x-2">
                <x-button-link value="Text Only" href="#" type="secondary" />
                <x-button-link href="#" type="secondary" icon="fas fa-heart" />
                <x-button-link value="Both" href="#" type="secondary" icon="fas fa-star" />
            </div>
        </div>
        
        <div>
            <h4 class="text-md font-medium text-gray-600 mb-2">Type Variants:</h4>
            <div class="space-x-2">
                <x-button-link value="Primary" href="#" type="primary" icon="fas fa-check" />
                <x-button-link value="Secondary" href="#" type="secondary" icon="fas fa-user" />
                <x-button-link value="Danger" href="#" type="danger" icon="fas fa-trash" size="lg" />
            </div>
        </div>
        
        <div>
            <h4 class="text-md font-medium text-gray-600 mb-2">Modal Confirmation:</h4>
            <div class="space-x-2">
                <x-button-link-modal value="Delete Item" href="#" type="danger" icon="fas fa-trash" confirmText="Are you sure you want to delete this item?" confirmButtonText="Delete" cancelButtonText="Cancel" />
                <x-button-link-modal value="Logout" href="#" type="secondary" icon="fas fa-sign-out-alt" confirmText="Are you sure you want to logout?" confirmButtonText="Logout" cancelButtonText="Stay" />
                <x-button-link-modal value="Reset" href="#" type="primary" icon="fas fa-undo" confirmText="This will reset all settings. Continue?" confirmButtonText="Reset" cancelButtonText="Cancel" />
            </div>
        </div>
    </div>

    <h4 class="text-xl font-medium text-gray-600 mb-5">File Card</h4>
    <div class="space-y-4">
        <div>
            <h4 class="text-md font-medium text-gray-600 mb-2">File Card Examples:</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
                <x-file-card 
                    iconClass="fas fa-file-code" 
                    title="hello.cpp" 
                    subtitle="Your open at 3 minutes" 
                    detailsHref="#" 
                    linkHref="#" 
                />
                <x-file-card 
                    iconClass="fas fa-file-alt" 
                    title="document.pdf" 
                    subtitle="Last modified 2 hours ago" 
                    detailsHref="#" 
                    linkHref="#" 
                />
                <x-file-card 
                    iconClass="fas fa-image" 
                    title="photo.jpg" 
                    subtitle="Uploaded yesterday" 
                    detailsHref="#" 
                    linkHref="#" 
                />
            </div>
        </div>
    </div>

    <h4 class="text-xl font-medium text-gray-600 mb-5">Storage Usage</h4>
    <div class="space-y-4">
        <div>
            <h4 class="text-md font-medium text-gray-600 mb-2">Storage Usage Examples:</h4>
            <div class="space-y-4 max-w-md">
                <x-storage-usage used="14.80" total="20" />
                <x-storage-usage used="5.25" total="10" />
                <x-storage-usage used="2.1" total="5" />
            </div>
        </div>
    </div>

</div>
@endsection
