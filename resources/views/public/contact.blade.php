@extends('layouts.app')

@section('title', 'Contact')
@section('meta_description', 'Hubungi Pratama Design Studio. WhatsApp +6282213641995, email pratamadsb@gmail.com, Instagram @pratamaid.studio. Jakarta, Indonesia.')

@section('content')

<x-subpage-hero
    title="Contact Us"
    eyebrow="Hubungi Kami"
    description="Ada pertanyaan atau ingin mendiskusikan proyek Anda? Kami siap membantu. Hubungi kami melalui saluran yang paling nyaman untuk Anda."
    :breadcrumbs="['Contact' => '']"
    image-keyword="office"
/>

{{-- ============================================================ --}}
{{-- CONTACT INFO CARDS                                            --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20" style="background-color: var(--paper);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">

            {{-- WhatsApp --}}
            <a href="https://wa.me/6282213641995?text=Halo%20Pratama%20Design%20Studio%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20desain%20interior."
               target="_blank" rel="noopener noreferrer"
               class="group flex flex-col items-center text-center p-8 rounded-2xl transition-all duration-300 hover:-translate-y-1 fade-up border"
               style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);"
               onmouseover="this.style.boxShadow='0 12px 32px rgba(37,211,102,0.15)'; this.style.borderColor='#25D366';"
               onmouseout="this.style.boxShadow='var(--card-shadow)'; this.style.borderColor='var(--card-border)';">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-4 transition-transform duration-200 group-hover:scale-110"
                     style="background-color: rgba(37,211,102,0.12); border: 1px solid rgba(37,211,102,0.25);">
                    <i class="fab fa-whatsapp text-3xl" style="color: #25D366;"></i>
                </div>
                <div class="text-xs font-semibold tracking-wider uppercase mb-1.5" style="color: var(--muted);">WhatsApp (Utama)</div>
                <div class="font-semibold text-lg mb-1" style="font-family: var(--serif); font-size: 1.25rem; color: var(--text-heading);">+62 822 1364 1995</div>
                <div class="text-xs mb-4" style="color: var(--muted);">Respon cepat · Setiap hari</div>
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-4 py-2 rounded-full text-white transition-all duration-200 shadow-sm"
                      style="background-color: #25D366;">
                    <i class="fab fa-whatsapp"></i>
                    Chat Sekarang
                </span>
            </a>

            {{-- Email --}}
            <a href="mailto:pratamadsb@gmail.com"
               class="group flex flex-col items-center text-center p-8 rounded-2xl transition-all duration-300 hover:-translate-y-1 fade-up border"
               style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);"
               onmouseover="this.style.boxShadow='0 12px 32px rgba(181,91,72,0.15)'; this.style.borderColor='var(--accent)';"
               onmouseout="this.style.boxShadow='var(--card-shadow)'; this.style.borderColor='var(--card-border)';">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-4 transition-transform duration-200 group-hover:scale-110"
                     style="background-color: rgba(181,91,72,0.12); border: 1px solid rgba(181,91,72,0.25);">
                    <i class="fas fa-envelope text-3xl" style="color: var(--accent);"></i>
                </div>
                <div class="text-xs font-semibold tracking-wider uppercase mb-1.5" style="color: var(--muted);">Email</div>
                <div class="font-semibold text-base mb-1" style="font-family: var(--serif); font-size: 1.25rem; color: var(--text-heading);">pratamadsb@gmail.com</div>
                <div class="text-xs mb-4" style="color: var(--muted);">Respon dalam 1×24 jam</div>
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-4 py-2 rounded-full text-white transition-all duration-200 shadow-sm"
                      style="background-color: var(--accent);">
                    <i class="fas fa-envelope"></i>
                    Kirim Email
                </span>
            </a>

            {{-- Instagram --}}
            <a href="https://instagram.com/pratamaid.studio" target="_blank" rel="noopener noreferrer"
               class="group flex flex-col items-center text-center p-8 rounded-2xl transition-all duration-300 hover:-translate-y-1 fade-up border"
               style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);"
               onmouseover="this.style.boxShadow='0 12px 32px rgba(225,48,108,0.15)'; this.style.borderColor='#E1306C';"
               onmouseout="this.style.boxShadow='var(--card-shadow)'; this.style.borderColor='var(--card-border)';">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-4 transition-transform duration-200 group-hover:scale-110"
                     style="background-color: rgba(225,48,108,0.12); border: 1px solid rgba(225,48,108,0.25);">
                    <i class="fab fa-instagram text-3xl" style="color: #E1306C;"></i>
                </div>
                <div class="text-xs font-semibold tracking-wider uppercase mb-1.5" style="color: var(--muted);">Instagram</div>
                <div class="font-semibold text-lg mb-1" style="font-family: var(--serif); font-size: 1.25rem; color: var(--text-heading);">@pratamaid.studio</div>
                <div class="text-xs mb-4" style="color: var(--muted);">Lihat portofolio terbaru</div>
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-4 py-2 rounded-full text-white transition-all duration-200 shadow-sm"
                      style="background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);">
                    <i class="fab fa-instagram"></i>
                    Follow Kami
                </span>
            </a>
        </div>

        {{-- Additional Info --}}
        <div class="grid md:grid-cols-2 gap-6">

            {{-- Address --}}
            <div class="flex items-start gap-5 p-7 rounded-2xl fade-up border"
                 style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background-color: var(--brown-deep);">
                    <i class="fas fa-map-marker-alt text-lg text-white"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-base mb-1.5" style="font-family: var(--serif); font-size: 1.2rem; color: var(--text-heading);">Alamat Kantor</h3>
                    <p class="text-sm leading-relaxed" style="color: var(--text-lead);">
                        Puri Orchard Apartment<br>
                        Orange Grove Tower 21/09<br>
                        Jakarta, Indonesia
                    </p>
                    <div class="mt-3 text-xs" style="color: var(--muted);">
                        <i class="fas fa-info-circle mr-1" style="color: var(--accent);"></i>
                        Kunjungan sebaiknya dengan janji terlebih dahulu
                    </div>
                </div>
            </div>

            {{-- Website & Hours --}}
            <div class="flex items-start gap-5 p-7 rounded-2xl fade-up border"
                 style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background-color: var(--brown-deep);">
                    <i class="fas fa-globe text-lg text-white"></i>
                </div>
                <div class="flex-1">
                    <h3 class="font-semibold text-base mb-1.5" style="font-family: var(--serif); font-size: 1.2rem; color: var(--text-heading);">Website Resmi</h3>
                    <a href="https://pratamadesign.com" target="_blank" rel="noopener noreferrer"
                       class="text-sm font-medium transition-colors hover:underline"
                       style="color: var(--accent);">
                        pratamadesign.com
                    </a>
                    <p class="text-xs mt-1.5" style="color: var(--muted);">Kunjungi website resmi kami untuk informasi terlengkap</p>

                    {{-- Operational hours --}}
                    <div class="mt-4 pt-4 border-t" style="border-color: var(--line);">
                        <h4 class="text-xs font-semibold uppercase tracking-wider mb-2" style="color: var(--muted);">Jam Operasional</h4>
                        <div class="space-y-1 text-xs" style="color: var(--text-lead);">
                            <div class="flex justify-between">
                                <span>Senin — Sabtu</span>
                                <span class="font-medium" style="color: var(--text-heading);">08:30 — 17:30 WIB</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Minggu / Hari Libur</span>
                                <span class="font-medium" style="color: var(--muted);">Hanya via WhatsApp</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- QUICK INQUIRY / CTA                                           --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20" style="background-color: var(--brown-deep); color: #fbfaf7;">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <div class="fade-up">
                <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: var(--accent);">Mulai Proyek</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-white mb-4"
                    style="font-family: var(--serif);">
                    Siap Berdiskusi tentang Proyek Anda?
                </h2>
                <p class="text-sm leading-relaxed mb-6" style="color: rgba(255,255,255,0.7);">
                    Isi form konsultasi kami untuk mendapatkan respons lebih cepat. Tim kami akan menghubungi Anda dalam 1×24 jam untuk mendiskusikan kebutuhan desain Anda.
                </p>

                <div class="space-y-3">
                    @foreach([
                        ['fas fa-check', 'Konsultasi awal gratis, tanpa komitmen'],
                        ['fas fa-check', 'Pre-layout concept gratis sebelum agreement'],
                        ['fas fa-check', 'Tim berpengalaman multi-segmen'],
                        ['fas fa-check', 'Transparansi anggaran & timeline'],
                    ] as [$icon, $text])
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0"
                             style="background-color: rgba(181,91,72,0.35);">
                            <i class="{{ $icon }} text-[0.5rem]" style="color: #f7a696;"></i>
                        </div>
                        <span class="text-sm" style="color: rgba(255,255,255,0.8);">{{ $text }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="fade-up rounded-2xl p-7 border" style="background-color: var(--card-bg); border-color: var(--card-border); box-shadow: var(--card-shadow);">
                <h3 class="font-semibold text-base mb-5" style="font-family: var(--serif); font-size: 1.25rem; color: var(--text-heading);">Hubungi Kami Langsung</h3>

                <div class="space-y-3">
                    <a href="https://wa.me/6282213641995?text=Halo%20Pratama%20Design%20Studio%2C%20saya%20ingin%20konsultasi%20desain%20interior."
                       target="_blank" rel="noopener noreferrer"
                       class="flex items-center gap-4 p-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5 group border"
                       style="background-color: rgba(37,211,102,0.08); border-color: rgba(37,211,102,0.25);">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 shadow-sm"
                             style="background-color: #25D366;">
                            <i class="fab fa-whatsapp text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-xs font-medium text-green-600 mb-0.5">WhatsApp</div>
                            <div class="text-sm font-semibold" style="color: var(--text-heading);">+62 822 1364 1995</div>
                        </div>
                        <i class="fas fa-arrow-right text-xs text-green-500 transition-transform duration-200 group-hover:translate-x-1"></i>
                    </a>

                    <a href="{{ route('consultation.create') }}"
                       class="consult-button trigger-contact-modal flex items-center gap-4 p-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5 group border"
                       style="background-color: rgba(181,91,72,0.08); border-color: rgba(181,91,72,0.25);">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 shadow-sm"
                             style="background-color: var(--accent);">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-xs font-medium mb-0.5" style="color: var(--accent);">Form Konsultasi</div>
                            <div class="text-sm font-semibold" style="color: var(--text-heading);">Isi Form Detail Proyek</div>
                        </div>
                        <i class="fas fa-arrow-right text-xs transition-transform duration-200 group-hover:translate-x-1" style="color: var(--accent);"></i>
                    </a>

                    <a href="mailto:pratamadsb@gmail.com"
                       class="flex items-center gap-4 p-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5 group border"
                       style="background-color: var(--paper); border-color: var(--line);">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 shadow-sm"
                             style="background-color: var(--brown-deep);">
                            <i class="fas fa-envelope text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-xs font-medium mb-0.5" style="color: var(--muted);">Email</div>
                            <div class="text-sm font-semibold" style="color: var(--text-heading);">pratamadsb@gmail.com</div>
                        </div>
                        <i class="fas fa-arrow-right text-xs transition-transform duration-200 group-hover:translate-x-1" style="color: var(--muted);"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
