<x-layouts.app :navDark="true" activePage="home" title="Ethereal Estates — Invest in Tomorrow's Address" :hideFooter="true" bodyClass="overflow-hidden h-screen bg-[#06130d]">

    <!-- ═══════════ HERO — EXACT 100VH FULLSCREEN VIDEO BANNER ═══════════ -->
    <section class="relative h-[100dvh] w-full overflow-hidden bg-black text-white flex flex-col justify-between select-none"
             x-data="{
                 activeCategory: 1,
                 categories: [
                     { id: 0, title: 'MLS Listings', url: '{{ route('rebate-calculator') }}' },
                     { id: 1, title: 'Pre-Construction', url: '{{ route('pre-construction') }}' },
                     { id: 2, title: 'Featured by Ethereal', url: '{{ route('properties.index') }}' }
                 ],
                 selectCat(idx) {
                     this.activeCategory = idx;
                 }
             }">

        <!-- Background Video -->
        <video class="absolute inset-0 h-full w-full object-cover pointer-events-none"
               autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('assets/video/hero.mp4') }}" type="video/mp4">
        </video>

        <!-- Dark Luxury Overlays -->
        <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/35 to-black/45 pointer-events-none"></div>
        <div class="absolute inset-x-0 top-0 h-36 bg-gradient-to-b from-black/70 via-black/20 to-transparent pointer-events-none"></div>
        <div class="absolute inset-x-0 bottom-0 h-44 bg-gradient-to-t from-[#06130d]/90 via-black/40 to-transparent pointer-events-none"></div>

        <!-- Top Spacer to clear absolute navbar -->
        <div class="h-20 sm:h-24 shrink-0"></div>

        <!-- Center Main Content -->
        <div class="relative z-10 flex-1 flex items-center px-6 sm:px-12 lg:px-16 2xl:px-24 w-full max-w-7xl mx-auto">
            <div class="grid w-full items-center gap-10 lg:grid-cols-[1fr_390px] xl:grid-cols-[1fr_420px] xl:gap-16">

                <!-- Left Hero Copy -->
                <div class="max-w-2xl">
                    <span class="inline-flex items-center gap-2 text-[#d5a94e] text-xs sm:text-sm font-semibold tracking-[0.26em] uppercase mb-4 drop-shadow">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#d5a94e]"></span>
                        Ethereal Estates Advisory
                    </span>

                    <h1 class="font-fragment text-3xl sm:text-4xl md:text-5xl lg:text-[46px] xl:text-[52px] uppercase leading-[1.12] tracking-[0.035em] text-white drop-shadow-lg">
                        Invest in Tomorrow's<br class="hidden sm:inline">
                        Address, at Today's Price
                    </h1>

                    <p class="mt-4 sm:mt-5 text-sm sm:text-base font-light tracking-wide text-white/85 max-w-lg leading-relaxed drop-shadow">
                        Discover Exclusive Pre-Construction Opportunities across Ontario's most coveted corridors.
                    </p>

                    <div class="mt-8 sm:mt-10 flex flex-wrap items-center gap-4">
                        <a href="{{ route('rebate-calculator') }}"
                           class="inline-flex items-center gap-2 bg-[#d5a94e] hover:bg-[#c4983e] px-7 py-4 text-xs sm:text-sm font-semibold uppercase tracking-[0.14em] text-gray-900 transition-all duration-200 rounded shadow-lg hover:shadow-xl cursor-pointer">
                            <span>Check Rebate Eligibility</span>
                            <span>↗</span>
                        </a>

                        <a href="{{ route('pre-construction') }}"
                           class="inline-flex items-center gap-2 border border-white/40 hover:border-[#d5a94e] hover:bg-white/10 px-7 py-4 text-xs sm:text-sm font-semibold uppercase tracking-[0.14em] text-white transition-all duration-200 rounded cursor-pointer">
                            <span>Explore Communities</span>
                            <span class="text-[#d5a94e]">↗</span>
                        </a>
                    </div>
                </div>

                <!-- Right Luxury Glassmorphism Card (matching Figma & old/index.php) -->
                <div class="w-full max-w-[420px] justify-self-center lg:justify-self-end rounded-2xl border border-white/15 bg-[#06130d]/80 p-6 sm:p-8 shadow-2xl backdrop-blur-md">
                    <h2 class="font-fragment text-2xl sm:text-[27px] uppercase leading-tight tracking-wide text-white mb-2">
                        Find Your Perfect<br>Property
                    </h2>
                    <div class="w-12 h-0.5 bg-[#d5a94e] mb-6"></div>

                    <!-- Category List -->
                    <div class="space-y-6">
                        <!-- 1. Pre-Construction -->
                        <div class="group">
                            <div class="flex items-center gap-2.5 text-sm font-medium text-white/90 group-hover:text-white">
                                <span class="text-[#d5a94e] font-semibold">1.</span>
                                <span>Pre-Construction</span>
                            </div>
                            <a href="{{ route('pre-construction') }}"
                               class="mt-2.5 inline-flex items-center gap-2 rounded-full border border-[#d5a94e]/40 px-4 py-1.5 text-[11px] font-semibold uppercase tracking-wider text-white transition-all group-hover:border-[#d5a94e] group-hover:bg-[#d5a94e]/15">
                                Explore Now <span class="text-[#d5a94e]">↗</span>
                            </a>
                        </div>

                        <!-- 2. Featured Properties -->
                        <div class="group">
                            <div class="flex items-center gap-2.5 text-sm font-medium text-white/90 group-hover:text-white">
                                <span class="text-[#d5a94e] font-semibold">2.</span>
                                <span>Featured by Ethereal Estates</span>
                            </div>
                            <a href="{{ route('properties.index') }}"
                               class="mt-2.5 inline-flex items-center gap-2 rounded-full border border-[#d5a94e]/40 px-4 py-1.5 text-[11px] font-semibold uppercase tracking-wider text-white transition-all group-hover:border-[#d5a94e] group-hover:bg-[#d5a94e]/15">
                                Explore Now <span class="text-[#d5a94e]">↗</span>
                            </a>
                        </div>

                        <!-- 3. MLS Listings -->
                        <div class="group">
                            <div class="flex items-center gap-2.5 text-sm font-medium text-white/90 group-hover:text-white">
                                <span class="text-[#d5a94e] font-semibold">3.</span>
                                <span>MLS Listings &amp; Resale</span>
                            </div>
                            <a href="{{ route('rebate-calculator') }}"
                               class="mt-2.5 inline-flex items-center gap-2 rounded-full border border-[#d5a94e]/40 px-4 py-1.5 text-[11px] font-semibold uppercase tracking-wider text-white transition-all group-hover:border-[#d5a94e] group-hover:bg-[#d5a94e]/15">
                                Explore Now <span class="text-[#d5a94e]">↗</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Transparent Horizontal Category Track (with interactive dynamic zoom per client brief) -->
        <div class="relative z-20 pb-8 sm:pb-10 px-6 sm:px-12 w-full max-w-5xl mx-auto">
            <div class="flex items-center justify-center gap-6 sm:gap-12 md:gap-16 border-t border-white/15 pt-6">
                <template x-for="(cat, idx) in categories" :key="cat.id">
                    <a :href="cat.url"
                       @mouseenter="selectCat(idx)"
                       class="transition-all duration-300 ease-out flex flex-col items-center group cursor-pointer"
                       :class="{
                           'scale-110 sm:scale-120 opacity-100': activeCategory === idx,
                           'scale-90 sm:scale-95 opacity-50 hover:opacity-85': activeCategory !== idx
                       }">
                        <span class="font-fragment text-xs sm:text-base md:text-lg uppercase tracking-[0.14em] whitespace-nowrap transition-colors"
                              :class="activeCategory === idx ? 'text-[#d5a94e]' : 'text-white group-hover:text-white/90'"
                              x-text="cat.title"></span>
                        <span class="h-0.5 bg-[#d5a94e] transition-all duration-300 mt-1.5 rounded-full"
                              :class="activeCategory === idx ? 'w-10 opacity-100' : 'w-0 opacity-0'"></span>
                    </a>
                </template>
            </div>
        </div>

        <!-- Vertical Slider Dots Decoration (matching Figma & old/index.php) -->
        <div class="hidden xl:flex absolute right-6 top-1/2 z-20 -translate-y-1/2 flex-col items-center gap-3 pointer-events-none">
            <span class="flex h-5 w-5 items-center justify-center rounded-full border border-white/80">
                <span class="h-1.5 w-1.5 rounded-full bg-[#d5a94e]"></span>
            </span>
            <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
            <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
            <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
            <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
        </div>

    </section>

</x-layouts.app>
