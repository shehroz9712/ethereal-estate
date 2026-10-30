<!-- ═══════════ SAVED PROPERTIES / WISHLIST DRAWER ═══════════ -->
<div x-show="savedDrawerOpen"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 overflow-hidden"
     style="display: none;"
     @keydown.escape.window="savedDrawerOpen = false">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity"
         @click="savedDrawerOpen = false"></div>

    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
        <div class="w-screen max-w-md bg-white shadow-2xl flex flex-col"
             x-transition:enter="transform transition ease-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transform transition ease-in duration-200"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full">
            
            <!-- Drawer Header -->
            <div class="p-6 border-b border-gray-100 flex items-center justify-between bg-[#0b2112] text-white">
                <div class="flex items-center gap-2">
                    <span class="text-[#c5983e] text-lg">♥</span>
                    <h3 class="font-fragment text-lg uppercase tracking-wider text-white">Saved Properties</h3>
                    <span class="px-2 py-0.5 rounded-full bg-[#c5983e] text-[10px] text-white font-bold"
                          x-text="savedItems.length">
                    </span>
                </div>
                <button type="button"
                        @click="savedDrawerOpen = false"
                        class="text-white/60 hover:text-white p-1 rounded transition-colors cursor-pointer">
                    ✕
                </button>
            </div>

            <!-- Drawer Body -->
            <div class="flex-1 overflow-y-auto p-6 space-y-4">
                <template x-if="savedItems.length === 0">
                    <div class="py-16 text-center text-gray-500 space-y-3">
                        <div class="w-14 h-14 mx-auto rounded-full bg-gray-100 text-gray-400 flex items-center justify-center text-xl">
                            ♡
                        </div>
                        <p class="font-fragment text-base uppercase tracking-wider text-gray-700">Your Wishlist is Empty</p>
                        <p class="text-xs text-gray-400 max-w-xs mx-auto leading-relaxed">
                            Click the heart icon on any pre-construction or featured listing to save properties to your curated list.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('pre-construction') }}"
                               @click="savedDrawerOpen = false"
                               class="inline-block px-5 py-2.5 bg-[#c5983e] text-white text-xs uppercase tracking-wider font-semibold rounded hover:bg-[#b08432] transition-colors">
                                Explore Listings ↗
                            </a>
                        </div>
                    </div>
                </template>

                <template x-for="(item, idx) in savedItems" :key="item.id || idx">
                    <div class="flex gap-4 p-3 bg-gray-50 rounded-xl border border-gray-100 hover:border-[#c5983e]/50 transition-colors group">
                        <div class="w-20 h-20 rounded-lg overflow-hidden bg-gray-200 shrink-0">
                            <img :src="item.image || '{{ asset('assets/images/prop-orchard-south.jpg') }}'"
                                 :alt="item.title"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                        </div>
                        <div class="flex-1 min-w-0 flex flex-col justify-between">
                            <div>
                                <p class="text-[9px] uppercase tracking-wider text-gray-400 font-semibold" x-text="item.city || 'Ontario'"></p>
                                <h4 class="font-fragment text-sm uppercase tracking-wide text-gray-900 truncate" x-text="item.title"></h4>
                                <p class="text-xs font-semibold text-[#c5983e]" x-text="item.price || 'Price Upon Request'"></p>
                            </div>
                            <div class="flex items-center justify-between pt-1">
                                <a :href="item.url || '{{ route('properties.index') }}'"
                                   class="text-[11px] font-semibold uppercase tracking-wider text-[#0b2112] hover:text-[#c5983e] underline">
                                    View Details ↗
                                </a>
                                <button type="button"
                                        @click="removeSavedItem(item.id)"
                                        class="text-[10px] text-red-500 hover:underline cursor-pointer">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Drawer Footer -->
            <div class="p-6 border-t border-gray-100 bg-gray-50 space-y-3">
                @auth
                    <a href="{{ route('user.saved-properties') }}"
                       class="block w-full text-center py-3 bg-[#0b2112] hover:bg-[#1a3823] text-white text-xs uppercase tracking-wider font-semibold rounded transition-colors">
                        View Client Dashboard Wishlist ↗
                    </a>
                @else
                    <div class="text-center space-y-2">
                        <p class="text-[11px] text-gray-500">Sign in to sync your wishlist across all devices.</p>
                        <a href="{{ route('login') }}"
                           class="inline-block text-xs uppercase tracking-wider font-semibold text-[#c5983e] hover:underline">
                            Sign In / Create Account ↗
                        </a>
                    </div>
                @endauth
            </div>

        </div>
    </div>
</div>
