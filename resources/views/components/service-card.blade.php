{{-- Service Card Component --}}
{{-- Usage: <x-service-card :service="$service" /> --}}

@props(['service'])

@php
    $iconMap = [
        'chat-bubble-left-right' => 'fas fa-comments',
        'calendar-days'          => 'fas fa-calendar-days',
        'calculator'             => 'fas fa-calculator',
        'computer-desktop'       => 'fas fa-display',
        'wrench-screwdriver'     => 'fas fa-screwdriver-wrench',
        'home-modern'            => 'fas fa-house-chimney',
        // fallback
        'default'                => 'fas fa-star',
    ];
    $faIcon = $iconMap[$service->icon] ?? $iconMap['default'];
@endphp

<div class="group rounded-xl overflow-hidden transition-all duration-300 hover:-translate-y-1 flex flex-col border"
     style="background: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">

    {{-- Top accent bar --}}
    <div class="h-1 w-full transition-all duration-300"
         style="background: linear-gradient(90deg, var(--accent), #d98d88);"></div>

    <div class="p-7 flex flex-col flex-1">

        {{-- Icon --}}
        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-5 transition-transform duration-300 group-hover:scale-105"
             style="background-color: var(--paper); border: 1px solid var(--line);">
            <i class="{{ $faIcon }} text-lg" style="color: var(--accent);"></i>
        </div>

        {{-- Name --}}
        <h3 class="font-semibold text-lg mb-2.5 leading-snug transition-colors duration-200 group-hover:text-[var(--accent)]"
            style="font-family: var(--serif); font-size: 1.25rem; color: var(--text-heading);">
            {{ $service->name }}
        </h3>

        {{-- Description --}}
        <p class="text-sm leading-relaxed mb-6 flex-1" style="color: var(--text-lead);">
            {{ Str::limit($service->description, 130) }}
        </p>

        {{-- CTA --}}
        <a href="{{ route('consultation.create') }}?service={{ $service->slug }}"
           class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider transition-all duration-200 group/link mt-auto"
           style="color: var(--accent);">
            Konsultasi Layanan Ini
            <i class="fas fa-arrow-right text-[10px] transition-transform duration-200 group-hover/link:translate-x-1"></i>
        </a>
    </div>
</div>
