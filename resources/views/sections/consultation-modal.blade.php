{{-- Consultation Dialog Modal --}}
<div x-data="{ open: false }" 
     @open-consultation.window="open = true" 
     @keydown.escape.window="open = false" 
     x-cloak>
    {{-- Backdrop Veil --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false" 
         class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm"></div>

    {{-- Dialog Box --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-4"
         role="dialog" 
         aria-modal="true" 
         aria-labelledby="modal-consultation-title"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 overflow-y-auto">
        <div @click.stop 
             class="relative w-full max-w-xl bg-cream text-ink dark:bg-olive dark:text-cream border border-ink/10 dark:border-cream/15 p-6 sm:p-10 rounded-[2px] shadow-2xl my-auto">
            {{-- Close Button --}}
            <button type="button" 
                    @click="open = false" 
                    class="absolute top-6 right-6 p-2 text-ink/50 dark:text-cream/50 hover:text-ink dark:hover:text-cream transition-colors cursor-pointer"
                    aria-label="Close dialog">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            {{-- Header --}}
            <div class="mb-6">
                <span class="text-xs font-sans tracking-[0.2em] text-ink/60 dark:text-cream/60 uppercase block mb-1">
                    Fit-Out Consultation
                </span>
                <h3 id="modal-consultation-title" class="font-display text-3xl sm:text-4xl text-ink dark:text-cream">
                    Start Your Project
                </h3>
                <p class="font-sans text-xs sm:text-sm text-ink/70 dark:text-cream/70 mt-2">
                    Discuss your architectural and interior plans with Pratama designers and project engineers.
                </p>
            </div>

            {{-- Form --}}
            <form action="{{ route('consultation.store') }}" method="POST" class="space-y-4 text-xs sm:text-sm">
                @csrf
                <div>
                    <label for="modal-name" class="block font-sans text-xs tracking-wider text-ink/80 dark:text-cream/80 mb-1">
                        Full Name *
                    </label>
                    <input type="text" id="modal-name" name="name" required 
                           placeholder="Your Name" 
                           class="w-full px-3.5 py-2.5 bg-cream-soft dark:bg-olive-soft/40 border border-ink/15 dark:border-cream/20 text-ink dark:text-cream rounded-[2px] focus:border-clay focus:ring-0 outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="modal-email" class="block font-sans text-xs tracking-wider text-ink/80 dark:text-cream/80 mb-1">
                            Email Address *
                        </label>
                        <input type="email" id="modal-email" name="email" required 
                               placeholder="client@example.com" 
                               class="w-full px-3.5 py-2.5 bg-cream-soft dark:bg-olive-soft/40 border border-ink/15 dark:border-cream/20 text-ink dark:text-cream rounded-[2px] focus:border-clay focus:ring-0 outline-none">
                    </div>
                    <div>
                        <label for="modal-phone" class="block font-sans text-xs tracking-wider text-ink/80 dark:text-cream/80 mb-1">
                            WhatsApp / Phone *
                        </label>
                        <input type="tel" id="modal-phone" name="phone" required 
                               placeholder="+62 8..." 
                               class="w-full px-3.5 py-2.5 bg-cream-soft dark:bg-olive-soft/40 border border-ink/15 dark:border-cream/20 text-ink dark:text-cream rounded-[2px] focus:border-clay focus:ring-0 outline-none">
                    </div>
                </div>

                <div>
                    <label for="modal-subject" class="block font-sans text-xs tracking-wider text-ink/80 dark:text-cream/80 mb-1">
                        Service Interest
                    </label>
                    <select id="modal-subject" name="subject" 
                            class="w-full px-3.5 py-2.5 bg-cream-soft dark:bg-olive-soft/40 border border-ink/15 dark:border-cream/20 text-ink dark:text-cream rounded-[2px] focus:border-clay focus:ring-0 outline-none">
                        <option value="residential" class="bg-cream dark:bg-olive">Residential / Landed House</option>
                        <option value="apartment" class="bg-cream dark:bg-olive">Apartment Unit</option>
                        <option value="commercial" class="bg-cream dark:bg-olive">Commercial / F&amp;B / Cafe</option>
                        <option value="office" class="bg-cream dark:bg-olive">Corporate Office / Reception</option>
                        <option value="booth" class="bg-cream dark:bg-olive">Exhibition Booth</option>
                        <option value="consultation" class="bg-cream dark:bg-olive">General Consultation &amp; BOQ</option>
                    </select>
                </div>

                <div>
                    <label for="modal-message" class="block font-sans text-xs tracking-wider text-ink/80 dark:text-cream/80 mb-1">
                        Project Details / Notes *
                    </label>
                    <textarea id="modal-message" name="message" rows="3" required 
                              placeholder="Describe your location, square footage, design style, or timeline..." 
                              class="w-full px-3.5 py-2.5 bg-cream-soft dark:bg-olive-soft/40 border border-ink/15 dark:border-cream/20 text-ink dark:text-cream rounded-[2px] focus:border-clay focus:ring-0 outline-none"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full py-3 bg-olive text-cream dark:bg-cream dark:text-olive font-sans text-xs tracking-wider uppercase rounded-[2px] hover:opacity-90 transition-opacity cursor-pointer flex items-center justify-center gap-2">
                        <span>Submit Consultation Request</span>
                        <span aria-hidden="true">&rarr;</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
