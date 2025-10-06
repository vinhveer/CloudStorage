@props(['value' => null, 'href', 'type' => 'primary', 'icon' => null, 'size' => 'md', 'modalId' => null, 'confirmText' => 'Are you sure?', 'confirmButtonText' => 'Confirm', 'cancelButtonText' => 'Cancel', 'modalTitle' => 'Confirm Action'])

@php
    $modalId = $modalId ?: 'modal-' . uniqid();
    $confirmType = $type;
@endphp

<x-buttons.base-button tag="button" type="button" :type="$type" :size="$size" :icon="$icon" :value="$value" onclick="openModal('{{ $modalId }}')" {{ $attributes }} />

<x-overlays.modal-confirm 
    :id="$modalId" 
    :title="$modalTitle" 
    :confirmText="$confirmText" 
    :confirmButtonText="$confirmButtonText" 
    :cancelButtonText="$cancelButtonText" 
    :confirmHref="$href"
    :confirmType="$confirmType"
/>
