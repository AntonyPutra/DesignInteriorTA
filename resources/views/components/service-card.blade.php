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

<div class="group bg-white rounded-xl overflow-hidden transition-all duration-300 hover:-translate-y-1 flex flex-col"
     style="border: 1px solid #E2DDD6; box-shadow: 0 1px 4px rgba(0,0,0,0.05);"
     onmouseover="this.style.boxShadow='0 12px 32px rgba(62,55,44,0.12)'; this.style.borderColor='#B85C4A40';"
     onmouseout="this.style.boxShadow='0 1px 4px rgba(0,0,0,0.05)'; this.style.borderColor='#E2DDD6';">

    {{-- Top accent bar --}}
    <div class="h-1 w-full transition-all duration-300 group-hover:w-full"
         style="background: linear-gradient(90deg, #B85C4A, #8A6F55);"></div>

    <div class="p-7 flex flex-col flex-1">

        {{-- Icon --}}
        <div class="w-12 h-12 rounded-lg flex items-center justify-center mb-5 transition-all duration-300 group-hover:scale-110"
             style="background-color: #FEF6F4;">
            <i class="{{ $faIcon }} text-lg" style="color: #B85C4A;"></i>
        </div>

        {{-- Name --}}
        <h3 class="font-semibold text-base mb-2.5 leading-snug transition-colors duration-200 group-hover:text-[#B85C4A]"
            style="font-family: 'Cormorant Garamond', serif; font-size: 1.1rem; color: #3E372C;">
            {{ $service->name }}
        </h3>

        {{-- Description --}}
        <p class="text-sm leading-relaxed mb-6 flex-1" style="color: #6B6B6B;">
            {{ Str::limit($service->description, 120) }}
        </p>

        {{-- CTA --}}
        <a href="{{ route('consultation.create') }}?service={{ $service->slug }}"
           class="inline-flex items-center gap-2 text-sm font-semibold transition-all duration-200 group/link mt-auto"
           style="color: #B85C4A;">
            Konsultasi Layanan Ini
            <i class="fas fa-arrow-right text-xs transition-transform duration-200 group-hover/link:translate-x-1"></i>
        </a>
    </div>
</div>
