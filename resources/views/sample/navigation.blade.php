@extends('layout.app-layout')

@section('title', 'Navigation Test')
@section('navbarTitle', 'CloudStorage')
@section('activeSidebarItem', 'files')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">My Files</h1>
    </div>
    
    <!-- File Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">
        <x-ui.file-card 
            iconClass="fas fa-file-code" 
            title="project.js" 
            subtitle="Modified 2 hours ago" 
            detailsHref="#" 
            linkHref="#" 
        />
        <x-ui.file-card 
            iconClass="fas fa-file-image" 
            title="screenshot.png" 
            subtitle="Modified yesterday" 
            detailsHref="#" 
            linkHref="#" 
        />
        <x-ui.file-card 
            iconClass="fas fa-file-pdf" 
            title="document.pdf" 
            subtitle="Modified 3 days ago" 
            detailsHref="#" 
            linkHref="#" 
        />
        <x-ui.file-card 
            iconClass="fas fa-folder" 
            title="Documents" 
            subtitle="12 items" 
            detailsHref="#" 
            linkHref="#" 
        />
        <x-ui.file-card 
            iconClass="fas fa-file-video" 
            title="presentation.mp4" 
            subtitle="Modified 1 week ago" 
            detailsHref="#" 
            linkHref="#" 
        />
        <x-ui.file-card 
            iconClass="fas fa-file-archive" 
            title="backup.zip" 
            subtitle="Modified 2 weeks ago" 
            detailsHref="#" 
            linkHref="#" 
        />
    </div>
    
    <!-- Storage Usage -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Storage Usage</h2>
        <div class="space-y-4">
            <x-ui.storage-usage used="14.80" total="20" />
            <x-ui.storage-usage used="5.25" total="10" />
            <x-ui.storage-usage used="2.1" total="5" />
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="bg-white rounded-2xl p-6 shadow-sm">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h2>
        <div class="space-y-3">
            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50">
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-upload text-blue-600 text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Uploaded project.js</p>
                    <p class="text-xs text-gray-500">2 hours ago</p>
                </div>
            </div>
            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-share text-green-600 text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Shared Documents folder</p>
                    <p class="text-xs text-gray-500">1 day ago</p>
                </div>
            </div>
            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50">
                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-edit text-yellow-600 text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Modified presentation.mp4</p>
                    <p class="text-xs text-gray-500">3 days ago</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
