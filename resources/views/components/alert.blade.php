@props(['type' => 'info', 'text' => ''])

@php
    $colors = [
        'info' => 'bg-blue-50 border-blue-400 text-blue-700',
        'success' => 'bg-green-50 border-green-400 text-green-700',
        'warning' => 'bg-yellow-50 border-yellow-400 text-yellow-700',
        'danger' => 'bg-red-50 border-red-400 text-red-700',
        'default' => 'bg-gray-50 border-gray-400 text-gray-700'
    ];
    
    $icons = [
        'info' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        'success' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        'warning' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
        'danger' => 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        'default' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
    ];
    
    $colorClasses = $colors[$type] ?? $colors['default'];
    $iconPath = $icons[$type] ?? $icons['default'];
@endphp

<div {{ $attributes->merge(['class' => "border-l-4 p-4 mb-4 rounded $colorClasses"]) }} role="alert">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="{{ $iconPath }}" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            @if($text)
                <h3 class="text-sm font-medium">{{ $text }}</h3>
            @endif
            <div class="{{ $text ? 'mt-2' : '' }} text-sm">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>