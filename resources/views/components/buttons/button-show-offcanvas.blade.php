@props(['id', 'value' => null, 'type' => 'primary', 'icon' => null, 'size' => 'md'])

<x-buttons.base-button tag="button" :type="$type" :size="$size" :icon="$icon" :value="$value" x-data @click="$dispatch('open-offcanvas', { id: '{{ $id }}' })" class="cursor-pointer" {{ $attributes }} />
