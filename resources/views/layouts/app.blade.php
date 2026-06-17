<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Pratama Design Studio — Interior & Exterior Design & Build Company. Kami menghadirkan solusi desain yang estetis, fungsional, dan sesuai kebutuhan Anda.')">
    <title>@yield('title', 'Pratama Design Studio') | PT Pratama Berkah Utama</title>

    <!-- Google Fonts: Cormorant Garamond (display) + Inter (body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Vite: Tailwind CSS + Alpine.js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('head')

    <style>
        /* Ensure fonts load correctly */
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Cormorant Garamond', Georgia, serif; }

        /* Navbar transition */
        #main-navbar.scrolled {
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
        }

        /* Page-level padding for fixed navbar */
        .page-content-top { padding-top: 0; }
    </style>
</head>
<body class="bg-white text-[#1F1F1F] antialiased">

    {{-- Flash Alert: Success --}}
    @if(session('success'))
    <div id="flash-success" class="fixed top-20 right-4 z-[60] max-w-sm w-full animate-[slideIn_0.3s_ease]">
        <div class="flex items-start gap-3 bg-white border border-green-200 rounded-lg shadow-lg p-4">
            <div class="flex-shrink-0 w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                <i class="fas fa-check text-green-600 text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-800">Berhasil!</p>
                <p class="text-sm text-gray-600 mt-0.5">{{ session('success') }}</p>
            </div>
            <button onclick="document.getElementById('flash-success').remove()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xs"></i>
            </button>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div id="flash-error" class="fixed top-20 right-4 z-[60] max-w-sm w-full">
        <div class="flex items-start gap-3 bg-white border border-red-200 rounded-lg shadow-lg p-4">
            <div class="flex-shrink-0 w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                <i class="fas fa-exclamation text-red-600 text-sm"></i>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-800">Terjadi Kesalahan</p>
                <p class="text-sm text-gray-600 mt-0.5">{{ session('error') }}</p>
            </div>
            <button onclick="document.getElementById('flash-error').remove()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xs"></i>
            </button>
        </div>
    </div>
    @endif

    {{-- Navbar --}}
    <x-navbar />

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-footer />

    {{-- Back to Top Button --}}
    <button id="back-to-top"
            onclick="window.scrollTo({top:0,behavior:'smooth'})"
            class="fixed bottom-6 right-6 w-10 h-10 text-white rounded-full shadow-lg flex items-center justify-center z-50 transition-all duration-300 opacity-0 pointer-events-none hover:scale-110"
            style="background-color: #B85C4A;">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <script>
        // Back to top visibility
        window.addEventListener('scroll', () => {
            const btn = document.getElementById('back-to-top');
            if (!btn) return;
            if (window.scrollY > 400) {
                btn.style.opacity = '1';
                btn.style.pointerEvents = 'auto';
            } else {
                btn.style.opacity = '0';
                btn.style.pointerEvents = 'none';
            }
        });

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

    @yield('scripts')
</body>
</html>
