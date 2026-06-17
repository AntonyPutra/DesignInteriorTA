@extends('layouts.app')

@section('title', 'Services')
@section('meta_description', 'Layanan Pratama Design Studio: Fit-Out Consultation, Project Plan & Schedule, Budgeting, Rendering 3D, Production, dan Fit Out & Renovation.')

@section('content')

{{-- Page Hero --}}
<section class="relative py-20 lg:py-28" style="background-color: #2A2219;">
    <div class="absolute inset-0 opacity-[0.04]"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-sm mb-4" style="color: rgba(255,255,255,0.45);">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <i class="fas fa-chevron-right text-[0.6rem]"></i>
            <span style="color: #B85C4A;">Services</span>
        </div>
        <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">What We Do</p>
        <h1 class="font-display text-4xl lg:text-6xl font-semibold text-white leading-tight"
            style="font-family: 'Cormorant Garamond', serif;">
            Layanan Kami
        </h1>
        <p class="mt-4 text-base max-w-xl leading-relaxed" style="color: rgba(255,255,255,0.6);">
            Kami menyediakan layanan desain interior & exterior yang komprehensif — dari konsultasi awal hingga proyek selesai.
        </p>
    </div>
</section>

{{-- ============================================================ --}}
{{-- SERVICES GRID                                                 --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24" style="background-color: #F8F5EF;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Layanan Lengkap</p>
            <h2 class="font-display text-4xl font-semibold mb-3" style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                Solusi Interior &amp; Exterior Design
            </h2>
            <p class="text-gray-500 max-w-xl mx-auto text-sm leading-relaxed">
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
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-layer-group text-4xl mb-3 opacity-40"></i>
            <p>Belum ada layanan tersedia.</p>
        </div>
        @endif
    </div>
</section>

{{-- ============================================================ --}}
{{-- HOW WE WORK (Ringkas)                                        --}}
{{-- ============================================================ --}}
<section class="py-20 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-up">
            <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Proses Kerja</p>
            <h2 class="font-display text-4xl font-semibold" style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                Bagaimana Kami Bekerja
            </h2>
            <div class="w-10 h-0.5 mx-auto mt-3" style="background-color: #B85C4A;"></div>
        </div>

        <div class="relative">
            {{-- Connector line (desktop) --}}
            <div class="hidden lg:block absolute top-8 left-[12.5%] right-[12.5%] h-px" style="background-color: #E2DDD6;"></div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['1', 'fas fa-phone-alt',    'Hubungi Kami',    'Hubungi via WhatsApp atau isi form konsultasi online.'],
                    ['2', 'fas fa-handshake',    'Diskusi & Survey','Tim kami akan diskusi kebutuhan dan survey lokasi Anda.'],
                    ['3', 'fas fa-pencil-ruler',  'Desain & Proposal','Kami siapkan desain 3D, RAB, dan proposal lengkap.'],
                    ['4', 'fas fa-star',         'Eksekusi & Serah Terima','Proses fit-out dengan pengawasan ketat hingga selesai.'],
                ] as [$num, $icon, $title, $desc])
                <div class="fade-up text-center">
                    <div class="relative inline-flex">
                        <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto border-4 border-white shadow-md"
                             style="background-color: #3E372C;">
                            <i class="{{ $icon }} text-white"></i>
                        </div>
                        <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full text-xs font-bold text-white flex items-center justify-center"
                              style="background-color: #B85C4A; font-size: 0.6rem;">{{ $num }}</span>
                    </div>
                    <h3 class="font-semibold mt-4 mb-2 text-sm" style="color: #3E372C;">{{ $title }}</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- CTA                                                           --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20" style="background-color: #3E372C;">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6 fade-up">
            <div>
                <h2 class="font-display text-3xl font-semibold text-white mb-2"
                    style="font-family: 'Cormorant Garamond', serif;">
                    Siap Memulai Proyek Anda?
                </h2>
                <p class="text-sm" style="color: rgba(255,255,255,0.6);">
                    Konsultasikan kebutuhan desain interior Anda. Gratis pre-layout concept sebelum agreement.
                </p>
            </div>
            <div class="flex flex-wrap gap-3 flex-shrink-0">
                <a href="{{ route('consultation.create') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded text-sm font-semibold text-white transition-all duration-200 hover:opacity-90"
                   style="background-color: #B85C4A;">
                    <i class="fas fa-comment-dots"></i>
                    Konsultasi Sekarang
                </a>
                <a href="https://wa.me/6282213641995" target="_blank"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded text-sm font-semibold text-white transition-all duration-200 hover:bg-white/10"
                   style="border: 1.5px solid rgba(255,255,255,0.4);">
                    <i class="fab fa-whatsapp"></i>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
