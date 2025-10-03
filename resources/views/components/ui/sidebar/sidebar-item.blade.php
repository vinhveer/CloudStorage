@props(['title', 'href' => '#', 'isActive' => false, 'icon'])

<a href="{{ $href }}" 
   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 {{ $isActive ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
    <i class="{{ $icon }} mr-4 text-base"></i>
    {{ $title }}
</a>
