<!-- ═══════════ CIRCULAR HUMAN BOT & INTERACTIVE CHAT CONCIERGE ═══════════ -->
<div x-data="{
        visible: false,
        chatOpen: false,
        currentAdvisorIdx: 0,
        advisors: [
            { name: 'Alex', title: 'Senior Pre-Construction Advisor', avatar: '{{ asset('assets/images/team-1.jpg') }}', prompt: 'Alex is available for you' },
            { name: 'Aeden', title: 'VIP Allocations Specialist', avatar: '{{ asset('assets/images/team-2.jpg') }}', prompt: 'Aeden is available for you' },
            { name: 'Sophia', title: 'Luxury Portfolio Director', avatar: '{{ asset('assets/images/team-4.jpg') }}', prompt: 'Sophia is available for you' },
            { name: 'Marcus', title: 'Ontario Development Lead', avatar: '{{ asset('assets/images/team-5.jpg') }}', prompt: 'Marcus is available for you' }
        ],
        messages: [
            { sender: 'bot', text: 'Hello! Welcome to Ethereal Estates. I am here to assist with VIP allocations, floor plans, and exclusive developer releases. How may I assist you today?' }
        ],
        inputMsg: '',
        leadEmail: '',
        leadPhone: '',
        leadStep: false,
        connecting: false,
        init() {
            setTimeout(() => {
                this.visible = true;
            }, 2500);

            setInterval(() => {
                if (!this.chatOpen) {
                    this.currentAdvisorIdx = (this.currentAdvisorIdx + 1) % this.advisors.length;
                }
            }, 4000);
        },
        toggleChat() {
            this.chatOpen = !this.chatOpen;
            if (this.chatOpen) {
                this.$nextTick(() => {
                    const scrollArea = this.$refs.chatScroll;
                    if (scrollArea) scrollArea.scrollTop = scrollArea.scrollHeight;
                });
            }
        },
        sendUserMessage(text = null) {
            const msg = text || this.inputMsg;
            if (!msg || !msg.trim()) return;

            this.messages.push({ sender: 'user', text: msg });
            this.inputMsg = '';

            this.$nextTick(() => {
                const scrollArea = this.$refs.chatScroll;
                if (scrollArea) scrollArea.scrollTop = scrollArea.scrollHeight;
            });

            setTimeout(() => {
                const activeAdvisor = this.advisors[this.currentAdvisorIdx].name;
                this.messages.push({
                    sender: 'bot',
                    text: 'Thank you! To send you the exclusive floor plans, pricing sheets, or have ' + activeAdvisor + ' call you directly, please provide your email or phone below:'
                });
                this.leadStep = true;
                this.$nextTick(() => {
                    const scrollArea = this.$refs.chatScroll;
                    if (scrollArea) scrollArea.scrollTop = scrollArea.scrollHeight;
                });
            }, 800);
        },
        submitLead() {
            if (!this.leadEmail && !this.leadPhone) return;

            this.connecting = true;
            fetch('{{ route('inquiries.contact') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    first_name: 'Chat Visitor (' + this.advisors[this.currentAdvisorIdx].name + ')',
                    email: this.leadEmail || 'chat-lead@etherealestates.ca',
                    phone: this.leadPhone || '',
                    message: 'Captured via Human Chat Concierge with ' + this.advisors[this.currentAdvisorIdx].name + '. Messages: ' + this.messages.map(m => m.sender + ': ' + m.text).join(' | ')
                })
            })
            .then(r => r.json())
            .then(data => {
                this.connecting = false;
                this.leadStep = false;
                this.messages.push({
                    sender: 'bot',
                    text: 'Perfect! ' + this.advisors[this.currentAdvisorIdx].name + ' has received your details and Follow Up Boss priority ticket has been generated. We will contact you immediately.'
                });
                this.leadEmail = '';
                this.leadPhone = '';
                this.$nextTick(() => {
                    const scrollArea = this.$refs.chatScroll;
                    if (scrollArea) scrollArea.scrollTop = scrollArea.scrollHeight;
                });
            })
            .catch(() => {
                this.connecting = false;
                this.leadStep = false;
                this.messages.push({
                    sender: 'bot',
                    text: 'Thank you! Our advisory team has been notified and will reach out to you.'
                });
            });
        }
    }"
    class="fixed bottom-6 right-6 sm:bottom-8 sm:right-8 z-50 select-none"
    style="display: none;"
    x-show="visible"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-6 scale-90"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100">

    <!-- ═══════════ EXPANDED CHAT BOX ═══════════ -->
    <div x-show="chatOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-4"
         class="absolute bottom-20 right-0 w-[92vw] sm:w-[380px] bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden flex flex-col h-[520px] max-h-[80vh] z-50 text-gray-800"
         style="display: none;">

        <!-- Header -->
        <div class="bg-[#0b2112] text-white p-4 flex items-center justify-between border-b border-[#c5983e]/30 shrink-0">
            <div class="flex items-center gap-3">
                <div class="relative w-11 h-11 rounded-full overflow-hidden border-2 border-[#c5983e] shrink-0">
                    <img :src="advisors[currentAdvisorIdx].avatar"
                         :alt="advisors[currentAdvisorIdx].name"
                         class="w-full h-full object-cover" />
                    <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full"></span>
                </div>
                <div>
                    <div class="flex items-center gap-1.5">
                        <h4 class="font-fragment text-sm uppercase tracking-wider text-white font-medium" x-text="advisors[currentAdvisorIdx].name"></h4>
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    </div>
                    <p class="text-[10px] uppercase tracking-wider text-[#c5983e] font-sans" x-text="advisors[currentAdvisorIdx].title"></p>
                </div>
            </div>
            <button type="button"
                    @click="chatOpen = false"
                    class="text-white/60 hover:text-white transition-colors p-1.5 rounded-full hover:bg-white/10 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Chat messages scroll area -->
        <div class="flex-1 overflow-y-auto p-4 space-y-3 bg-[#faf9f6]" x-ref="chatScroll">
            <template x-for="(msg, index) in messages" :key="index">
                <div class="flex flex-col" :class="msg.sender === 'user' ? 'items-end' : 'items-start'">
                    <div class="max-w-[85%] rounded-2xl px-4 py-2.5 text-xs font-light leading-relaxed shadow-sm"
                         :class="msg.sender === 'user'
                            ? 'bg-[#0b2112] text-white rounded-br-none'
                            : 'bg-white text-gray-800 border border-gray-200/80 rounded-bl-none'">
                        <p x-text="msg.text"></p>
                    </div>
                </div>
            </template>

            <!-- Lead Capture Form within Chat -->
            <template x-if="leadStep">
                <div class="bg-white border border-[#c5983e]/50 rounded-xl p-3.5 space-y-2.5 shadow-sm mt-2">
                    <p class="text-[11px] font-semibold text-[#0b2112] uppercase tracking-wide">
                        Connect with Follow Up Boss VIP Desk:
                    </p>
                    <input type="email"
                           x-model="leadEmail"
                           placeholder="Your email address *"
                           class="w-full text-xs px-3 py-2 bg-gray-50 border border-gray-200 rounded focus:border-[#c5983e] focus:outline-none" />
                    <input type="tel"
                           x-model="leadPhone"
                           placeholder="Phone number (optional)"
                           class="w-full text-xs px-3 py-2 bg-gray-50 border border-gray-200 rounded focus:border-[#c5983e] focus:outline-none" />
                    <button type="button"
                            @click="submitLead()"
                            :disabled="connecting"
                            class="w-full py-2 bg-[#c5983e] hover:bg-[#b08432] text-white text-[11px] uppercase tracking-wider font-semibold rounded transition-colors cursor-pointer">
                        <span x-text="connecting ? 'Connecting...' : 'Request Instant Connection ↗'"></span>
                    </button>
                </div>
            </template>
        </div>

        <!-- Quick Suggestions -->
        <div class="p-2 bg-white border-t border-gray-100 flex gap-1.5 overflow-x-auto no-scrollbar shrink-0">
            <button type="button"
                    @click="sendUserMessage('I want VIP Pre-Construction floor plans')"
                    class="text-[10px] uppercase tracking-wider whitespace-nowrap bg-gray-50 hover:bg-[#c5983e]/15 border border-gray-200 text-gray-700 px-3 py-1.5 rounded-full transition-colors cursor-pointer">
                🏢 VIP Floor Plans
            </button>
            <button type="button"
                    @click="sendUserMessage('What are the latest developer price sheets?')"
                    class="text-[10px] uppercase tracking-wider whitespace-nowrap bg-gray-50 hover:bg-[#c5983e]/15 border border-gray-200 text-gray-700 px-3 py-1.5 rounded-full transition-colors cursor-pointer">
                💰 Price Sheets
            </button>
            <button type="button"
                    @click="sendUserMessage('Connect me with an advisor')"
                    class="text-[10px] uppercase tracking-wider whitespace-nowrap bg-gray-50 hover:bg-[#c5983e]/15 border border-gray-200 text-gray-700 px-3 py-1.5 rounded-full transition-colors cursor-pointer">
                📞 Speak with Advisor
            </button>
        </div>

        <!-- Chat Input Form -->
        <div class="p-3 bg-white border-t border-gray-100 flex items-center gap-2 shrink-0">
            <input type="text"
                   x-model="inputMsg"
                   @keydown.enter.prevent="sendUserMessage()"
                   placeholder="Ask a question..."
                   class="flex-1 text-xs px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:border-[#c5983e] focus:bg-white text-gray-800" />
            <button type="button"
                    @click="sendUserMessage()"
                    class="w-9 h-9 rounded-full bg-[#0b2112] hover:bg-[#c5983e] text-white flex items-center justify-center transition-colors cursor-pointer shrink-0">
                <svg class="w-4 h-4 transform rotate-45 -mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
            </button>
        </div>

    </div>

    <!-- ═══════════ TRIGGER BUTTON & SPEECH PILL ═══════════ -->
    <div class="flex items-center gap-3 cursor-pointer group" @click="toggleChat()">
        
        <!-- Animated Speech Notification Bubble (cycles dynamically) -->
        <div class="hidden sm:flex items-center bg-white/95 backdrop-blur-md border border-gray-200 shadow-xl rounded-full py-2 px-4 gap-2 transition-all duration-300 group-hover:scale-105">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            <span class="text-xs font-medium text-gray-800 tracking-wide transition-opacity duration-300"
                  x-text="advisors[currentAdvisorIdx].prompt">
            </span>
            <span class="text-xs text-[#c5983e] font-bold">💬</span>
        </div>

        <!-- Circular Human Bot Button with Gold Border & Active Pulse -->
        <div class="relative w-14 h-14 sm:w-16 sm:h-16 rounded-full overflow-hidden border-2 border-[#c5983e] shadow-2xl bg-[#0b2112] group-hover:scale-110 transition-transform duration-300 ring-4 ring-[#c5983e]/20">
            <img :src="advisors[currentAdvisorIdx].avatar"
                 :alt="advisors[currentAdvisorIdx].name"
                 class="w-full h-full object-cover transition-all duration-500" />
            
            <!-- Live Green Indicator -->
            <span class="absolute bottom-1 right-1 w-3.5 h-3.5 rounded-full bg-emerald-500 border-2 border-white ring-2 ring-emerald-400/40"></span>
        </div>

    </div>

</div>
