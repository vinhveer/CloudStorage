@props(['title' => null, 'subtitle' => null, 'action' => null, 'method' => 'POST'])

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        
        <x-ui.card :title="$title" :subtitle="$subtitle" class="w-full">
            
            @if($action)
                <form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}" class="space-y-6">
                    @if($method !== 'GET' && $method !== 'POST')
                        @method($method)
                    @endif
                    @if($method !== 'GET')
                        @csrf
                    @endif
                    
                    {{ $slot }}
                </form>
            @else
                <div class="space-y-6">
                    {{ $slot }}
                </div>
            @endif
            
        </x-ui.card>
        
        <!-- Footer Links -->
        @isset($footer)
            <div class="text-center">
                {{ $footer }}
            </div>
        @endisset
        
    </div>
</div>
