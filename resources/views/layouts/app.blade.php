<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="@yield('meta_description', 'Pratama Design Studio — Interior & Exterior Design & Build Company. Kami menghadirkan solusi desain yang estetis, fungsional, dan sesuai kebutuhan Anda.')">
    <title>@yield('title', 'Pratama Design Studio') | PT Pratama Berkah Utama</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo-mark.png') }}">

    <!-- Google Fonts: Cormorant Garamond (display) + Plus Jakarta Sans & Inter (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Vite: Tailwind CSS + Alpine.js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Pratama Custom Stylesheet with Cache-Busting -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : time() }}" />

    <!-- Theme Switcher Early Script -->
    <script>
        (function() {
            window.setTheme = function(theme, animate) {
                var isDark = theme === 'dark';
                document.documentElement.setAttribute('data-theme', theme);
                if (isDark) {
                    document.documentElement.classList.add('dark-theme');
                    if (document.body) document.body.classList.add('dark-theme');
                } else {
                    document.documentElement.classList.remove('dark-theme');
                    if (document.body) document.body.classList.remove('dark-theme');
                }
                try { 
                    localStorage.setItem('pratama-theme', theme); 
                    localStorage.setItem('pratama_theme', theme); 
                } catch (e) {}
            };
            window.toggleTheme = function() {
                var current = document.documentElement.getAttribute('data-theme') || 'light';
                window.setTheme(current === 'dark' ? 'light' : 'dark', true);
            };
            try {
                var stored = localStorage.getItem('pratama-theme') || localStorage.getItem('pratama_theme');
                var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                var initial = stored ? stored : (prefersDark ? 'dark' : 'light');
                if (initial === 'dark') {
                    document.documentElement.setAttribute('data-theme', 'dark');
                    document.documentElement.classList.add('dark-theme');
                } else {
                    document.documentElement.setAttribute('data-theme', 'light');
                    document.documentElement.classList.remove('dark-theme');
                }
            } catch (e) {}
        })();
    </script>

    @yield('head')
</head>

<body class="antialiased selection:bg-[#b55b48] selection:text-white">

    {{-- Flash Alert: Success --}}
    @if(session('success'))
        <div id="flash-success" class="fixed top-24 right-4 z-[60] max-w-sm w-full transition-all duration-300">
            <div class="flex items-start gap-3 bg-white border border-green-200 rounded-xl shadow-lg p-4">
                <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-green-600 text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-[#24211d]">Berhasil!</p>
                    <p class="text-xs text-[#564e42] mt-0.5">{{ session('success') }}</p>
                </div>
                <button onclick="document.getElementById('flash-success').remove()"
                    class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xs"></i>
                </button>
            </div>
        </div>
    @endif

    {{-- Flash Alert: Error --}}
    @if(session('error'))
        <div id="flash-error" class="fixed top-24 right-4 z-[60] max-w-sm w-full transition-all duration-300">
            <div class="flex items-start gap-3 bg-white border border-red-200 rounded-xl shadow-lg p-4">
                <div class="flex-shrink-0 w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-exclamation text-red-600 text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-[#24211d]">Terjadi Kesalahan</p>
                    <p class="text-xs text-[#564e42] mt-0.5">{{ session('error') }}</p>
                </div>
                <button onclick="document.getElementById('flash-error').remove()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xs"></i>
                </button>
            </div>
        </div>
    @endif

    {{-- Navbar Component --}}
    @unless(View::hasSection('hide_navbar'))
        <x-navbar />
    @endunless

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer Component --}}
    @unless(View::hasSection('hide_footer'))
        <x-footer />
    @endunless

    {{-- Dian AI Chatbot Widget --}}
    <x-chatbot-widget />

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('main-navbar');
            if (!nav) return;
            if (window.scrollY > 20) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // Fade-up animation on scroll
        const fadeEls = document.querySelectorAll('.fade-up');
        if ('IntersectionObserver' in window && fadeEls.length) {
            const obs = new IntersectionObserver((entries) => {
                entries.forEach((entry, i) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => entry.target.classList.add('visible'), i * 60);
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.07, rootMargin: '0px 0px -40px 0px' });
            fadeEls.forEach(el => obs.observe(el));
        } else {
            fadeEls.forEach(el => el.classList.add('visible'));
        }

        // Auto-hide flash messages
        setTimeout(() => {
            document.getElementById('flash-success')?.remove();
            document.getElementById('flash-error')?.remove();
        }, 5000);
    </script>

    <!-- Deferred Application Logic with Cache-Busting -->
    <script defer src="{{ asset('js/app.js') }}?v={{ file_exists(public_path('js/app.js')) ? filemtime(public_path('js/app.js')) : time() }}"></script>

    @yield('scripts')
</body>

</html>