@extends('layouts.app')

@section('title', 'Contact')
@section('meta_description', 'Hubungi Pratama Design Studio. WhatsApp +6282213641995, email pratamadsb@gmail.com, Instagram @pratamaid.studio. Jakarta, Indonesia.')

@section('content')

{{-- Page Hero --}}
<section class="relative py-20 lg:py-28" style="background-color: #2A2219;">
    <div class="absolute inset-0 opacity-[0.04]"
         style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\' fill-rule=\'evenodd\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-sm mb-4" style="color: rgba(255,255,255,0.45);">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <i class="fas fa-chevron-right text-[0.6rem]"></i>
            <span style="color: #B85C4A;">Contact</span>
        </div>
        <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Hubungi Kami</p>
        <h1 class="font-display text-4xl lg:text-6xl font-semibold text-white leading-tight"
            style="font-family: 'Cormorant Garamond', serif;">
            Contact Us
        </h1>
        <p class="mt-4 text-base max-w-xl leading-relaxed" style="color: rgba(255,255,255,0.6);">
            Ada pertanyaan atau ingin mendiskusikan proyek Anda? Kami siap membantu. Hubungi kami melalui saluran yang paling nyaman untuk Anda.
        </p>
    </div>
</section>

{{-- ============================================================ --}}
{{-- CONTACT INFO CARDS                                            --}}
{{-- ============================================================ --}}
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">

            {{-- WhatsApp --}}
            <a href="https://wa.me/6282213641995?text=Halo%20Pratama%20Design%20Studio%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20desain%20interior."
               target="_blank"
               class="group flex flex-col items-center text-center p-8 rounded-2xl transition-all duration-300 hover:-translate-y-1 fade-up"
               style="border: 1px solid #E2DDD6; box-shadow: 0 2px 8px rgba(0,0,0,0.04);"
               onmouseover="this.style.boxShadow='0 12px 32px rgba(37,211,102,0.15)'; this.style.borderColor='#25D366';"
               onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'; this.style.borderColor='#E2DDD6';">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-4 transition-transform duration-200 group-hover:scale-110"
                     style="background-color: #F0FFF4;">
                    <i class="fab fa-whatsapp text-3xl" style="color: #25D366;"></i>
                </div>
                <div class="text-xs font-semibold tracking-wider uppercase mb-1.5" style="color: #8A6F55;">WhatsApp (Utama)</div>
                <div class="font-semibold text-lg mb-1" style="color: #3E372C;">+62 822 1364 1995</div>
                <div class="text-xs text-gray-400 mb-4">Respon cepat · Setiap hari</div>
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-4 py-2 rounded-full text-white transition-all duration-200"
                      style="background-color: #25D366;">
                    <i class="fab fa-whatsapp"></i>
                    Chat Sekarang
                </span>
            </a>

            {{-- Email --}}
            <a href="mailto:pratamadsb@gmail.com"
               class="group flex flex-col items-center text-center p-8 rounded-2xl transition-all duration-300 hover:-translate-y-1 fade-up"
               style="border: 1px solid #E2DDD6; box-shadow: 0 2px 8px rgba(0,0,0,0.04);"
               onmouseover="this.style.boxShadow='0 12px 32px rgba(184,92,74,0.12)'; this.style.borderColor='#B85C4A';"
               onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'; this.style.borderColor='#E2DDD6';">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-4 transition-transform duration-200 group-hover:scale-110"
                     style="background-color: #FEF6F4;">
                    <i class="fas fa-envelope text-3xl" style="color: #B85C4A;"></i>
                </div>
                <div class="text-xs font-semibold tracking-wider uppercase mb-1.5" style="color: #8A6F55;">Email</div>
                <div class="font-semibold text-base mb-1" style="color: #3E372C;">pratamadsb@gmail.com</div>
                <div class="text-xs text-gray-400 mb-4">Respon dalam 1×24 jam</div>
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-4 py-2 rounded-full text-white transition-all duration-200"
                      style="background-color: #B85C4A;">
                    <i class="fas fa-envelope"></i>
                    Kirim Email
                </span>
            </a>

            {{-- Instagram --}}
            <a href="https://instagram.com/pratamaid.studio" target="_blank"
               class="group flex flex-col items-center text-center p-8 rounded-2xl transition-all duration-300 hover:-translate-y-1 fade-up"
               style="border: 1px solid #E2DDD6; box-shadow: 0 2px 8px rgba(0,0,0,0.04);"
               onmouseover="this.style.boxShadow='0 12px 32px rgba(225,48,108,0.12)'; this.style.borderColor='#E1306C';"
               onmouseout="this.style.boxShadow='0 2px 8px rgba(0,0,0,0.04)'; this.style.borderColor='#E2DDD6';">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-4 transition-transform duration-200 group-hover:scale-110"
                     style="background: linear-gradient(135deg, #FEF6F4 0%, #FFF0F7 100%);">
                    <i class="fab fa-instagram text-3xl" style="color: #E1306C;"></i>
                </div>
                <div class="text-xs font-semibold tracking-wider uppercase mb-1.5" style="color: #8A6F55;">Instagram</div>
                <div class="font-semibold text-lg mb-1" style="color: #3E372C;">@pratamaid.studio</div>
                <div class="text-xs text-gray-400 mb-4">Lihat portofolio terbaru</div>
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-4 py-2 rounded-full text-white transition-all duration-200"
                      style="background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);">
                    <i class="fab fa-instagram"></i>
                    Follow Kami
                </span>
            </a>
        </div>

        {{-- Additional Info --}}
        <div class="grid md:grid-cols-2 gap-6">

            {{-- Address --}}
            <div class="flex items-start gap-5 p-7 rounded-2xl fade-up"
                 style="background-color: #F8F5EF; border: 1px solid #E2DDD6;">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background-color: #3E372C;">
                    <i class="fas fa-map-marker-alt text-lg text-white"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-base mb-1.5" style="color: #3E372C;">Alamat Kantor</h3>
                    <p class="text-sm leading-relaxed text-gray-600">
                        Puri Orchard Apartment<br>
                        Orange Grove Tower 21/09<br>
                        Jakarta, Indonesia
                    </p>
                    <div class="mt-3 text-xs text-gray-400">
                        <i class="fas fa-info-circle mr-1" style="color: #B85C4A;"></i>
                        Kunjungan sebaiknya dengan janji terlebih dahulu
                    </div>
                </div>
            </div>

            {{-- Website --}}
            <div class="flex items-start gap-5 p-7 rounded-2xl fade-up"
                 style="background-color: #F8F5EF; border: 1px solid #E2DDD6;">
                <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0"
                     style="background-color: #3E372C;">
                    <i class="fas fa-globe text-lg text-white"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-base mb-1.5" style="color: #3E372C;">Website Resmi</h3>
                    <a href="https://pratamadesign.com" target="_blank"
                       class="text-sm font-medium transition-colors hover:underline"
                       style="color: #B85C4A;">
                        pratamadesign.com
                    </a>
                    <p class="text-xs text-gray-400 mt-1.5">Kunjungi website resmi kami untuk informasi terlengkap</p>

                    {{-- Operational hours --}}
                    <div class="mt-4 pt-4" style="border-top: 1px solid #E2DDD6;">
                        <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Jam Operasional</h4>
                        <div class="space-y-1 text-xs text-gray-600">
                            <div class="flex justify-between">
                                <span>Senin — Sabtu</span>
                                <span class="font-medium" style="color: #3E372C;">09.00 — 18.00 WIB</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Minggu / Hari Libur</span>
                                <span class="font-medium text-gray-400">Hanya via WhatsApp</span>
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
<section class="py-16 lg:py-20" style="background-color: #3E372C;">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <div class="fade-up">
                <p class="text-xs font-semibold tracking-[0.18em] uppercase mb-3" style="color: #B85C4A;">Mulai Proyek</p>
                <h2 class="font-display text-3xl lg:text-4xl font-semibold text-white mb-4"
                    style="font-family: 'Cormorant Garamond', serif;">
                    Siap Berdiskusi tentang Proyek Anda?
                </h2>
                <p class="text-sm leading-relaxed mb-6" style="color: rgba(255,255,255,0.6);">
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
                             style="background-color: rgba(184,92,74,0.25);">
                            <i class="{{ $icon }} text-[0.5rem]" style="color: #B85C4A;"></i>
                        </div>
                        <span class="text-sm" style="color: rgba(255,255,255,0.7);">{{ $text }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="fade-up bg-white rounded-2xl p-7" style="border: 1px solid rgba(255,255,255,0.1);">
                <h3 class="font-semibold text-base mb-5" style="color: #3E372C;">Hubungi Kami Langsung</h3>

                <div class="space-y-3">
                    <a href="https://wa.me/6282213641995?text=Halo%20Pratama%20Design%20Studio%2C%20saya%20ingin%20konsultasi%20desain%20interior."
                       target="_blank"
                       class="flex items-center gap-4 p-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5 group"
                       style="background-color: #F0FFF4; border: 1px solid #A7F3D0;">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0"
                             style="background-color: #25D366;">
                            <i class="fab fa-whatsapp text-white text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-xs font-medium text-green-600 mb-0.5">WhatsApp</div>
                            <div class="text-sm font-semibold text-green-800">+62 822 1364 1995</div>
                        </div>
                        <i class="fas fa-arrow-right text-xs text-green-400 transition-transform duration-200 group-hover:translate-x-1"></i>
                    </a>

                    <a href="{{ route('consultation.create') }}"
                       class="flex items-center gap-4 p-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5 group"
                       style="background-color: #FEF6F4; border: 1px solid #FDDDD8;">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0"
                             style="background-color: #B85C4A;">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-xs font-medium mb-0.5" style="color: #8A4A3A;">Form Konsultasi</div>
                            <div class="text-sm font-semibold" style="color: #5A2A1A;">Isi Form Detail Proyek</div>
                        </div>
                        <i class="fas fa-arrow-right text-xs transition-transform duration-200 group-hover:translate-x-1" style="color: #B85C4A;"></i>
                    </a>

                    <a href="mailto:pratamadsb@gmail.com"
                       class="flex items-center gap-4 p-4 rounded-xl transition-all duration-200 hover:-translate-y-0.5 group"
                       style="background-color: #F8F5EF; border: 1px solid #E2DDD6;">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0"
                             style="background-color: #3E372C;">
                            <i class="fas fa-envelope text-white text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <div class="text-xs font-medium text-gray-400 mb-0.5">Email</div>
                            <div class="text-sm font-semibold" style="color: #3E372C;">pratamadsb@gmail.com</div>
                        </div>
                        <i class="fas fa-arrow-right text-xs text-gray-400 transition-transform duration-200 group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
