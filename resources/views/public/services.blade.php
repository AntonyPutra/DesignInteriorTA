@extends('layouts.app')

@section('title', 'Services')
@section('meta_description', 'Layanan Pratama Design Studio: Fit-Out Consultation, Project Plan & Schedule, Budgeting, Rendering 3D, Production, dan Fit Out & Renovation.')

@section('content')

<x-subpage-hero
    title="Layanan Kami"
    eyebrow="What We Do"
    description="Kami menyediakan layanan desain interior & exterior yang komprehensif — dari konsultasi awal hingga proyek selesai."
    :breadcrumbs="['Services' => '']"
    image-keyword="kitchen"
/>

{{-- ============================================================ --}}
{{-- SERVICES GRID                                                 --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: var(--paper);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: var(--accent);">Layanan Lengkap</p>
            <h2 class="font-display text-4xl font-semibold mb-3" style="font-family: var(--serif); color: var(--text-heading);">
                Solusi Interior &amp; Exterior Design
            </h2>
            <p class="max-w-xl mx-auto text-sm leading-relaxed" style="color: var(--text-lead);">
                Setiap layanan kami dirancang untuk memberikan hasil terbaik sesuai kebutuhan dan anggaran Anda.
            </p>
        </div>

        @if($services->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @foreach($services as $service)
            <div class="fade-up">
                <x-service-card :service="$service" />
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16" style="color: var(--muted);">
            <i class="fas fa-layer-group text-4xl mb-3 opacity-40"></i>
            <p>Belum ada layanan tersedia.</p>
        </div>
        @endif
    </div>
</section>

{{-- ============================================================ --}}
{{-- HOW WE WORK (Ringkas)                                        --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24 border-t border-b" style="background-color: var(--card-bg); border-color: var(--card-border);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: var(--accent);">Proses Kerja</p>
            <h2 class="font-display text-4xl font-semibold" style="font-family: var(--serif); color: var(--text-heading);">
                Bagaimana Kami Bekerja
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-3" style="background-color: var(--accent);"></div>
        </div>

        <div class="relative">
            {{-- Connector line (desktop) --}}
            <div class="hidden lg:block absolute top-8 left-[12.5%] right-[12.5%] h-px" style="background-color: var(--line);"></div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['1', 'fas fa-phone-alt',    'Hubungi Kami',    'Hubungi via WhatsApp atau isi form konsultasi online.'],
                    ['2', 'fas fa-handshake',    'Diskusi & Survey','Tim kami akan diskusi kebutuhan dan survey lokasi Anda.'],
                    ['3', 'fas fa-pencil-ruler',  'Desain & Proposal','Kami siapkan desain 3D, RAB, dan proposal lengkap.'],
                    ['4', 'fas fa-star',         'Eksekusi & Serah Terima','Proses fit-out dengan pengawasan ketat hingga selesai.'],
                ] as [$num, $icon, $title, $desc])
                <div class="fade-up text-center">
                    <div class="relative inline-flex">
                        <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto border-4 shadow-md"
                             style="background-color: var(--brown-deep); border-color: var(--card-bg);">
                            <i class="{{ $icon }} text-white"></i>
                        </div>
                        <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full text-xs font-bold text-white flex items-center justify-center shadow-sm"
                              style="background-color: var(--accent); font-size: 0.6rem;">{{ $num }}</span>
                    </div>
                    <h3 class="font-semibold mt-4 mb-2 text-sm" style="font-family: var(--serif); font-size: 1.15rem; color: var(--text-heading);">{{ $title }}</h3>
                    <p class="text-xs leading-relaxed" style="color: var(--text-lead);">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- CTA                                                           --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20" style="background-color: var(--brown-deep); color: #fbfaf7;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6 fade-up">
            <div>
                <h2 class="font-display text-3xl font-semibold text-white mb-2"
                    style="font-family: var(--serif);">
                    Siap Memulai Proyek Anda?
                </h2>
                <p class="text-sm" style="color: rgba(255,255,255,0.7);">
                    Konsultasikan kebutuhan desain interior Anda. Gratis pre-layout concept sebelum agreement.
                </p>
            </div>
            <div class="flex flex-wrap gap-3 flex-shrink-0">
                <a href="{{ route('consultation.create') }}"
                   class="consult-button trigger-contact-modal inline-flex items-center gap-2 px-6 py-3 rounded-lg text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 shadow-md"
                   style="background-color: var(--accent);">
                    <i class="fas fa-comment-dots text-xs"></i>
                    Konsultasi Sekarang
                </a>
                <a href="https://wa.me/6282213641995" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-lg text-sm font-semibold text-white transition-all duration-200 hover:bg-white/10"
                   style="border: 1px solid rgba(255,255,255,0.3);">
                    <i class="fab fa-whatsapp"></i>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
