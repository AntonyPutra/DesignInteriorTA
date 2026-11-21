<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-[#A89F95]/30 rounded-md font-semibold text-xs text-[#2B2622] uppercase tracking-widest shadow-sm hover:bg-[#F5F2EB] focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
