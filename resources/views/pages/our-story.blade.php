<x-layouts.app activePage="about" title="Our Story — Ethereal Estates">

    <!-- ═══════════ HERO BANNER ═══════════ -->
    <div class="px-4 sm:px-8 lg:px-14 pt-4">
        <div class="relative w-full h-[340px] sm:h-[400px] rounded-2xl overflow-hidden shadow-2xl bg-gray-900 flex items-center justify-center text-center p-6">
            <img src="{{ asset('assets/images/about-hero.jpg') }}" alt="Our Story" class="absolute inset-0 w-full h-full object-cover opacity-60" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20"></div>

            <div class="relative z-10 max-w-2xl mx-auto">
                <span class="block w-12 h-0.5 bg-[#d5a94e] mx-auto mb-4"></span>
                <h1 class="font-fragment text-white text-3xl sm:text-5xl uppercase tracking-[0.06em] leading-tight mb-3">
                    Our Story
                </h1>
                <p class="text-white/85 text-xs sm:text-sm font-light tracking-wide leading-relaxed">
                    A history of excellence, craftsmanship, and trusted homebuilding across Ontario.
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════ COMPANY OVERVIEW ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="rounded-2xl overflow-hidden aspect-[4/3] bg-gray-100 shadow-xl">
                <img src="{{ asset('assets/images/about-interior.jpg') }}" alt="Company Heritage" class="w-full h-full object-cover" />
            </div>

            <div class="space-y-6">
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#d5a94e] font-semibold block">The Company</span>
                <h2 class="font-fragment text-3xl sm:text-4xl uppercase tracking-[0.04em] text-gray-900 leading-tight">
                    Crafting Tomorrow's Living Heritage
                </h2>
                <div class="gold-line"></div>
                <p class="text-sm font-light text-gray-600 leading-relaxed">
                    Ethereal Estates is dedicated to helping buyers, sellers, and investors navigate Ontario's dynamic property market with confidence. Backed by extensive industry experience and strategic relationships with premier developers, we deliver exceptional outcomes at every stage of the real estate journey.
                </p>
                <div class="border-t border-gray-100 pt-6">
                    <p class="text-[10px] uppercase tracking-[0.2em] font-semibold text-gray-400 mb-1">Founded in</p>
                    <p class="font-fragment text-4xl sm:text-5xl text-[#1a2e1e] leading-none">2024</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ WHAT MAKES US DIFFERENT ═══════════ -->
    <section class="py-16 lg:py-24 px-6 lg:px-14 bg-[#fdfaf4] border-t border-gray-200">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em] text-gray-900 text-center mb-14">
                What Makes Us Different?
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div class="p-8 bg-white rounded-xl border border-gray-200/80 shadow-sm">
                    <h3 class="font-fragment text-xl uppercase text-gray-900 mb-3">Architectural Integrity</h3>
                    <p class="text-xs font-light text-gray-600 leading-relaxed">
                        Every community we partner with reflects rigorous design principles. Timeless facades, intelligent floor plate utilization, and durable materials that appreciate over decades.
                    </p>
                </div>
                <div class="p-8 bg-white rounded-xl border border-gray-200/80 shadow-sm">
                    <h3 class="font-fragment text-xl uppercase text-gray-900 mb-3">Front-Of-The-Line Access</h3>
                    <p class="text-xs font-light text-gray-600 leading-relaxed">
                        Our clients enjoy direct developer access, privileged tier-one allocations, and customized payment terms ahead of the open market.
                    </p>
                </div>
                <div class="p-8 bg-white rounded-xl border border-gray-200/80 shadow-sm">
                    <h3 class="font-fragment text-xl uppercase text-gray-900 mb-3">Complete Process Ownership</h3>
                    <p class="text-xs font-light text-gray-600 leading-relaxed">
                        From lot reservation to lawyer review and final closing inspection, our advisors handle every milestone so you don't carry the weight of the transaction.
                    </p>
                </div>
                <div class="p-8 bg-white rounded-xl border border-gray-200/80 shadow-sm">
                    <h3 class="font-fragment text-xl uppercase text-gray-900 mb-3">Award-Winning Standard</h3>
                    <p class="text-xs font-light text-gray-600 leading-relaxed">
                        Recognized among Century 21 Canada's Top 30 Under 30 and distinguished by Double Centurion achievements, our standard of care is verified by results.
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
