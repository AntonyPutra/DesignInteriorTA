<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Pratama Design Studio') }} | Portal Admin</title>

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
        </style>
    </head>
    <body class="antialiased text-[#24211d] bg-[#f8f6f2]">
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex flex-col items-center group">
                    <div class="w-14 h-14 rounded-2xl bg-[#b55b48] flex items-center justify-center text-white font-display text-3xl font-bold shadow-lg shadow-[#b55b48]/30 group-hover:scale-105 transition-transform duration-200 mb-3">
                        P
                    </div>
                    <span class="font-display text-3xl font-bold text-[#24211d] tracking-wide block">Pratama</span>
                    <span class="text-xs uppercase tracking-[0.25em] text-[#8c8477] font-semibold mt-0.5">Design Studio &middot; Admin</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md bg-white rounded-3xl border border-[#e8e4dc] shadow-xl shadow-[#24211d]/5 p-8 sm:p-10">
                {{ $slot }}
            </div>

            <div class="mt-8 text-center text-xs text-[#8c8477]">
                <a href="{{ route('home') }}" class="hover:text-[#b55b48] transition-colors flex items-center gap-1.5 justify-center">
                    <i class="fas fa-arrow-left text-[10px]"></i>
                    <span>Kembali ke Beranda Website</span>
                </a>
            </div>
        </div>
    </body>
</html>
