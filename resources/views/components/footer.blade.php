{{-- Footer Component --}}

<footer style="background-color: #302c24; color: #c8c0b4;">

    {{-- Main Footer Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">

            {{-- Brand Column --}}
            <div class="lg:col-span-1">
                <div class="flex items-center gap-3.5 mb-5">
                    <div class="w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 shadow-sm"
                         style="background-color: #b55b48;">
                        <span class="text-white font-bold text-lg leading-none font-display tracking-widest">P</span>
                    </div>
                    <div>
                        <div class="font-semibold tracking-wide text-white leading-none"
                             style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 1.25rem;">
                            Pratama Design Studio
                        </div>
                        <div class="text-[9.5px] tracking-[0.22em] uppercase font-semibold mt-1" style="color: #d98d88;">
                            Interior Design & Build
                        </div>
                    </div>
                </div>

                <p class="text-sm leading-relaxed mb-6" style="color: #aba193;">
                    Interior & exterior design & build company based in Jakarta, Indonesia. Mewujudkan ruang yang estetis, fungsional, dan sesuai kebutuhan Anda.
                </p>

                {{-- Social Media --}}
                <div class="flex items-center gap-3">
                    <a href="https://instagram.com/pratamaid.studio" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110 hover:bg-[#b55b48]"
                       style="background-color: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.08);"
                       title="Instagram @pratamaid.studio">
                        <i class="fab fa-instagram text-sm text-white"></i>
                    </a>
                    <a href="https://wa.me/6282213641995" target="_blank" rel="noopener"
                       class="w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110 hover:bg-[#25D366]"
                       style="background-color: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.08);"
                       title="WhatsApp">
                        <i class="fab fa-whatsapp text-sm text-white"></i>
                    </a>
                    <a href="mailto:pratamadsb@gmail.com"
                       class="w-9 h-9 rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110 hover:bg-[#b55b48]"
                       style="background-color: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.08);"
                       title="Email">
                        <i class="fas fa-envelope text-sm text-white"></i>
                    </a>
                </div>
            </div>

            {{-- Navigation Links --}}
            <div>
                <h4 class="text-xs font-bold text-white mb-4 tracking-[0.2em] uppercase">Menu</h4>
                <ul class="space-y-2.5">
                    @foreach([
                        ['Home',           route('home')],
                        ['About Us',       route('about')],
                        ['Services',       route('services.index')],
                        ['Portfolio',      route('portfolio.index')],
                        ['Cost Estimator', route('estimator.index')],
                        ['Consultation',   route('consultation.create')],
                        ['Contact',        route('contact')],
                        ['Cari AI',        route('ai-portfolio.index')],
                        ['AI Estimator',   route('ai-estimator.index')],
                    ] as [$label, $href])
                    <li>
                        <a href="{{ $href }}"
                           class="text-sm transition-colors duration-200 hover:text-white flex items-center gap-2 group"
                           style="color: #aba193;">
                            <i class="fas fa-chevron-right text-[0.55rem] transition-transform duration-200 group-hover:translate-x-1"
                               style="color: #b55b48;"></i>
                            {{ $label }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Services --}}
            <div>
                <h4 class="text-xs font-bold text-white mb-4 tracking-[0.2em] uppercase">Services</h4>
                <ul class="space-y-2.5">
                    @foreach([
                        'Fit-Out Consultation',
                        'Project Plan & Schedule',
                        'Project Budgeting',
                        'Digital Rendering 3D',
                        'Production Process',
                        'Fit Out & Renovation',
                    ] as $service)
                    <li>
                        <span class="text-sm flex items-center gap-2" style="color: #aba193;">
                            <i class="fas fa-circle text-[0.3rem]" style="color: #b55b48;"></i>
                            {{ $service }}
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h4 class="text-xs font-bold text-white mb-4 tracking-[0.2em] uppercase">Hubungi Kami</h4>
                <ul class="space-y-3.5">
                    <li class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded flex items-center justify-center flex-shrink-0 mt-0.5"
                             style="background-color: rgba(255,255,255,0.06);">
                            <i class="fas fa-map-marker-alt text-xs" style="color: #d98d88;"></i>
                        </div>
                        <div>
                            <span class="text-[11px] font-semibold text-white uppercase tracking-wider block mb-0.5">Alamat</span>
                            <span class="text-sm leading-relaxed" style="color: #aba193;">
                                Puri Orchard Apt. Orange Grove 21/09, Jakarta
                            </span>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded flex items-center justify-center flex-shrink-0 mt-0.5"
                             style="background-color: rgba(255,255,255,0.06);">
                            <i class="fab fa-whatsapp text-xs" style="color: #25D366;"></i>
                        </div>
                        <div>
                            <span class="text-[11px] font-semibold text-white uppercase tracking-wider block mb-0.5">WhatsApp</span>
                            <a href="https://wa.me/6282213641995" target="_blank"
                               class="text-sm hover:text-white transition-colors" style="color: #aba193;">
                                +62 822 1364 1995
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded flex items-center justify-center flex-shrink-0 mt-0.5"
                             style="background-color: rgba(255,255,255,0.06);">
                            <i class="fas fa-envelope text-xs" style="color: #d98d88;"></i>
                        </div>
                        <div>
                            <span class="text-[11px] font-semibold text-white uppercase tracking-wider block mb-0.5">Email</span>
                            <a href="mailto:pratamadsb@gmail.com"
                               class="text-sm hover:text-white transition-colors" style="color: #aba193;">
                                pratamadsb@gmail.com
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded flex items-center justify-center flex-shrink-0 mt-0.5"
                             style="background-color: rgba(255,255,255,0.06);">
                            <i class="fab fa-instagram text-xs" style="color: #d98d88;"></i>
                        </div>
                        <div>
                            <span class="text-[11px] font-semibold text-white uppercase tracking-wider block mb-0.5">Instagram</span>
                            <a href="https://instagram.com/pratamaid.studio" target="_blank"
                               class="text-sm hover:text-white transition-colors" style="color: #aba193;">
                                @pratamaid.studio
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div style="border-top: 1px solid rgba(255,255,255,0.08);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-xs text-center sm:text-left" style="color: #988e80;">
                    &copy; {{ date('Y') }} <span class="text-white font-medium">PT Pratama Berkah Utama</span> / Pratama Design Studio. All Rights Reserved.
                </p>
                <div class="flex items-center gap-4 text-xs" style="color: #988e80;">
                    <span>Jakarta, Indonesia</span>
                    <span style="color: rgba(255,255,255,0.15);">·</span>
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
                    <span style="color: rgba(255,255,255,0.15);">·</span>
                    <a href="{{ route('consultation.create') }}" class="hover:text-white transition-colors">Konsultasi</a>
                </div>
            </div>
        </div>
    </div>
</footer>
