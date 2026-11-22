@extends('layouts.app')

@section('title', 'Karya & Portofolio Desain Interior')
@section('meta_description', 'Galeri portofolio proyek Pratama Design Studio: Rumah Tinggal (Landed House), Apartemen, Kafe & Restoran (F&B), Booth Pameran, dan Kantor di Jakarta & Semarang.')

@section('content')

<x-subpage-hero
    title="Karya &amp; Portofolio"
    eyebrow="Portfolio Architecture &amp; Interior"
    description="Setiap proyek adalah wujud kolaborasi harmonis antara fungsi ruang yang presisi dan estetika interior hangat. Jelajahi karya rancang bangun terbaik kami."
    :breadcrumbs="['Portfolio' => '']"
    image-keyword="landed"
/>

{{-- ============================================================ --}}
{{-- FILTER + PORTFOLIO GALLERY (Grid & Masonry Modes)             --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-24" style="background-color: var(--paper);" x-data="portfolioGallery()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Filter & View Switcher Bar --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-5 mb-10 pb-6 border-b fade-up" style="border-color: var(--line);">
            {{-- Category Filter Pills --}}
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('portfolio.index') }}"
                   class="inline-flex items-center px-4 py-2 rounded-xl text-xs font-semibold uppercase tracking-wider transition-all duration-200 shadow-sm"
                   style="{{ $activeCategory === 'all' ? 'background-color: var(--accent); color: white;' : 'background-color: var(--card-bg); color: var(--text-lead); border: 1px solid var(--card-border);' }}">
                    <i class="fas fa-th-large mr-1.5 text-[10px]"></i>
                    Semua Karya
                </a>
                @foreach($categories as $category)
                <a href="{{ route('portfolio.index', ['category' => $category->slug]) }}"
                   class="inline-flex items-center px-4 py-2 rounded-xl text-xs font-semibold uppercase tracking-wider transition-all duration-200 shadow-sm hover:scale-[1.02]"
                   style="{{ $activeCategory === $category->slug ? 'background-color: var(--accent); color: white;' : 'background-color: var(--card-bg); color: var(--text-lead); border: 1px solid var(--card-border);' }}">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>

            {{-- Right View Controls & Count --}}
            <div class="flex items-center justify-between md:justify-end gap-4 shrink-0">
                <span class="text-xs" style="color: var(--muted);">
                    Menampilkan <strong style="color: var(--text-heading);">{{ $portfolios->total() }}</strong> proyek
                </span>

                {{-- View Mode Toggle --}}
                <div class="inline-flex p-1 rounded-xl border shadow-xs" style="background-color: var(--card-bg); border-color: var(--card-border);">
                    <button type="button" @click="viewMode = 'grid'"
                            :class="viewMode === 'grid' ? 'text-white' : 'text-[var(--muted)] hover:text-[var(--text-heading)]'"
                            :style="viewMode === 'grid' ? 'background-color: var(--accent);' : ''"
                            class="px-2.5 py-1.5 rounded-lg text-xs font-medium transition-all flex items-center gap-1.5"
                            title="Tampilan Kartu">
                        <i class="fas fa-th text-xs"></i>
                        <span class="hidden sm:inline text-[11px]">Kartu</span>
                    </button>
                    <button type="button" @click="viewMode = 'gallery'"
                            :class="viewMode === 'gallery' ? 'text-white' : 'text-[var(--muted)] hover:text-[var(--text-heading)]'"
                            :style="viewMode === 'gallery' ? 'background-color: var(--accent);' : ''"
                            class="px-2.5 py-1.5 rounded-lg text-xs font-medium transition-all flex items-center gap-1.5"
                            title="Tampilan Galeri Visual">
                        <i class="fas fa-border-all text-xs"></i>
                        <span class="hidden sm:inline text-[11px]">Galeri</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Active Filter Breadcrumb if not 'all' --}}
        @if($activeCategory !== 'all')
        <div class="mb-8 flex items-center gap-2 text-xs fade-up" style="color: var(--muted);">
            <span>Kategori aktif:</span>
            <span class="font-semibold px-2.5 py-1 rounded-md text-white" style="background-color: var(--accent);">
                {{ $categories->firstWhere('slug', $activeCategory)?->name }}
            </span>
            <a href="{{ route('portfolio.index') }}" class="ml-2 hover:underline flex items-center gap-1" style="color: var(--accent);">
                <i class="fas fa-times text-[10px]"></i> Reset Filter
            </a>
        </div>
        @endif

        {{-- Portfolio Content --}}
        @if($portfolios->count())
            {{-- VIEW 1: Grid Cards View --}}
            <div x-show="viewMode === 'grid'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
                @foreach($portfolios as $portfolio)
                <div class="fade-up">
                    <x-portfolio-card :portfolio="$portfolio" />
                </div>
                @endforeach
            </div>

            {{-- VIEW 2: Visual Masonry Photo Showcase --}}
            <div x-show="viewMode === 'gallery'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($portfolios as $portfolio)
                @php
                    $pImg = $portfolio->image_url;
                    $pCat = $portfolio->category->name ?? 'Interior';
                @endphp
                <div class="group relative rounded-xl overflow-hidden aspect-[4/3] cursor-pointer shadow-sm border transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
                     style="background-color: #24211d; border-color: var(--card-border);"
                     @click="openLightbox({
                        title: '{{ addslashes($portfolio->title) }}',
                        category: '{{ addslashes($pCat) }}',
                        image: '{{ $pImg }}',
                        location: '{{ addslashes($portfolio->location ?? 'Jakarta') }}',
                        year: '{{ $portfolio->year ?? '2023' }}',
                        project_type: '{{ addslashes($portfolio->project_type ?? '') }}',
                        room_type: '{{ addslashes($portfolio->room_type ?? '') }}',
                        design_style: '{{ addslashes($portfolio->design_style ?? '') }}',
                        url: '{{ route('portfolio.show', $portfolio->slug) }}'
                     })">
                    <img src="{{ $pImg }}"
                         alt="{{ $portfolio->title }}"
                         loading="lazy"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                    {{-- Hover Caption Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-between p-3.5">
                        <div class="flex justify-end">
                            <span class="w-7 h-7 rounded-full bg-white/20 backdrop-blur-md text-white flex items-center justify-center text-xs">
                                <i class="fas fa-search-plus"></i>
                            </span>
                        </div>
                        <div>
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-amber-300">{{ $pCat }}</span>
                            <h4 class="font-display text-white text-sm font-semibold truncate">{{ $portfolio->title }}</h4>
                            <p class="text-[11px] text-white/70 truncate">{{ $portfolio->project_type }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($portfolios->hasPages())
            <div class="mt-14 fade-up">
                {{ $portfolios->links() }}
            </div>
            @endif

        @else
            {{-- Empty State --}}
            <div class="text-center py-20 rounded-3xl border" style="background-color: var(--card-bg); border-color: var(--card-border);">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 border"
                     style="background-color: var(--paper); border-color: var(--card-border);">
                    <i class="fas fa-images text-2xl" style="color: var(--muted);"></i>
                </div>
                <h3 class="font-display font-semibold text-2xl mb-2" style="color: var(--text-heading);">Belum Ada Portofolio</h3>
                <p class="text-sm mb-6 max-w-md mx-auto" style="color: var(--text-lead);">Kategori ini belum memiliki proyek terbit atau sedang dalam tahap penyusunan dokumentasi foto.</p>
                <a href="{{ route('portfolio.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-xs font-semibold uppercase tracking-wider text-white shadow-md transition-all hover:scale-105"
                   style="background-color: var(--accent);">
                    <i class="fas fa-arrow-left text-xs"></i>
                    Lihat Seluruh Portofolio
                </a>
            </div>
        @endif
    </div>

    {{-- ============================================================ --}}
    {{-- INTERACTIVE LIGHTBOX MODAL COMPONENT                         --}}
    {{-- ============================================================ --}}
    <div x-show="lightboxOpen"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="closeLightbox()"
         class="fixed inset-0 z-[120] flex items-center justify-center p-4 sm:p-6 bg-black/95 backdrop-blur-md"
         style="touch-action: none;">

        {{-- Backdrop Click Area --}}
        <div class="absolute inset-0" @click="closeLightbox()"></div>

        {{-- Modal Container --}}
        <div class="relative z-10 w-full max-w-5xl max-h-[92vh] flex flex-col rounded-2xl overflow-hidden border border-white/10 shadow-2xl bg-[#1a1816]"
             @click.stop>

            {{-- Modal Header --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-white/10 bg-[#24211d]">
                <div class="flex items-center gap-3 min-w-0">
                    <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold uppercase tracking-wider text-white bg-[#b55b48]"
                          x-text="activeProject.category || 'Portfolio'"></span>
                    <h3 class="font-display text-white text-lg font-semibold truncate" x-text="activeProject.title"></h3>
                </div>
                <button type="button" @click="closeLightbox()"
                        class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white/80 hover:text-white flex items-center justify-center transition-colors">
                    <i class="fas fa-times text-base"></i>
                </button>
            </div>

            {{-- Main Image Preview Area --}}
            <div class="relative flex-1 min-h-[300px] max-h-[65vh] bg-[#12100e] flex items-center justify-center p-2 sm:p-4 overflow-hidden">
                <img :src="activeProject.image"
                     :alt="activeProject.title"
                     class="max-w-full max-h-[62vh] object-contain rounded-lg shadow-2xl transition-transform duration-300">
            </div>

            {{-- Modal Footer with Specs & Direct Consultation Actions --}}
            <div class="px-6 py-4 bg-[#24211d] border-t border-white/10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-white/70">
                    <span x-show="activeProject.location" class="flex items-center gap-1.5">
                        <i class="fas fa-map-marker-alt text-[#b55b48]"></i>
                        <span x-text="activeProject.location"></span>
                    </span>
                    <span x-show="activeProject.project_type" class="flex items-center gap-1.5">
                        <i class="fas fa-layer-group text-amber-400"></i>
                        <span x-text="activeProject.project_type"></span>
                    </span>
                    <span x-show="activeProject.design_style" class="flex items-center gap-1.5">
                        <i class="fas fa-paint-brush text-rose-300"></i>
                        <span x-text="activeProject.design_style"></span>
                    </span>
                    <span x-show="activeProject.year" class="flex items-center gap-1.5">
                        <i class="fas fa-calendar text-white/50"></i>
                        <span x-text="activeProject.year"></span>
                    </span>
                </div>

                <div class="flex items-center gap-2.5 shrink-0">
                    {{-- WhatsApp Direct Inquiry Button --}}
                    <a :href="'https://wa.me/6282213641995?text=Halo%20Pratama%20Design%20Studio%2C%20saya%20tertarik%20dengan%20proyek%20' + encodeURIComponent(activeProject.title || 'Portfolio') + '%20dan%20ingin%20konsultasi%20desain.'"
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-xs font-semibold text-white transition-transform hover:scale-105 shadow-md"
                       style="background-color: #25D366;">
                        <i class="fab fa-whatsapp text-sm"></i>
                        <span>Tanya Proyek Ini</span>
                    </a>

                    {{-- Full Detail Page Link --}}
                    <a :href="activeProject.url"
                       class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-xs font-semibold text-white transition-all hover:bg-white/15 border border-white/20 bg-white/10">
                        <span>Detail Lengkap</span>
                        <i class="fas fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Consultation CTA Section --}}
<section class="py-16 border-t" style="background-color: var(--card-bg); border-color: var(--card-border);">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
        <span class="text-xs font-semibold uppercase tracking-[0.2em] mb-2 block" style="color: var(--accent);">Mulai Kolaborasi</span>
        <h2 class="font-display text-3xl sm:text-4xl font-semibold mb-3" style="color: var(--text-heading);">
            Tertarik Mewujudkan Ruang Serupa?
        </h2>
        <p class="text-sm mb-6 max-w-lg mx-auto leading-relaxed" style="color: var(--text-lead);">
            Konsultasikan kebutuhan desain interior Anda bersama desainer Pratama. Dapatkan free pre-layout concept sebelum memulai agreement proyek.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('consultation.create') }}"
               class="consult-button trigger-contact-modal inline-flex items-center gap-2 px-7 py-3.5 rounded-xl text-xs font-semibold uppercase tracking-wider text-white transition-all duration-200 hover:scale-105 shadow-md"
               style="background-color: var(--accent);">
                <i class="fas fa-comment-dots text-sm"></i>
                Konsultasi Proyek Baru
            </a>
            <a href="{{ route('ai-estimator.index') }}"
               class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl text-xs font-semibold uppercase tracking-wider transition-all duration-200 hover:bg-black/5 dark:hover:bg-white/5 border"
               style="border-color: var(--line); color: var(--text-heading);">
                <i class="fas fa-magic" style="color: var(--accent);"></i>
                Hitung RAB via AI
            </a>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
function portfolioGallery() {
    return {
        viewMode: 'grid',
        lightboxOpen: false,
        activeProject: {},
        init() {
            // Global hook so portfolio card component triggers this lightbox seamlessly
            window.openPortfolioLightbox = (project) => {
                this.openLightbox(project);
            };
        },
        openLightbox(project) {
            this.activeProject = project;
            this.lightboxOpen = true;
            document.body.style.overflow = 'hidden';
        },
        closeLightbox() {
            this.lightboxOpen = false;
            document.body.style.overflow = '';
        }
    }
}
</script>
@endsection
