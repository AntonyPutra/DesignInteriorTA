<div x-data="{
        open: false,
        messages: [{ role: 'ai', text: 'Halo! Saya Prama, asisten virtual Pratama Design. Ada yang bisa saya bantu terkait layanan desain interior kami?' }],
        userInput: '',
        isLoading: false,
        async sendMessage() {
            if (this.userInput.trim() === '') return;
            
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
    }" 
    class="fixed bottom-6 right-6 z-50">

    <!-- Toggle Button -->
    <button @click="open = !open" 
        class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-4 shadow-lg transition-transform transform hover:scale-110 focus:outline-none flex items-center justify-center">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Chat Box -->
    <div x-show="open" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 scale-95"
        class="absolute bottom-16 right-0 w-80 sm:w-96 bg-white rounded-xl shadow-2xl border border-gray-200 overflow-hidden flex flex-col" style="height: 500px; max-height: 80vh; display: none;">
        
        <!-- Header -->
        <div class="bg-blue-600 text-white px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-blue-600 font-bold">P</div>
                <div>
                    <h3 class="font-bold text-sm">Prama AI</h3>
                    <p class="text-xs text-blue-100">Pratama Design Studio</p>
                </div>
            </div>
            <button @click="open = false" class="text-blue-100 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!-- Messages -->
        <div x-ref="chatContainer" class="flex-1 p-4 overflow-y-auto bg-gray-50 flex flex-col gap-3">
            <template x-for="(msg, index) in messages" :key="index">
                <div :class="msg.role === 'user' ? 'self-end bg-blue-600 text-white' : 'self-start bg-white border border-gray-200 text-gray-800'" 
                     class="max-w-[80%] rounded-2xl px-4 py-2 shadow-sm text-sm"
                     x-text="msg.text">
                </div>
            </template>
            <div x-show="isLoading" class="self-start bg-white border border-gray-200 text-gray-800 rounded-2xl px-4 py-2 shadow-sm text-sm">
                <div class="flex gap-1">
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></span>
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-3 bg-white border-t border-gray-200">
            <form @submit.prevent="sendMessage" class="flex items-center gap-2">
                <input type="text" x-model="userInput" placeholder="Tanyakan sesuatu..." 
                    class="flex-1 text-sm border-gray-300 rounded-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 bg-gray-100 placeholder-gray-500" 
                    :disabled="isLoading">
                <button type="submit" :disabled="isLoading || userInput.trim() === ''"
                    class="bg-blue-600 text-white rounded-full p-2 hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform rotate-90" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
