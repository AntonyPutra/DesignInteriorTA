<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#24211d]">Masuk ke Portal</h2>
        <p class="text-xs text-[#777166] mt-1">Masukkan kredensial administrator Pratama Design Studio.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                Alamat Email <span class="text-[#b55b48]">*</span>
            </label>
            <div class="relative">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#a8a296]">
                    <i class="fas fa-envelope text-xs"></i>
                </span>
                <input id="email" class="block w-full pl-10 rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] placeholder:text-[#a8a296] text-sm @error('email') border-[#b55b48] @enderror" 
                       type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="admin@pratamaid.com" />
            </div>
            @error('email')
                <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#564e42] mb-1.5">
                Kata Sandi <span class="text-[#b55b48]">*</span>
            </label>
            <div class="relative">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#a8a296]">
                    <i class="fas fa-lock text-xs"></i>
                </span>
                <input id="password" class="block w-full pl-10 rounded-xl border-[#d8d2c6] shadow-2xs focus:border-[#b55b48] focus:ring-[#b55b48]/20 text-[#24211d] placeholder:text-[#a8a296] text-sm @error('password') border-[#b55b48] @enderror"
                       type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            </div>
            @error('password')
                <p class="mt-1 text-xs text-[#b55b48] font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between text-xs pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input id="remember_me" type="checkbox" class="rounded-md border-[#d8d2c6] text-[#b55b48] shadow-2xs focus:ring-[#b55b48]/20" name="remember">
                <span class="ms-2 text-[#564e42] font-medium">Ingat Saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-[#777166] hover:text-[#b55b48] transition-colors" href="{{ route('password.request') }}">
                    Lupa sandi?
                </a>
            @endif
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full flex items-center justify-center gap-2 py-3 px-4 bg-[#b55b48] hover:bg-[#9c4c3b] text-white text-xs font-semibold uppercase tracking-wider rounded-xl shadow-md shadow-[#b55b48]/25 transition-all duration-200">
                <span>Masuk Sekarang</span>
                <i class="fas fa-arrow-right text-[11px]"></i>
            </button>
        </div>
    </form>
</x-guest-layout>
