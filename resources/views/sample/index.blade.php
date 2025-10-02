@extends('layout')

@section('title', 'Sample Page')
@section('header', 'Sample Page')

@section('content')
<div class="flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Welcome!</h2>
        <p class="text-gray-600 mb-6">This is a sample Blade view styled with Tailwind CSS.</p>
        
        <div class="space-y-6">
            <h3 class="text-lg font-semibold text-gray-700">ButtonLink Component Examples:</h3>
            <p class="text-sm text-gray-500">Test icon: <i class="fas fa-heart text-red-500"></i> Font Awesome working!</p>
            <p class="text-sm text-gray-500">Another test: <i class="fas fa-star text-yellow-500"></i> <i class="fas fa-check text-green-500"></i></p>
            <p class="text-sm text-gray-500">Unicode fallback: ❤️ ⭐ ✅ (if these show, Font Awesome might not be loading)</p>
            
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
        </div>
    </div>
</div>
@endsection
