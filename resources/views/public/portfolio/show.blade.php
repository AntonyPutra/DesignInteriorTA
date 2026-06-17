@extends('layouts.app')

@section('title', $portfolio->title)
@section('meta_description', Str::limit($portfolio->description ?? $portfolio->title . ' — Proyek desain interior oleh Pratama Design Studio.', 160))

@section('content')

{{-- ============================================================ --}}
{{-- MAIN IMAGE HERO                                               --}}
{{-- ============================================================ --}}
<section class="relative min-h-[55vh] flex items-end overflow-hidden" style="background-color: #1E1812;">
    {{-- Background Image / Placeholder --}}
    @if($portfolio->main_image && Storage::disk('public')->exists($portfolio->main_image))
        <img src="{{ Storage::url($portfolio->main_image) }}"
             alt="{{ $portfolio->title }}"
             class="absolute inset-0 w-full h-full object-cover">
    @else
        <div class="absolute inset-0"
             style="background: linear-gradient(135deg, #2A2219 0%, #3E372C 40%, #5A4A38 70%, #8A6F55 100%);">
            <div class="absolute inset-0 flex items-center justify-center opacity-10">
                <i class="fas fa-couch" style="font-size: 10rem; color: white;"></i>
            </div>
        </div>
    @endif

    {{-- Dark gradient overlay --}}
    <div class="absolute inset-0"
         style="background: linear-gradient(to top, rgba(20,16,12,0.92) 0%, rgba(20,16,12,0.4) 50%, rgba(20,16,12,0.15) 100%);"></div>

    {{-- Content --}}
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 pt-24">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm mb-4" style="color: rgba(255,255,255,0.5);">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <i class="fas fa-chevron-right text-[0.6rem]"></i>
            <a href="{{ route('portfolio.index') }}" class="hover:text-white transition-colors">Portfolio</a>
            <i class="fas fa-chevron-right text-[0.6rem]"></i>
            <span style="color: #B85C4A;">{{ Str::limit($portfolio->title, 30) }}</span>
        </div>

        {{-- Category badge --}}
        <div class="mb-3">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold text-white"
                  style="background-color: rgba(184,92,74,0.85);">
                {{ $portfolio->category->name ?? 'Portfolio' }}
            </span>
        </div>

        {{-- Title --}}
        <h1 class="font-display text-3xl lg:text-5xl font-semibold text-white leading-tight"
            style="font-family: 'Cormorant Garamond', serif;">
            {{ $portfolio->title }}
        </h1>

        <div class="flex flex-wrap items-center gap-4 mt-3">
            @if($portfolio->location)
            <span class="flex items-center gap-1.5 text-sm" style="color: rgba(255,255,255,0.65);">
                <i class="fas fa-map-marker-alt text-xs" style="color: #B85C4A;"></i>
                {{ $portfolio->location }}
            </span>
            @endif
            @if($portfolio->year)
            <span class="flex items-center gap-1.5 text-sm" style="color: rgba(255,255,255,0.65);">
                <i class="fas fa-calendar text-xs" style="color: #B85C4A;"></i>
                {{ $portfolio->year }}
            </span>
            @endif
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- PROJECT DETAILS + DESCRIPTION                                 --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12 lg:gap-16">

            {{-- Left: Description --}}
            <div class="lg:col-span-2">
                <h2 class="font-display text-2xl font-semibold mb-3"
                    style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                    Tentang Proyek
                </h2>
                <div class="w-10 h-0.5 mb-6" style="background-color: #B85C4A;"></div>

                @if($portfolio->description)
                <div class="prose prose-sm max-w-none text-gray-600 leading-relaxed">
                    {!! nl2br(e($portfolio->description)) !!}
                </div>
                @else
                <p class="text-gray-400 italic">Deskripsi proyek tidak tersedia.</p>
                @endif

                {{-- Gallery --}}
                @if($portfolio->images->count())
                <div class="mt-12">
                    <h3 class="font-display text-xl font-semibold mb-2"
                        style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
                        Galeri Foto
                    </h3>
                    <div class="w-8 h-0.5 mb-6" style="background-color: #B85C4A;"></div>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach($portfolio->images as $img)
                        <div class="group relative aspect-square rounded-lg overflow-hidden cursor-pointer"
                             onclick="openLightbox('{{ Storage::url($img->image) }}', '{{ $img->caption }}')"
                             style="background-color: #F8F5EF;">
                            <img src="{{ Storage::url($img->image) }}"
                                 alt="{{ $img->caption ?? $portfolio->title }}"
                                 class="w-full h-full object-cover transition-transform duration-400 group-hover:scale-110">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 flex items-center justify-center">
                                <i class="fas fa-expand-alt text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- CTA --}}
                <div class="mt-12 p-7 rounded-2xl" style="background-color: #F8F5EF; border: 1px solid #E2DDD6;">
                    <h3 class="font-semibold text-base mb-2" style="color: #3E372C;">Tertarik dengan Proyek Serupa?</h3>
                    <p class="text-sm text-gray-500 mb-4">Konsultasikan kebutuhan desain Anda dan dapatkan pre-layout concept gratis.</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('consultation.create') }}?category={{ $portfolio->category?->slug }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded text-sm font-semibold text-white transition-all duration-200 hover:opacity-90"
                           style="background-color: #B85C4A;">
                            <i class="fas fa-comment-dots"></i>
                            Konsultasi Proyek Serupa
                        </a>
                        <a href="{{ route('portfolio.index') }}"
                           class="inline-flex items-center gap-2 px-5 py-2.5 rounded text-sm font-semibold transition-all duration-200 hover:opacity-80"
                           style="background-color: #3E372C; color: white;">
                            <i class="fas fa-arrow-left text-xs"></i>
                            Kembali ke Portfolio
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right: Project Details Panel --}}
            <div>
                <div class="sticky top-24 rounded-2xl overflow-hidden" style="border: 1px solid #E2DDD6;">
                    {{-- Header --}}
                    <div class="p-5" style="background-color: #3E372C;">
                        <h3 class="font-semibold text-white text-sm tracking-wider uppercase">Detail Proyek</h3>
                    </div>

                    {{-- Details --}}
                    <div class="divide-y" style="divide-color: #F0EDEA; background: white;">
                        @foreach([
                            ['fas fa-tag',          'Kategori',     $portfolio->category?->name],
                            ['fas fa-tools',        'Jenis Proyek', $portfolio->project_type],
                            ['fas fa-door-open',    'Jenis Ruangan',$portfolio->room_type],
                            ['fas fa-paint-brush',  'Design Style', $portfolio->design_style],
                            ['fas fa-map-marker',   'Lokasi',       $portfolio->location],
                            ['fas fa-user',         'Klien',        $portfolio->client_name],
                            ['fas fa-calendar',     'Tahun',        $portfolio->year],
                        ] as [$icon, $label, $value])
                        @if($value)
                        <div class="flex items-start gap-3 px-5 py-3.5">
                            <div class="w-7 h-7 rounded flex items-center justify-center flex-shrink-0 mt-0.5"
                                 style="background-color: #FEF6F4;">
                                <i class="{{ $icon }} text-xs" style="color: #B85C4A;"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-[0.65rem] font-medium uppercase tracking-wider mb-0.5" style="color: #8A6F55;">{{ $label }}</div>
                                <div class="text-sm font-medium" style="color: #3E372C;">{{ $value }}</div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                    {{-- WhatsApp CTA --}}
                    <div class="p-4" style="background-color: #F8F5EF; border-top: 1px solid #E2DDD6;">
                        <a href="https://wa.me/6282213641995?text=Halo%2C%20saya%20tertarik%20dengan%20proyek%20{{ urlencode($portfolio->title) }}%20di%20Pratama%20Design%20Studio."
                           target="_blank"
                           class="flex items-center justify-center gap-2 w-full py-3 rounded-lg text-sm font-semibold text-white transition-opacity hover:opacity-90"
                           style="background-color: #25D366;">
                            <i class="fab fa-whatsapp text-lg"></i>
                            Chat WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- RELATED PORTFOLIOS                                            --}}
{{-- ============================================================ --}}
@if($related->count())
<section class="py-16" style="background-color: #F8F5EF; border-top: 1px solid #E2DDD6;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-2xl font-semibold mb-8"
            style="font-family: 'Cormorant Garamond', serif; color: #3E372C;">
            Proyek Serupa
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($related as $rel)
            <x-portfolio-card :portfolio="$rel" />
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Lightbox Modal --}}
<div id="lightbox" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 opacity-0 pointer-events-none transition-opacity duration-300"
     onclick="closeLightbox()">
    <div class="relative max-w-5xl max-h-[90vh] mx-4" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[80vh] rounded-lg object-contain">
        <p id="lightbox-caption" class="text-white/70 text-sm text-center mt-3"></p>
        <button onclick="closeLightbox()" class="absolute -top-10 right-0 text-white/70 hover:text-white text-2xl">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

@endsection

@section('scripts')
<script>
function openLightbox(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = caption || '';
    const lb = document.getElementById('lightbox');
    lb.style.opacity = '1';
    lb.style.pointerEvents = 'auto';
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lb = document.getElementById('lightbox');
    lb.style.opacity = '0';
    lb.style.pointerEvents = 'none';
    document.body.style.overflow = '';
}

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeLightbox();
});
</script>
@endsection
