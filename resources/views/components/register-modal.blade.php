<div x-data="{ 
        open: false,
        propId: null,
        propTitle: '',
        loading: false,
        submitted: false
     }"
     x-show="open"
     x-on:open-vip-modal.window="
        propId = $event.detail.id || null;
        propTitle = $event.detail.title || '';
        submitted = false;
        open = true;
     "
     x-on:keydown.escape.window="open = false"
     class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6"
     style="display: none;">

    <!-- Backdrop -->
    <div class="fixed inset-0 bg-[#06130d]/80 backdrop-blur-md transition-opacity"
         @click="open = false"></div>

    <!-- Modal Content -->
    <div class="relative w-full max-w-lg bg-white rounded-xl shadow-2xl p-6 sm:p-10 z-10 border border-gray-100 overflow-hidden transform transition-all">
        <!-- Close Button -->
        <button type="button"
                @click="open = false"
                class="absolute top-5 right-5 text-gray-400 hover:text-gray-900 transition-colors p-1"
                aria-label="Close modal">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <template x-if="!submitted">
            <div>
                <span class="text-[10px] uppercase tracking-[0.24em] font-semibold text-[#d5a94e] block mb-1">
                    VIP Priority Access
                </span>
                <h3 class="font-fragment text-2xl sm:text-3xl uppercase tracking-[0.04em] text-gray-900 mb-2">
                    Register Your Interest
                </h3>
                <p class="text-xs text-gray-500 font-light leading-relaxed mb-6"
                   x-text="propTitle ? 'Be first to receive floor plans, VIP price lists, and developer incentives for ' + propTitle + '.' : 'Receive exclusive pre-construction releases, floor plans, and priority access across Ontario.'">
                </p>

                <form action="{{ route('inquiries.register') }}"
                      method="POST"
                      class="space-y-4"
                      @submit.prevent="
                          loading = true;
                          fetch($el.action, {
                              method: 'POST',
                              body: new FormData($el),
                              headers: { 'X-Requested-With': 'XMLHttpRequest' }
                          })
                          .then(r => r.json())
                          .then(res => {
                              loading = false;
                              submitted = true;
                          })
                          .catch(() => {
                              $el.submit();
                          });
                      ">
                    @csrf
                    <input type="hidden" name="property_id" :value="propId">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">First Name *</label>
                            <input type="text"
                                   name="first_name"
                                   required
                                   value="{{ auth()->user()?->name ? explode(' ', auth()->user()->name)[0] : '' }}"
                                   placeholder="First Name"
                                   class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white transition-colors" />
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Last Name</label>
                            <input type="text"
                                   name="last_name"
                                   placeholder="Last Name"
                                   class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white transition-colors" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Email Address *</label>
                            <input type="email"
                                   name="email"
                                   required
                                   value="{{ auth()->user()?->email }}"
                                   placeholder="name@domain.com"
                                   class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white transition-colors" />
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Phone Number</label>
                            <input type="tel"
                                   name="phone"
                                   value="{{ auth()->user()?->phone }}"
                                   placeholder="+1 (---) --- ----"
                                   class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white transition-colors" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Specific Inquiries or Requirements</label>
                        <textarea name="notes"
                                  rows="2"
                                  placeholder="Preferred collection, lot size, bedroom requirement, or budget..."
                                  class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] focus:bg-white transition-colors resize-none"></textarea>
                    </div>

                    <button type="submit"
                            :disabled="loading"
                            class="w-full btn-gold justify-center text-xs py-3.5 mt-2 cursor-pointer">
                        <span x-show="!loading">Submit VIP Registration ↗</span>
                        <span x-show="loading" style="display: none;">Processing Registration...</span>
                    </button>
                </form>
            </div>
        </template>

        <!-- Success Screen -->
        <template x-if="submitted">
            <div class="text-center py-8">
                <div class="w-14 h-14 mx-auto rounded-full bg-[#fdfaf4] border border-[#d5a94e] text-[#d5a94e] flex items-center justify-center mb-5">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h4 class="font-fragment text-2xl uppercase tracking-wide text-gray-900 mb-2">Registration Confirmed</h4>
                <p class="text-xs text-gray-500 font-light leading-relaxed max-w-sm mx-auto mb-6">
                    Thank you for your interest. An Ethereal Estates client director will dispatch the VIP package and contact you shortly.
                </p>
                <button type="button"
                        @click="open = false"
                        class="btn-gold-outline text-xs px-8">
                    Done
                </button>
            </div>
        </template>
    </div>
</div>
