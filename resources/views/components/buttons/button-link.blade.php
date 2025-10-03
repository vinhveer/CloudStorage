@props(['value' => null, 'href', 'type' => 'primary', 'icon' => null, 'size' => 'md'])

<x-buttons.base-button tag="a" :href="$href" :type="$type" :size="$size" :icon="$icon" :value="$value" {{ $attributes }} />
