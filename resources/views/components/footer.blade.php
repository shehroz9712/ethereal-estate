<!-- ══════════ FOOTER ══════════ -->
<footer class="bg-[#060e09] text-white pt-16 pb-12 px-6 sm:px-10 lg:px-16 border-t border-white/10 overflow-hidden relative">
    <div class="max-w-7xl mx-auto">

        <!-- Top grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 pb-14 border-b border-white/10">

            <!-- Col 1: Brand & Contact (spans 5 cols) -->
            <div class="sm:col-span-2 lg:col-span-5 space-y-5">
                <a href="{{ route('home') }}" class="inline-block mb-2 group">
                    <x-logo-hero class="h-12 sm:h-14 md:h-16 w-auto" />
                </a>
                <p class="text-[12px] tracking-[0.25em] text-[#c5983e] font-serif italic">Let's Talk Real Estate</p>
                <a href="mailto:office@etherealestates.ca"
                   class="font-fragment text-2xl sm:text-3xl lg:text-[28px] xl:text-[34px] text-white hover:text-[#c5983e] transition-colors block leading-none">
                    office@etherealestates.ca
                </a>
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8 text-xs text-white/60 font-light pt-2">
                    <p>600 Matheson Blvd W Unit 5<br/>Mississauga, ON L5R 4C1, Canada</p>
                    <div>
                        <span class="text-white/40">Telephone:</span>
                        <a href="tel:+14373767611" class="text-white/85 hover:text-[#c5983e] transition-colors ml-1 font-normal">+1 437 376 7611</a>
                    </div>
                </div>

                <!-- Social pills -->
                <div class="flex flex-wrap gap-2.5 pt-3">
                    @foreach (['Instagram', 'LinkedIn', 'YouTube', 'Twitter'] as $social)
                        <a href="#"
                           class="px-4 py-1.5 rounded-full border border-white/25 text-[11px] font-normal tracking-wide text-white/80 hover:border-[#c5983e] hover:text-[#c5983e] transition-colors">
                            {{ $social }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Col 2: Navigation & Listings (spans 3 cols) -->
            <div class="lg:col-span-3">
                <h3 class="font-fragment text-sm sm:text-base uppercase tracking-[0.14em] text-white mb-5">Navigation</h3>
                <ul class="space-y-3 text-xs text-white/60 font-light">
                    <li>
                        <a href="{{ route('pre-construction') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Pre-Construction</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('properties.index') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Featured Listings</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('rebate-calculator') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Calculate Your Rebate</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                    <li>
                        <button type="button"
                                @click="savedDrawerOpen = true"
                                class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors cursor-pointer text-left font-light">
                            <span>Saved Properties</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button"
                                @click="openSearchModal()"
                                class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors cursor-pointer text-left font-light">
                            <span>Search Properties</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Col 3: Company & Journal (spans 2 cols) -->
            <div class="lg:col-span-2">
                <h3 class="font-fragment text-sm sm:text-base uppercase tracking-[0.14em] text-white mb-5">Company</h3>
                <ul class="space-y-3 text-xs text-white/60 font-light">
                    <li>
                        <a href="{{ route('about') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Who We Are</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('our-story') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Our Story</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Ethereal Edit</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('join-ethereal') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Join Ethereal</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Contact Us</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Col 4: VIP Portal & Legal (spans 2 cols) -->
            <div class="lg:col-span-2">
                <h3 class="font-fragment text-sm sm:text-base uppercase tracking-[0.14em] text-white mb-5">Client Portal</h3>
                <ul class="space-y-3 text-xs text-white/60 font-light">
                    @auth
                        <li>
                            <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('user.dashboard') }}"
                               class="group/link inline-flex items-center gap-1.5 text-[#c5983e] hover:text-[#d4af37] transition-colors font-medium">
                                <span>{{ auth()->user()->isAdmin() ? 'Admin Panel' : 'My Account' }}</span>
                                <i class="fa-solid fa-arrow-up rotate-45 text-[9px]"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.saved-properties') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                                <span>Saved Portfolio</span>
                                <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                                <span>Client Sign In</span>
                                <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                                <span>VIP Allocations</span>
                                <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                            </a>
                        </li>
                    @endauth
                    <li>
                        <a href="#" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Terms of Service</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="group/link inline-flex items-center gap-1.5 hover:text-[#c5983e] transition-colors">
                            <span>Privacy Policy</span>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[9px] text-[#c5983e]/0 group-hover/link:text-[#c5983e] transition-all transform group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Bottom bar -->
        <div class="pt-8 text-xs text-white/40 font-light tracking-wide flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2.5">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-5 sm:h-6 w-auto opacity-75" />
                <p>&copy; 2026. All rights reserved.</p>
            </div>
            <p class="text-[11px] text-white/30">Ontario Real Estate Brokerage • Follow Up Boss Integrated Advisory</p>
        </div>

    </div>
</footer>
