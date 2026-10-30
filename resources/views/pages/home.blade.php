<x-layouts.app :navDark="true" activePage="home" title="Ethereal Estates — Invest in Tomorrow's Address" :hideFooter="true" bodyClass="overflow-hidden h-screen bg-black">

    <!-- ═══════════ HERO — 100VH FULLSCREEN VIDEO BANNER WITH CLEAN LUXURY SEARCH ═══════════ -->
    <section class="relative h-[100dvh] w-full overflow-hidden bg-black text-white select-none">

        <!-- Background Video -->
        <video class="absolute inset-0 h-full w-full object-cover pointer-events-none"
               autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('assets/video/hero.mp4') }}" type="video/mp4">
        </video>

        <!-- Dark Overlays -->
        <div class="absolute inset-0 bg-black/45 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/35 to-black/45 pointer-events-none"></div>
        <div class="absolute inset-x-0 top-0 h-36 bg-gradient-to-b from-black/70 to-transparent pointer-events-none"></div>
        <div class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black/80 to-transparent pointer-events-none"></div>

        <!-- Hero body -->
        <div class="relative z-10 flex min-h-[100dvh] flex-col justify-between">

            <!-- Spacer for absolute navbar -->
            <div class="h-[76px] shrink-0"></div>

            <!-- Central Content Area -->
            <main class="flex-1 flex items-center justify-center px-6 sm:px-10 lg:px-16 py-6">
                <div class="max-w-4xl w-full mx-auto text-center space-y-7">
                    
                    <!-- Tagline & Brand Identity (with Logo) -->
                    <div class="flex flex-col items-center space-y-3">
                        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[#c5983e] text-xs uppercase tracking-[0.22em] font-medium">
                            <span class="w-2 h-2 rounded-full bg-[#c5983e] animate-ping"></span>
                            Platinum VIP Developer Allocations
                        </div>

                        <h1 class="font-fragment text-3xl sm:text-5xl lg:text-[56px] text-white uppercase tracking-[0.04em] leading-[1.12] drop-shadow-2xl">
                            Invest in Tomorrow's Address,<br class="hidden sm:inline" />
                            at Today's Price.
                        </h1>

                        <p class="text-white/85 text-xs sm:text-base font-light tracking-wide max-w-2xl mx-auto">
                            Ontario's curated pre-construction advisory. Seamlessly connecting discerning buyers with premier developer releases.
                        </p>
                    </div>

                    <!-- ═══════════ LUXURY SEARCH BAR (on Home Page) ═══════════ -->
                    <div class="max-w-2xl mx-auto w-full">
                        <form action="{{ route('pre-construction') }}" method="GET" class="relative flex items-center shadow-2xl">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 pl-4.5 flex items-center pointer-events-none text-gray-400">
                                    <svg class="w-5 h-5 text-[#c5983e]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                                <input type="text"
                                       name="search"
                                       placeholder="Search by city, town, postal code or area..."
                                       class="w-full h-14 sm:h-16 pl-12 pr-36 bg-white/95 backdrop-blur-md text-gray-900 placeholder-gray-400 text-xs sm:text-sm rounded-full border border-white/30 focus:outline-none focus:ring-2 focus:ring-[#c5983e] shadow-2xl transition-all" />
                                <button type="submit"
                                        class="absolute right-2 top-2 bottom-2 px-5 sm:px-7 bg-[#c5983e] hover:bg-[#b08432] text-white text-xs uppercase tracking-wider font-semibold rounded-full transition-all duration-300 shadow-md flex items-center gap-1.5 cursor-pointer">
                                    <span>Explore</span>
                                    <span>↗</span>
                                </button>
                            </div>
                        </form>

                        <!-- Quick Popular Search Tags -->
                        <div class="flex items-center justify-center flex-wrap gap-2 pt-3 text-[11px] text-white/70">
                            <span class="text-white/50 uppercase tracking-widest text-[9.5px]">Trending:</span>
                            @foreach(['Bowmanville', 'Oshawa', 'Whitby', 'Ajax', 'Oakville'] as $city)
                                <a href="{{ route('pre-construction', ['search' => $city]) }}"
                                   class="px-2.5 py-0.5 rounded-full bg-white/10 hover:bg-white/25 text-white/90 transition-colors">
                                    {{ $city }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- ═══════════ 3 CLEAN CATEGORY PILL CARDS ═══════════ -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 max-w-3xl mx-auto pt-2">
                        <!-- 1. Pre-Construction -->
                        <a href="{{ route('pre-construction') }}"
                           class="group p-4 rounded-xl bg-black/40 hover:bg-black/60 border border-white/15 hover:border-[#c5983e]/70 backdrop-blur-md transition-all duration-300 flex items-center justify-between text-left">
                            <div>
                                <span class="text-[9.5px] uppercase tracking-[0.2em] text-[#c5983e] font-semibold block">01 / Priority</span>
                                <h3 class="font-fragment text-sm sm:text-base uppercase tracking-wider text-white group-hover:text-[#c5983e] transition-colors">Pre-Construction</h3>
                            </div>
                            <span class="text-[#c5983e] text-sm group-hover:translate-x-1 transition-transform">↗</span>
                        </a>

                        <!-- 2. Featured Listings -->
                        <a href="{{ route('properties.index') }}"
                           class="group p-4 rounded-xl bg-black/40 hover:bg-black/60 border border-white/15 hover:border-[#c5983e]/70 backdrop-blur-md transition-all duration-300 flex items-center justify-between text-left">
                            <div>
                                <span class="text-[9.5px] uppercase tracking-[0.2em] text-[#c5983e] font-semibold block">02 / Curated</span>
                                <h3 class="font-fragment text-sm sm:text-base uppercase tracking-wider text-white group-hover:text-[#c5983e] transition-colors">Featured Listings</h3>
                            </div>
                            <span class="text-[#c5983e] text-sm group-hover:translate-x-1 transition-transform">↗</span>
                        </a>

                        <!-- 3. Rebate Calculator -->
                        <a href="{{ route('rebate-calculator') }}"
                           class="group p-4 rounded-xl bg-black/40 hover:bg-black/60 border border-white/15 hover:border-[#c5983e]/70 backdrop-blur-md transition-all duration-300 flex items-center justify-between text-left">
                            <div>
                                <span class="text-[9.5px] uppercase tracking-[0.2em] text-[#c5983e] font-semibold block">03 / Eligibility</span>
                                <h3 class="font-fragment text-sm sm:text-base uppercase tracking-wider text-white group-hover:text-[#c5983e] transition-colors">Rebate Calculator</h3>
                            </div>
                            <span class="text-[#c5983e] text-sm group-hover:translate-x-1 transition-transform">↗</span>
                        </a>
                    </div>

                </div>
            </main>

            <!-- Bottom Brand & Advisory Bar -->
            <div class="px-6 sm:px-10 lg:px-16 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/50 border-t border-white/10 bg-black/30 backdrop-blur-sm shrink-0">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-4 w-auto opacity-75" />
                    <span>Invest in Tomorrow's Address</span>
                </div>
                <div class="flex items-center gap-4 text-[11px] uppercase tracking-wider">
                    <button type="button" @click="openRegisterModal()" class="text-[#c5983e] hover:underline cursor-pointer">
                        Connect with Follow Up Boss VIP Desk ↗
                    </button>
                    <span>•</span>
                    <a href="{{ route('about') }}" class="hover:text-white transition-colors">Who We Are</a>
                </div>
            </div>

        </div>

    </section>

</x-layouts.app>
