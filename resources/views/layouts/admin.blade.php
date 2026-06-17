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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F3F4F6; }
        [x-cloak] { display: none !important; }
        
        /* Custom scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #4B5563; border-radius: 4px; }
    </style>
    @stack('styles')
</head>
<body class="font-sans antialiased text-gray-900" x-data="{ sidebarOpen: false }">
    <div class="min-h-screen flex h-screen overflow-hidden">
        
        <!-- Sidebar Backdrop -->
        <div x-show="sidebarOpen" x-transition.opacity 
             @click="sidebarOpen = false"
             class="fixed inset-0 z-20 bg-gray-900/50 lg:hidden" x-cloak></div>

        <!-- Sidebar -->
        <aside :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}"
               class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-900 text-white transition-transform duration-300 lg:static lg:translate-x-0 flex flex-col h-full shadow-xl">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between h-16 px-6 bg-gray-950/50 border-b border-gray-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 font-semibold text-lg tracking-wide">
                    <div class="w-8 h-8 rounded bg-red-800 flex items-center justify-center text-white">
                        P
                    </div>
                    <span>Pratama Admin</span>
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="flex-1 overflow-y-auto sidebar-scroll py-4 px-3 space-y-1">
                @php
                    $navItems = [
                        ['Dashboard', 'admin.dashboard', 'fas fa-home'],
                        ['Services', 'admin.services.index', 'fas fa-layer-group'],
                        ['Portfolio', 'admin.portfolio.index', 'fas fa-images'],
                        ['Consultations', 'admin.consultations.index', 'fas fa-comment-dots'],
                        ['Testimonials', 'admin.testimonials.index', 'fas fa-star'],
                        ['Company Profile', 'admin.company-profile.edit', 'fas fa-building'],
                    ];
                @endphp

                @foreach($navItems as [$label, $route, $icon])
                <a href="{{ route($route) }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors group {{ request()->routeIs($route . '*') ? 'bg-red-800/80 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    <i class="{{ $icon }} w-5 text-center {{ request()->routeIs($route . '*') ? 'text-white' : 'text-gray-400 group-hover:text-white' }}"></i>
                    <span class="text-sm font-medium">{{ $label }}</span>
                </a>
                @endforeach
            </nav>

            <!-- User Area -->
            <div class="p-4 border-t border-gray-800 bg-gray-950/30">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center text-sm font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-400 rounded-lg hover:bg-gray-800 hover:text-white transition-colors">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 bg-gray-50 h-full overflow-hidden">
            
            <!-- Topbar -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4 sm:px-6 z-10 shrink-0">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden text-gray-500 hover:text-gray-700">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <h1 class="text-xl font-semibold text-gray-800 hidden sm:block">@yield('title')</h1>
                </div>

                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}" target="_blank" class="text-sm font-medium text-gray-500 hover:text-gray-900 flex items-center gap-2 bg-gray-100 px-3 py-1.5 rounded-md transition-colors">
                        <i class="fas fa-external-link-alt"></i>
                        <span class="hidden sm:inline">Lihat Website</span>
                    </a>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div x-data="{ show: true }" x-show="show" x-transition class="mb-6 bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-600 mt-0.5"></i>
                        <div class="flex-1">
                            <p class="text-sm font-medium">{{ session('success') }}</p>
                        </div>
                        <button @click="show = false" class="text-green-600 hover:text-green-800"><i class="fas fa-times"></i></button>
                    </div>
                @endif
                
                @if (session('error'))
                    <div x-data="{ show: true }" x-show="show" x-transition class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 flex items-start gap-3">
                        <i class="fas fa-exclamation-circle text-red-600 mt-0.5"></i>
                        <div class="flex-1">
                            <p class="text-sm font-medium">{{ session('error') }}</p>
                        </div>
                        <button @click="show = false" class="text-red-600 hover:text-red-800"><i class="fas fa-times"></i></button>
                    </div>
                @endif

                @yield('content')
            </main>
            
        </div>
    </div>

    @stack('scripts')
</body>
</html>
