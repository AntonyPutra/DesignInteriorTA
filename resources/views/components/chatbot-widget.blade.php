<div x-data="{
        open: false,
        messages: [{ role: 'ai', text: 'Halo! Saya Prama, asisten virtual Pratama Design. Ada yang bisa saya bantu terkait layanan desain interior kami?' }],
        userInput: '',
        isLoading: false,
        resize(e) {
            e.target.style.height = 'auto';
            e.target.style.height = e.target.scrollHeight + 'px';
        },
        async sendMessage() {
            if (this.userInput.trim() === '') return;
            
            if(this.$refs.messageInput) {
                this.$refs.messageInput.style.height = 'auto';
            }
            
            const message = this.userInput;
            this.messages.push({ role: 'user', text: message });
            this.userInput = '';
            this.isLoading = true;
            
            this.$nextTick(() => { this.scrollToBottom() });

            try {
                const response = await fetch('/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content')
                    },
                    body: JSON.stringify({ message: message })
                });
                
                const data = await response.json();
                
                if (response.ok) {
                    this.messages.push({ role: 'ai', text: data.reply });
                } else {
                    this.messages.push({ role: 'ai', text: data.error || 'Maaf, terjadi kesalahan.' });
                }
            } catch (error) {
                this.messages.push({ role: 'ai', text: 'Koneksi terputus. Silakan coba lagi.' });
            } finally {
                this.isLoading = false;
                this.$nextTick(() => { this.scrollToBottom() });
            }
        },
        scrollToBottom() {
            const container = this.$refs.chatContainer;
            if (container) {
                container.scrollTop = container.scrollHeight;
            }
        }
    }" class="fixed bottom-20 right-6 z-50">

    <!-- Toggle Button -->
    <button @click="open = !open"
        class="text-white rounded-full p-4 shadow-xl transition-all duration-300 transform hover:scale-110 focus:outline-none flex items-center justify-center cursor-pointer"
        style="background-color: var(--accent); box-shadow: 0 8px 24px rgba(181,91,72,0.4);"
        aria-label="Tanya Prama AI">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Chat Box -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        class="absolute bottom-16 right-0 w-80 sm:w-96 rounded-2xl shadow-2xl overflow-hidden flex flex-col"
        style="height: 520px; max-height: 80vh; display: none; background: var(--card-bg); border: 1px solid var(--card-border); color: var(--ink);">

        <!-- Header -->
        <div class="px-5 py-4 flex items-center justify-between text-white"
            style="background-color: var(--brown-deep); border-bottom: 1px solid rgba(255,255,255,0.08);">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl flex items-center justify-center p-1.5 shadow-sm"
                    style="background-color: var(--accent);">
                    <img src="{{ asset('assets/images/logo-mark.png') }}" alt="Prama AI"
                        class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-bold text-sm tracking-wide text-white leading-tight">Prama AI</h3>
                    <p class="text-[11px] text-white/70">Asisten Studio Pratama</p>
                </div>
            </div>
            <button @click="open = false" class="text-white/70 hover:text-white transition-colors p-1"
                aria-label="Tutup Chat">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!-- Messages -->
        <div x-ref="chatContainer" class="flex-1 p-4 overflow-y-auto flex flex-col gap-3"
            style="background-color: var(--paper);">
            <template x-for="(msg, index) in messages" :key="index">
                <div :class="msg.role === 'user' ? 'self-end text-white' : 'self-start'" :style="msg.role === 'user' 
                        ? 'background-color: var(--accent); color: #fff;' 
                        : 'background-color: var(--card-bg); border: 1px solid var(--card-border); color: var(--ink);'"
                    class="max-w-[82%] rounded-2xl px-4 py-2.5 shadow-sm text-sm leading-relaxed" x-text="msg.text">
                </div>
            </template>
            <div x-show="isLoading" class="self-start rounded-2xl px-4 py-3 shadow-sm text-sm"
                style="background-color: var(--card-bg); border: 1px solid var(--card-border); color: var(--ink);">
                <div class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full animate-bounce" style="background-color: var(--accent);"></span>
                    <span class="w-2 h-2 rounded-full animate-bounce"
                        style="background-color: var(--accent); animation-delay: 0.2s"></span>
                    <span class="w-2 h-2 rounded-full animate-bounce"
                        style="background-color: var(--accent); animation-delay: 0.4s"></span>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-3" style="background-color: var(--card-bg); border-top: 1px solid var(--card-border);">
            <form @submit.prevent="sendMessage" class="flex items-end gap-2">
                <textarea x-ref="messageInput" x-model="userInput"
                    placeholder="Tanyakan seputar biaya, gaya, atau konsultasi..." @input="resize"
                    @keydown.enter.prevent="if(!$event.shiftKey && userInput.trim() !== '') { sendMessage() }" rows="1"
                    class="flex-1 text-sm rounded-2xl px-4 py-2.5 resize-none overflow-y-auto min-h-[42px] max-h-[120px] outline-none transition-colors"
                    style="background-color: var(--paper); border: 1px solid var(--card-border); color: var(--ink);"
                    :disabled="isLoading"></textarea>
                <button type="submit" :disabled="isLoading || userInput.trim() === ''"
                    class="text-white rounded-full p-2.5 mb-0.5 disabled:opacity-40 disabled:cursor-not-allowed transition-all hover:scale-105 shrink-0 flex items-center justify-center cursor-pointer"
                    style="background-color: var(--accent);" title="Kirim Pesan">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform rotate-90" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>