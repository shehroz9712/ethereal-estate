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
            <main class="flex-1 flex items-center justify-center px-6 sm:px-10 lg:px-16 py-4 sm:py-6">
                <div class="max-w-4xl w-full mx-auto text-center space-y-6 sm:space-y-7">
                    
                    <!-- ═══════════ 1. LUXURY SEARCH BAR (Logo ke UPAR) ═══════════ -->
                    <div class="max-w-2xl mx-auto w-full">
                        <form action="{{ route('pre-construction') }}" method="GET" class="relative flex items-center shadow-2xl">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-gray-400">
                                    <i class="fa-solid fa-magnifying-glass text-[#c5983e] text-sm sm:text-base"></i>
                                </div>
                                <input type="text"
                                       name="search"
                                       placeholder="Search by city, town, postal code or area..."
                                       class="w-full h-13 sm:h-15 pl-12 sm:pl-14 pr-32 sm:pr-36 bg-white/95 backdrop-blur-md text-gray-900 placeholder-gray-400 text-xs sm:text-sm rounded-full border border-white/30 focus:outline-none focus:ring-2 focus:ring-[#c5983e] shadow-2xl transition-all font-sans" />
                                <button type="submit"
                                        class="absolute right-1.5 sm:right-2 top-1.5 sm:top-2 bottom-1.5 sm:bottom-2 px-4 sm:px-6 bg-[#c5983e] hover:bg-[#b08432] text-white text-xs uppercase tracking-wider font-semibold rounded-full transition-all duration-300 shadow-md flex items-center gap-1.5 cursor-pointer">
                                    <span>Explore</span>
                                    <i class="fa-solid fa-arrow-up rotate-45 text-[10px]"></i>
                                </button>
                            </div>
                        </form>

                        <!-- Quick Popular Search Tags -->
                        <div class="flex items-center justify-center flex-wrap gap-2 pt-2 text-[11px] text-white/70">
                            <span class="text-white/50 uppercase tracking-widest text-[9.5px]">Trending:</span>
                            @foreach(['Bowmanville', 'Oshawa', 'Whitby', 'Ajax', 'Oakville'] as $city)
                                <a href="{{ route('pre-construction', ['search' => $city]) }}"
                                   class="px-2.5 py-0.5 rounded-full bg-white/10 hover:bg-white/25 text-white/90 transition-colors">
                                    {{ $city }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- ═══════════ 2. BADA LOGO (Center Mein, Line attached to 'e' extending left) ═══════════ -->
                    <div class="flex flex-col items-center justify-center my-1 sm:my-3">
                        <a href="{{ route('home') }}" class="inline-block group transform hover:scale-[1.02] transition-transform duration-300">
                            <x-logo-hero class="h-16 sm:h-20 md:h-24 lg:h-28 w-auto" />
                        </a>
                    </div>

                    <!-- ═══════════ 3. TAGLINE / TEXT (Logo ke NEECHE — Placeholder) ═══════════ -->
                    <div class="flex flex-col items-center space-y-2.5 max-w-2xl mx-auto text-center">
                        <!-- <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[#c5983e] text-[11px] uppercase tracking-[0.22em] font-medium">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#c5983e] animate-ping"></span>
                            Platinum VIP Developer Allocations
                        </div> -->

                        <!-- Tagline Heading (Placeholder) -->
                        <!-- <h1 class="font-fragment text-2xl sm:text-3xl lg:text-[42px] text-white uppercase tracking-[0.04em] leading-[1.14] drop-shadow-2xl">
                            Invest in Tomorrow's Address,<br class="hidden sm:inline" />
                            at Today's Price.
                        </h1> -->

                        <!-- Tagline Subtext (Playfair Display, increased px) -->
                        <p class="font-playfair text-base sm:text-lg md:text-xl text-white/90 font-normal tracking-wide max-w-2xl mx-auto leading-relaxed drop-shadow-md">
                            Ontario's curated pre-construction advisory. Seamlessly connecting discerning buyers with premier developer releases.
                        </p>
                    </div>

                    <!-- ═══════════ 4. 3 CLEAN CATEGORY PILL CARDS ═══════════ -->
                    <!-- <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 max-w-3xl mx-auto pt-1">
                        1. Pre-Construction
                        <a href="{{ route('pre-construction') }}"
                           class="group p-3.5 rounded-xl bg-black/40 hover:bg-black/60 border border-white/15 hover:border-[#c5983e]/70 backdrop-blur-md transition-all duration-300 flex items-center justify-between text-left">
                            <div>
                                <span class="text-[9px] uppercase tracking-[0.2em] text-[#c5983e] font-semibold block">01 / Priority</span>
                                <h3 class="font-fragment text-xs sm:text-sm uppercase tracking-wider text-white group-hover:text-[#c5983e] transition-colors">Pre-Construction</h3>
                            </div>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[#c5983e] text-xs group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                        </a>

                        2. Featured Listings
                        <a href="{{ route('properties.index') }}"
                           class="group p-3.5 rounded-xl bg-black/40 hover:bg-black/60 border border-white/15 hover:border-[#c5983e]/70 backdrop-blur-md transition-all duration-300 flex items-center justify-between text-left">
                            <div>
                                <span class="text-[9px] uppercase tracking-[0.2em] text-[#c5983e] font-semibold block">02 / Curated</span>
                                <h3 class="font-fragment text-xs sm:text-sm uppercase tracking-wider text-white group-hover:text-[#c5983e] transition-colors">Featured Listings</h3>
                            </div>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[#c5983e] text-xs group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                        </a>

                        3. Rebate Calculator
                        <a href="{{ route('rebate-calculator') }}"
                           class="group p-3.5 rounded-xl bg-black/40 hover:bg-black/60 border border-white/15 hover:border-[#c5983e]/70 backdrop-blur-md transition-all duration-300 flex items-center justify-between text-left">
                            <div>
                                <span class="text-[9px] uppercase tracking-[0.2em] text-[#c5983e] font-semibold block">03 / Eligibility</span>
                                <h3 class="font-fragment text-xs sm:text-sm uppercase tracking-wider text-white group-hover:text-[#c5983e] transition-colors">Rebate Calculator</h3>
                            </div>
                            <i class="fa-solid fa-arrow-up rotate-45 text-[#c5983e] text-xs group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                        </a>
                    </div> -->

                </div>
            </main>

            <!-- Bottom Brand & Advisory Bar -->
            <!-- <div class="px-6 sm:px-10 lg:px-16 py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/50 border-t border-white/10 bg-black/30 backdrop-blur-sm shrink-0">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-4 w-auto opacity-75" />
                    <span>Invest in Tomorrow's Address</span>
                </div>
                <div class="flex items-center gap-4 text-[11px] uppercase tracking-wider">
                    <button type="button" @click="openRegisterModal()" class="text-[#c5983e] hover:underline cursor-pointer inline-flex items-center gap-1">
                        <span>Connect with Follow Up Boss VIP Desk</span>
                        <i class="fa-solid fa-arrow-up rotate-45 text-[9px]"></i>
                    </button>
                    <span>•</span>
                    <a href="{{ route('about') }}" class="hover:text-white transition-colors">Who We Are</a>
                </div>
            </div> -->

        </div>

    </section>

</x-layouts.app>
