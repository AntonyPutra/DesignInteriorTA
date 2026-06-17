{{-- Alert Component --}}
{{-- Usage: <x-alert type="success" :message="$message" /> --}}

@props(['type' => 'success', 'message' => ''])

@php
    $styles = [
        'success' => [
            'bg'     => 'bg-green-50 border-green-200',
            'icon'   => 'fas fa-check-circle',
            'color'  => 'text-green-600',
            'title'  => 'Berhasil!',
            'text'   => 'text-green-800',
        ],
        'error' => [
            'bg'     => 'bg-red-50 border-red-200',
            'icon'   => 'fas fa-exclamation-circle',
            'color'  => 'text-red-600',
            'title'  => 'Terjadi Kesalahan!',
            'text'   => 'text-red-800',
        ],
        'warning' => [
            'bg'     => 'bg-yellow-50 border-yellow-200',
            'icon'   => 'fas fa-exclamation-triangle',
            'color'  => 'text-yellow-600',
            'title'  => 'Perhatian!',
            'text'   => 'text-yellow-800',
        ],
        'info' => [
            'bg'     => 'bg-blue-50 border-blue-200',
            'icon'   => 'fas fa-info-circle',
            'color'  => 'text-blue-600',
            'title'  => 'Informasi',
            'text'   => 'text-blue-800',
        ],
    ];
    $s = $styles[$type] ?? $styles['info'];
@endphp

<div x-data="{ show: true }" x-show="show" x-transition
     class="flex items-start gap-3 rounded-lg border p-4 {{ $s['bg'] }}"
     role="alert">
    <i class="{{ $s['icon'] }} {{ $s['color'] }} text-lg flex-shrink-0 mt-0.5"></i>
    <div class="flex-1 min-w-0">
        <p class="text-sm font-semibold {{ $s['text'] }}">{{ $s['title'] }}</p>
        @if($message)
            <p class="text-sm {{ $s['text'] }} mt-0.5 opacity-90">{{ $message }}</p>
        @endif
        {{ $slot }}
    </div>
    <button @click="show = false"
            class="{{ $s['color'] }} hover:opacity-70 transition-opacity flex-shrink-0 mt-0.5"
            aria-label="Close alert">
        <i class="fas fa-times text-sm"></i>
    </button>
</div>
