<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#2B2622] hover:bg-[#1A1816] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
