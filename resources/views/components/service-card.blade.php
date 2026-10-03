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

<div class="group bg-white rounded-xl overflow-hidden transition-all duration-300 hover:-translate-y-1 flex flex-col border border-[#e4dfd7]"
     style="box-shadow: 0 2px 8px rgba(36, 33, 29, 0.04);"
     onmouseover="this.style.boxShadow='0 14px 32px rgba(48, 44, 36, 0.1)'; this.style.borderColor='rgba(181, 91, 72, 0.35)';"
     onmouseout="this.style.boxShadow='0 2px 8px rgba(36, 33, 29, 0.04)'; this.style.borderColor='#e4dfd7';">

    {{-- Top accent bar --}}
    <div class="h-1 w-full transition-all duration-300"
         style="background: linear-gradient(90deg, #b55b48, #d98d88);"></div>

    <div class="p-7 flex flex-col flex-1">

        {{-- Icon --}}
        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-5 transition-transform duration-300 group-hover:scale-105"
             style="background-color: #faf8f5; border: 1px solid #ede8e1;">
            <i class="{{ $faIcon }} text-lg" style="color: #b55b48;"></i>
        </div>

        {{-- Name --}}
        <h3 class="font-semibold text-lg mb-2.5 leading-snug transition-colors duration-200 group-hover:text-[#b55b48]"
            style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.25rem; color: #24211d;">
            {{ $service->name }}
        </h3>

        {{-- Description --}}
        <p class="text-sm leading-relaxed mb-6 flex-1" style="color: #564e42;">
            {{ Str::limit($service->description, 130) }}
        </p>

        {{-- CTA --}}
        <a href="{{ route('consultation.create') }}?service={{ $service->slug }}"
           class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider transition-all duration-200 group/link mt-auto"
           style="color: #b55b48;">
            Konsultasi Layanan Ini
            <i class="fas fa-arrow-right text-[10px] transition-transform duration-200 group-hover/link:translate-x-1"></i>
        </a>
    </div>
</div>
