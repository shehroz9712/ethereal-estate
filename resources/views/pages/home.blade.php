<x-layouts.app :navDark="true" activePage="home" title="Ethereal Estates — Invest in Tomorrow's Address" :hideFooter="true" bodyClass="overflow-hidden h-screen bg-black">

    <!-- ═══════════ HERO — EXACT 100VH FULLSCREEN VIDEO BANNER (matching old/index.php) ═══════════ -->
    <section class="relative h-[100dvh] w-full overflow-hidden bg-black text-white select-none">

        <!-- Background Video -->
        <video class="absolute inset-0 h-full w-full object-cover pointer-events-none"
               autoplay muted loop playsinline preload="auto">
            <source src="{{ asset('assets/video/hero.mp4') }}" type="video/mp4">
        </video>

        <!-- Dark Overlays -->
        <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/65 via-black/25 to-black/35 pointer-events-none"></div>
        <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-black/60 to-transparent pointer-events-none"></div>

        <!-- Hero body — full height, push content below absolute navbar -->
        <div class="relative z-10 flex min-h-[100dvh] flex-col">

            <!-- Spacer so content clears the absolute navbar (~72px tall) -->
            <div class="h-[72px] shrink-0"></div>

            <!-- Main Content Grid -->
            <main class="flex flex-1 items-center px-5 pb-10 pt-4 sm:px-8 lg:px-[7%] lg:pb-14">
                <div class="grid w-full items-center gap-10 lg:grid-cols-[1fr_390px] xl:grid-cols-[1fr_420px] xl:gap-20">

                    <!-- Left Copy -->
                    <div class="max-w-[680px]">
                        <h1 class="font-fragment text-[35px] font-normal uppercase leading-[1.3] tracking-[.035em] sm:text-[32px] md:text-[38px] lg:text-[42px] xl:text-[46px] text-white">
                            Invest in Tomorrow's<br class="hidden sm:block">
                            Address, at Today's Price
                        </h1>
                        <p class="mt-5 text-sm font-light tracking-wide text-white/85 sm:text-base">
                            Discover Exclusive Pre-Construction Opportunities.
                        </p>
                        <a href="{{ route('rebate-calculator') }}"
                           class="mt-7 inline-flex items-center gap-2 bg-[#d5a94e] px-6 py-4 text-[14px] font-medium uppercase tracking-[.12em] text-white transition hover:bg-[#e3b961] shadow-lg">
                            Check Rebate Eligibility <span class="text-white">↗</span>
                        </a>
                    </div>

                    <!-- Right Card -->
                    <div class="w-full max-w-[420px] justify-self-center rounded-[15px] border border-white/10 bg-[#06130d]/80 p-6 shadow-2xl backdrop-blur-[5px] sm:p-8 lg:p-7 xl:p-8">
                        <h2 class="font-fragment text-[26px] uppercase leading-[1.08] tracking-wide sm:text-[28px] text-white">
                            Find Your Perfect<br>Property
                        </h2>

                        <div class="mt-7 first:mt-8 space-y-6">
                            <!-- 1. Pre-Construction -->
                            <div>
                                <div class="flex gap-2 text-sm leading-5 text-white/90 sm:text-[15px]">
                                    <span class="text-[#d5a94e]">1.</span>
                                    <span>Pre-Construction</span>
                                </div>
                                <a href="{{ route('pre-construction') }}"
                                   class="mt-3 inline-flex items-center gap-2 rounded-full border border-[#d5a94e]/40 px-5 py-2 text-[11px] font-medium uppercase tracking-wider text-white transition hover:border-[#d5a94e] hover:bg-[#d5a94e]/15">
                                    Explore Now <span class="text-[#d5a94e]">↗</span>
                                </a>
                            </div>

                            <!-- 2. Featured Properties -->
                            <div>
                                <div class="flex gap-2 text-sm leading-5 text-white/90 sm:text-[15px]">
                                    <span class="text-[#d5a94e]">2.</span>
                                    <span>Featured Properties by Ethereal Estates</span>
                                </div>
                                <a href="{{ route('properties.index') }}"
                                   class="mt-3 inline-flex items-center gap-2 rounded-full border border-[#d5a94e]/40 px-5 py-2 text-[11px] font-medium uppercase tracking-wider text-white transition hover:border-[#d5a94e] hover:bg-[#d5a94e]/15">
                                    Explore Now <span class="text-[#d5a94e]">↗</span>
                                </a>
                            </div>

                            <!-- 3. MLS Listings -->
                            <div>
                                <div class="flex gap-2 text-sm leading-5 text-white/90 sm:text-[15px]">
                                    <span class="text-[#d5a94e]">3.</span>
                                    <span>MLS Listings</span>
                                </div>
                                <a href="{{ route('pre-construction') }}"
                                   class="mt-3 inline-flex items-center gap-2 rounded-full border border-[#d5a94e]/40 px-5 py-2 text-[11px] font-medium uppercase tracking-wider text-white transition hover:border-[#d5a94e] hover:bg-[#d5a94e]/15">
                                    Explore Now <span class="text-[#d5a94e]">↗</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <!-- Vertical Slider Dots Decoration (exact from old/index.php) -->
            <div class="absolute right-4 top-1/2 z-20 hidden sm:flex -translate-y-1/2 flex-col items-center gap-3 lg:right-7 pointer-events-none">
                <span class="flex h-5 w-5 items-center justify-center rounded-full border border-white/80">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#d5a94e]"></span>
                </span>
                <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
                <span class="h-1.5 w-1.5 rounded-full bg-white/70"></span>
            </div>

        </div>

    </section>

</x-layouts.app>
