<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | Pratama Design Studio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; background-color: #f8f6f2; color: #24211d; }
        .font-display { font-family: 'Cormorant Garamond', Georgia, serif; }
        [x-cloak] { display: none !important; }
        
        /* Custom scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #3d372e; border-radius: 4px; }
    </style>
    @stack('styles')
</head>
<body class="antialiased text-[#24211d] bg-[#f8f6f2]" x-data="{ sidebarOpen: false }">
    <div class="min-h-screen flex h-screen overflow-hidden">
        
        <!-- Sidebar Backdrop -->
        <div x-show="sidebarOpen" x-transition.opacity 
             @click="sidebarOpen = false"
             class="fixed inset-0 z-20 bg-[#24211d]/60 backdrop-blur-sm lg:hidden" x-cloak></div>

        <!-- Sidebar -->
        <aside :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}"
               class="fixed inset-y-0 left-0 z-30 w-64 bg-[#24211d] text-[#e8e4dc] transition-transform duration-300 lg:static lg:translate-x-0 flex flex-col h-full shadow-2xl border-r border-[#353029]">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-20 px-6 bg-[#1e1b17] border-b border-[#353029]">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-[#b55b48] flex items-center justify-center text-white font-display text-2xl font-bold shadow-md shadow-[#b55b48]/30 group-hover:scale-105 transition-transform">
                        P
                    </div>
                    <div>
                        <span class="font-display text-xl font-bold text-white tracking-wide block leading-tight">Pratama</span>
                        <span class="text-[10px] tracking-[0.2em] uppercase font-sans text-[#b8b0a2] block">Interior Admin</span>
                    </div>
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-[#9e9689] hover:text-white p-1">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="flex-1 overflow-y-auto sidebar-scroll py-6 px-3.5 space-y-1.5">
                <div class="px-3 pb-2 text-[10px] font-semibold uppercase tracking-[0.2em] text-[#8c8477]">
                    Menu Utama
                </div>

                @php
                    $navItems = [
                        ['Dashboard', 'admin.dashboard', 'fas fa-chart-pie'],
                        ['Layanan', 'admin.services.index', 'fas fa-layer-group'],
                        ['Portofolio', 'admin.portfolio.index', 'fas fa-images'],
                        ['Kategori Portofolio', 'admin.portfolio-categories.index', 'fas fa-folder-tree'],
                        ['Konsultasi', 'admin.consultations.index', 'fas fa-comment-dots'],
                        ['Testimoni', 'admin.testimonials.index', 'fas fa-star'],
                        ['Profil Perusahaan', 'admin.company-profile.edit', 'fas fa-building'],
                    ];
                @endphp

                @foreach($navItems as [$label, $route, $icon])
                <a href="{{ route($route) }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all duration-200 group {{ request()->routeIs($route . '*') ? 'bg-[#b55b48] text-white shadow-md shadow-[#b55b48]/25 font-semibold' : 'text-[#c7bfb2] hover:bg-white/5 hover:text-white' }}">
                    <i class="{{ $icon }} w-5 text-center text-sm {{ request()->routeIs($route . '*') ? 'text-white' : 'text-[#8c8477] group-hover:text-[#e8e4dc]' }}"></i>
                    <span class="text-sm font-medium tracking-tight">{{ $label }}</span>
                </a>
                @endforeach
            </nav>

            <!-- User Area -->
            <div class="p-4 border-t border-[#353029] bg-[#1a1815]">
                <div class="flex items-center gap-3 mb-3.5 px-1">
                    <div class="w-10 h-10 rounded-xl bg-[#353029] border border-[#484239] flex items-center justify-center text-sm font-bold text-[#e8e4dc]">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-[#9e9689] truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 text-xs font-semibold uppercase tracking-wider text-[#b55b48] bg-[#b55b48]/10 hover:bg-[#b55b48] hover:text-white rounded-xl transition-all duration-200">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 bg-[#f8f6f2] h-full overflow-hidden">
            
            <!-- Topbar -->
            <header class="h-20 bg-white/90 backdrop-blur-md border-b border-[#e8e4dc] flex items-center justify-between px-6 sm:px-8 z-10 shrink-0">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden text-[#564e42] hover:text-[#24211d] p-2 rounded-lg hover:bg-[#f2f0eb]">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div>
                        <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#24211d] leading-none">@yield('title')</h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-semibold tracking-wide uppercase text-[#b55b48] bg-[#f5ecea] hover:bg-[#b55b48] hover:text-white border border-[#eed0cb] transition-all duration-200 shadow-sm">
                        <span>Lihat Website</span>
                        <i class="fas fa-external-link-alt text-[10px]"></i>
                    </a>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div x-data="{ show: true }" x-show="show" x-transition class="mb-6 bg-[#eef4ee] border border-[#cbe3cc] text-[#245427] rounded-2xl p-4 flex items-start gap-3 shadow-sm">
                        <i class="fas fa-check-circle text-[#2e6930] mt-0.5 text-base"></i>
                        <div class="flex-1">
                            <p class="text-sm font-semibold">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false" class="text-[#2e6930] hover:text-[#18391a]"><i class="fas fa-times"></i></button>
                    </div>
                @endif
                
                @if (session('error'))
                    <div x-data="{ show: true }" x-show="show" x-transition class="mb-6 bg-[#fbf0ee] border border-[#f3cec7] text-[#9c3623] rounded-2xl p-4 flex items-start gap-3 shadow-sm">
                        <i class="fas fa-exclamation-circle text-[#b55b48] mt-0.5 text-base"></i>
                        <div class="flex-1">
                            <p class="text-sm font-semibold">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="text-[#b55b48] hover:text-[#782819]"><i class="fas fa-times"></i></button>
                    </div>
                @endif

                @yield('content')
            </main>
            
        </div>
    </div>

    @stack('scripts')
</body>
</html>
