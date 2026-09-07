<x-layouts.app activePage="genius" title="Genius Experience — Ethereal Estates">

    <!-- ═══════════ HERO BANNER ═══════════ -->
    <div class="px-4 sm:px-8 lg:px-14 pt-4">
        <div class="relative w-full h-[360px] sm:h-[420px] rounded-2xl overflow-hidden shadow-2xl bg-gray-900 flex items-center justify-center text-center p-6">
            <img src="{{ asset('assets/images/about-hero.jpg') }}" alt="Genius Experience" class="absolute inset-0 w-full h-full object-cover opacity-50" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/45 to-black/25"></div>

            <div class="relative z-10 max-w-2xl mx-auto">
                <span class="text-[#d5a94e] text-xs uppercase tracking-[0.24em] font-semibold block mb-3">Intelligent Standard</span>
                <h1 class="font-fragment text-white text-3xl sm:text-5xl uppercase tracking-[0.06em] leading-tight mb-3">
                    Make Yourself At Home
                </h1>
                <p class="text-white/85 text-xs sm:text-sm font-light tracking-wide leading-relaxed">
                    When it comes to standard inclusions, Ethereal Estates partners with builders who raise the bar.
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════ INTRO HIGHLIGHTS ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#d5a94e] font-semibold block">Standard Inclusions</span>
                <h2 class="font-fragment text-3xl sm:text-4xl uppercase tracking-[0.04em] text-gray-900 leading-tight">
                    Smart Doorbell &middot; Quartz Surfaces &middot; Integrated Fireplaces &middot; Smart Climate Control
                </h2>
                <div class="gold-line"></div>
                <p class="text-sm font-light text-gray-600 leading-relaxed">
                    Every featured pre-construction community integrates intelligent automation and architectural upgrades directly into the base purchase price. No hidden fees or basic builder-grade compromises.
                </p>
                <div class="pt-2">
                    <a href="{{ route('pre-construction') }}" class="btn-gold">
                        Explore Communities ↗
                    </a>
                </div>
            </div>

            <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                <div class="rounded-xl overflow-hidden aspect-[4/5] bg-gray-100 shadow-md">
                    <img src="{{ asset('assets/images/prop-orchard-south.jpg') }}" alt="Feature 1" class="w-full h-full object-cover" />
                </div>
                <div class="rounded-xl overflow-hidden aspect-[4/5] bg-gray-100 shadow-md mt-6">
                    <img src="{{ asset('assets/images/prop-chateau9.jpg') }}" alt="Feature 2" class="w-full h-full object-cover" />
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ 3-COLUMN PILLARS: CONNECTION, COUTURE, CONVERSATION ═══════════ -->
    <section class="py-16 lg:py-20 px-6 lg:px-14 bg-[#fdfaf4] border-t border-gray-200">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-8 border border-gray-200 shadow-sm text-center">
                    <div class="w-12 h-12 rounded-full bg-[#fdfaf4] text-[#d5a94e] border border-[#d5a94e] flex items-center justify-center mx-auto mb-4 font-fragment text-xl">
                        01
                    </div>
                    <h3 class="font-fragment text-xl uppercase tracking-wide text-gray-900 mb-2">Connection</h3>
                    <p class="text-xs font-light text-gray-500 leading-relaxed">
                        Integrated smart home hubs, high-speed fiber provisions, and automated climate scheduling out of the box.
                    </p>
                </div>
                <div class="bg-white rounded-xl p-8 border border-gray-200 shadow-sm text-center">
                    <div class="w-12 h-12 rounded-full bg-[#fdfaf4] text-[#d5a94e] border border-[#d5a94e] flex items-center justify-center mx-auto mb-4 font-fragment text-xl">
                        02
                    </div>
                    <h3 class="font-fragment text-xl uppercase tracking-wide text-gray-900 mb-2">Couture</h3>
                    <p class="text-xs font-light text-gray-500 leading-relaxed">
                        Tailored European cabinetry, engineered hardwood planking, and quartz island slabs designed for hospitality.
                    </p>
                </div>
                <div class="bg-white rounded-xl p-8 border border-gray-200 shadow-sm text-center">
                    <div class="w-12 h-12 rounded-full bg-[#fdfaf4] text-[#d5a94e] border border-[#d5a94e] flex items-center justify-center mx-auto mb-4 font-fragment text-xl">
                        03
                    </div>
                    <h3 class="font-fragment text-xl uppercase tracking-wide text-gray-900 mb-2">Conservation</h3>
                    <p class="text-xs font-light text-gray-500 leading-relaxed">
                        Energy Star certified building envelopes, high-efficiency mechanical systems, and low-VOC interior paints.
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
