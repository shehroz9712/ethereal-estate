<x-layouts.app activePage="about" title="About Us — Ethereal Estates">

    <!-- ═══════════ HERO BANNER ═══════════ -->
    <div class="px-4 sm:px-8 lg:px-14 pt-4">
        <div class="relative w-full h-[380px] sm:h-[460px] lg:h-[500px] rounded-2xl overflow-hidden shadow-2xl bg-[#09150e] flex items-center justify-center text-center p-6">
            <img src="{{ asset('assets/images/about/banner.png') }}"
                 onerror="this.src='{{ asset('assets/images/about-hero.jpg') }}'"
                 alt="About Ethereal Estates"
                 class="absolute inset-0 w-full h-full object-cover opacity-85" />
            <div class="absolute inset-0 bg-gradient-to-b from-black/45 via-black/40 to-black/60"></div>

            <div class="relative z-10 max-w-2xl mx-auto flex flex-col items-center">
                <span class="block w-10 h-[1.5px] bg-[#d5a94e] mb-4"></span>
                <h1 class="font-fragment text-white text-3xl sm:text-4xl lg:text-[46px] uppercase tracking-[0.06em] leading-tight mb-3">
                    ABOUT ETHEREAL ESTATES
                </h1>
                <p class="text-white/80 text-xs sm:text-sm font-light mt-1 max-w-xl leading-relaxed tracking-wide">
                    Ethereal Estates is a modern real estate firm that serves premium clients with confidence. Ranked as one of Ontario's most innovative companies.
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════ SECTION 1: STORY (3 COLUMNS) ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[260px_1fr_1fr] gap-8 lg:gap-12 items-start">
            <!-- Left: Title Column -->
            <div class="lg:pt-2">
                <p class="text-[12px] tracking-[0.28em] uppercase text-[#c5983e] font-serif italic mb-6">(About)</p>
                <h2 class="font-fragment text-[2.2rem] sm:text-[2.6rem] lg:text-[2.85rem] uppercase leading-[1.08] tracking-[0.02em] text-[#111]">
                    ONTARIO'S<br/>FINEST<br/>ADDRESSES,<br/>THOUGHTFULLY<br/>CONNECTED
                </h2>
            </div>

            <!-- Center: Interior Photo -->
            <div class="rounded-xl overflow-hidden w-full aspect-[3/4] shadow-md bg-gray-100">
                <img src="{{ asset('assets/images/about/Rectangle 617.png') }}"
                     onerror="this.src='{{ asset('assets/images/about-interior.jpg') }}'"
                     alt="Ethereal Estates Interior"
                     class="w-full h-full object-cover" />
            </div>

            <!-- Right: Text & Action -->
            <div class="lg:pt-2 flex flex-col justify-between h-full">
                <div class="space-y-6 text-sm font-light text-gray-600 leading-relaxed">
                    <p>
                        Founded in 2024, Ethereal Estates is a modern real estate firm dedicated to helping buyers, sellers, and investors navigate Ontario's dynamic property market with confidence. Backed by over a decade of combined industry experience and more than $70M in transaction value, we combine market expertise, strategic insight, and personalized service to deliver exceptional outcomes at every stage of the real estate journey.
                    </p>
                    <p>
                        Whether you're purchasing your first home, expanding your investment portfolio, or seeking the right opportunity in a competitive market, Ethereal Estates is committed to creating lasting value through every transaction.
                    </p>
                </div>
                <div class="pt-8">
                    <a href="{{ route('pre-construction') }}"
                       class="inline-flex items-center gap-2 bg-[#c5983e] hover:bg-[#b08432] text-white text-[11px] uppercase tracking-[0.18em] font-semibold px-7 py-3.5 transition-colors shadow-sm">
                        MORE ABOUT US ↗
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 2: STATS BAND WITH BLUEPRINT WIREFRAME ═══════════ -->
    <section class="relative px-6 lg:px-14 py-16 lg:py-24 bg-white overflow-hidden border-t border-gray-100">
        <!-- Background Architectural Blueprint House (Group.png) positioned on right & faint left per Figma -->
        <div class="absolute right-[-40px] md:right-10 lg:right-24 bottom-[-20px] md:bottom-2 w-[420px] sm:w-[500px] lg:w-[600px] pointer-events-none select-none opacity-[0.28] z-0">
            <img src="{{ asset('assets/images/about/Group.png') }}" alt="Architectural Blueprint" class="w-full h-auto filter contrast-150" />
        </div>
        <div class="absolute left-[-100px] lg:left-[-60px] top-6 w-[360px] lg:w-[440px] pointer-events-none select-none opacity-[0.14] z-0">
            <img src="{{ asset('assets/images/about/Group.png') }}" alt="Architectural Blueprint Left" class="w-full h-auto filter contrast-125" />
        </div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <!-- Row 1: empty left, Stat 1 center, Stat 2 right -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 lg:mb-12">
                <div class="hidden md:block"></div>
                <div>
                    <p class="font-fragment text-5xl sm:text-6xl lg:text-[4.5rem] leading-none text-[#1a2e1e] tracking-tight">$70M</p>
                    <p class="text-[11px] tracking-[0.16em] text-[#c5983e] font-semibold mt-3 uppercase">TRANSACTION VALUE</p>
                    <p class="text-[12px] font-light text-gray-500 mt-1">in residential and investment real estate</p>
                </div>
                <div>
                    <p class="font-fragment text-5xl sm:text-6xl lg:text-[4.5rem] leading-none text-[#1a2e1e] tracking-tight">75</p>
                    <p class="text-[11px] tracking-[0.16em] text-[#c5983e] font-semibold mt-3 uppercase">SALES CLOSED</p>
                    <p class="text-[12px] font-light text-gray-500 mt-1">helping clients achieve their property goals</p>
                </div>
            </div>

            <!-- Row 2: Stat 3 left, middle & right wireframe canvas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 lg:mb-12">
                <div>
                    <p class="font-fragment text-5xl sm:text-6xl lg:text-[5rem] leading-none text-[#1a2e1e] tracking-tight">133+</p>
                    <p class="text-[11px] tracking-[0.16em] text-[#c5983e] font-semibold mt-3 uppercase">SUCCESSFUL TRANSACTIONS</p>
                    <p class="text-[12px] font-light text-gray-500 mt-1">Sales and lease deals completed across Ontario</p>
                </div>
                <div class="hidden md:block"></div>
                <div class="hidden md:block"></div>
            </div>

            <!-- Row 3: empty left, Stat 4 center, empty right -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="hidden md:block"></div>
                <div>
                    <p class="font-fragment text-5xl sm:text-6xl lg:text-[4.5rem] leading-none text-[#1a2e1e] tracking-tight">58</p>
                    <p class="text-[11px] tracking-[0.16em] text-[#c5983e] font-semibold mt-3 uppercase">LEASE TRANSACTIONS</p>
                    <p class="text-[12px] font-light text-gray-500 mt-1">connecting tenants and landlords seamlessly</p>
                </div>
                <div class="hidden md:block"></div>
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 3: RECOGNIZED AMONG ONTARIO'S BEST ═══════════ -->
    <section class="bg-[#0b2112] text-white overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-stretch min-h-[500px]">
            <div class="px-8 sm:px-14 lg:px-20 py-16 lg:py-24 flex flex-col justify-center">
                <h2 class="font-fragment text-3xl sm:text-4xl lg:text-[44px] uppercase leading-[1.08] tracking-[0.02em] text-white mb-8">
                    RECOGNIZED AMONG<br/>ONTARIO'S BEST
                </h2>
                <p class="text-white/70 text-xs sm:text-sm font-light leading-relaxed max-w-md">
                    Every achievement represents the trust our clients place in us. From being recognized among Century 21 Canada's Top 100 Producers to receiving the prestigious Double Centurion Award and Top 30 Under 30 recognition, these milestones reflect our unwavering commitment to excellence, integrity, and exceptional client experiences.
                </p>
            </div>
            <div class="relative min-h-[380px] lg:min-h-full">
                <img src="{{ asset('assets/images/about/Group 1686565519.png') }}"
                     onerror="this.src='{{ asset('assets/images/founder-nakul.jpg') }}'"
                     alt="Recognized Among Ontario's Best"
                     class="absolute inset-0 w-full h-full object-cover object-center" />
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 4: A VISION OF INSPIRED LIVING ═══════════ -->
    <section class="bg-[#061209] text-white overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[48%_52%] items-stretch min-h-[540px]">
            <div class="relative min-h-[380px] lg:min-h-full">
                <img src="{{ asset('assets/images/about/Group 1686565520.png') }}"
                     onerror="this.src='{{ asset('assets/images/vision-interior.jpg') }}'"
                     alt="A Vision of Inspired Living"
                     class="absolute inset-0 w-full h-full object-cover" />
            </div>
            <div class="relative flex flex-col justify-between px-8 sm:px-14 lg:px-16 py-14 lg:py-16">
                <!-- Top Right: (Our beliefs) -->
                <div class="flex justify-end mb-6">
                    <p class="text-[12px] tracking-[0.28em] uppercase text-[#c5983e] font-serif italic">(Our beliefs)</p>
                </div>

                <!-- Center: A VISION OF INSPIRED LIVING -->
                <div class="my-auto py-8">
                    <h2 class="font-fragment text-3xl sm:text-4xl lg:text-[46px] uppercase leading-[1.06] tracking-[0.02em] text-white">
                        A VISION OF<br/>INSPIRED LIVING
                    </h2>
                </div>

                <!-- Bottom Right: Statement -->
                <div class="flex justify-end mt-6">
                    <p class="text-white/60 text-xs sm:text-sm font-light leading-relaxed max-w-sm text-right">
                        We envision a future where every property represents more than an investment — it becomes the foundation for growth, financial freedom, and a life well lived. Through expertise, integrity, and innovation, we strive to be Ontario's most trusted real estate partner.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 5: THIS ISN'T JUST ABOUT REAL ESTATE ═══════════ -->
    <section class="py-20 lg:py-28 px-6 lg:px-14 bg-white overflow-hidden">
        <div class="max-w-4xl mx-auto">
            <h2 class="font-fragment text-center text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.06em] mb-12 text-[#111]">
                THIS ISN'T JUST ABOUT REAL ESTATE
            </h2>

            <!-- 4 Chevron Progression (Pixel-Perfect Figma Composite) -->
            <div class="flex justify-center mb-10">
                <div class="w-full max-w-2xl drop-shadow-md">
                    <img src="{{ asset('assets/images/about/chevrons-combined.png') }}"
                         alt="This Isn't Just About Real Estate"
                         class="w-full h-auto object-contain mx-auto transition-transform duration-500 hover:scale-[1.02]" />
                </div>
            </div>

            <!-- Narrative & Play Button -->
            <div class="flex flex-col sm:flex-row items-center sm:items-start justify-center gap-6 sm:gap-10 max-w-xl mx-auto text-center sm:text-left pt-2">
                <div class="flex-1">
                    <p class="text-sm sm:text-base font-semibold text-gray-900 leading-snug mb-1">
                        It's about belonging. Growth. Building something lasting.
                    </p>
                    <p class="text-xs sm:text-sm text-gray-500 font-light leading-relaxed">
                        You're not simply buying a property. You're investing in a lifestyle, a community, and a future that's uniquely yours. That's where we come in.
                    </p>
                </div>
                <button type="button"
                        class="shrink-0 w-11 h-11 rounded-full bg-[#10291a] hover:bg-[#1a3d27] text-white flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 mt-1 cursor-pointer"
                        aria-label="Play Video">
                    <svg class="w-4 h-4 ml-0.5 fill-current" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 6: GENIUS BANNER ═══════════ -->
    <section class="px-4 sm:px-8 lg:px-14 pb-16 lg:pb-20 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="relative rounded-2xl overflow-hidden min-h-[300px] sm:min-h-[340px] flex flex-col justify-between p-8 sm:p-12 shadow-xl bg-[#0d1f12]">
                <img src="{{ asset('assets/images/about/Group 1686565521.png') }}"
                     alt="Genius — Nakul Sood"
                     class="absolute inset-0 w-full h-full object-cover object-center" />
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/25 to-transparent"></div>

                <!-- Top Left: Genius. -->
                <div class="relative z-10">
                    <p class="font-fragment text-white text-3xl sm:text-4xl italic tracking-wide">
                        Genius<span class="text-[#c5983e]">.</span>
                    </p>
                </div>

                <!-- Bottom Right: Pitch & CTA -->
                <div class="relative z-10 flex justify-end">
                    <div class="text-right max-w-sm">
                        <h3 class="font-fragment text-white text-lg sm:text-xl uppercase leading-tight tracking-[0.04em] mb-2">
                            A VISION BUILT ON TRUST &amp; RESULTS
                        </h3>
                        <p class="text-white/70 text-xs font-light mb-4">
                            Meet Nakul Sood – Founder, Ethereal Estates
                        </p>
                        <a href="{{ route('genius') }}"
                           class="inline-flex items-center gap-2 bg-[#c5983e] hover:bg-[#b08432] text-white text-[10px] uppercase tracking-[0.18em] font-semibold px-6 py-2.5 transition-colors shadow-sm">
                            WATCH THE JOURNEY ↗
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 7: (Teams) EXPERTS YOU CAN TRUST ═══════════ -->
    <section class="px-6 lg:px-14 pb-20 lg:pb-28 bg-white">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <p class="text-[12px] tracking-[0.28em] uppercase text-[#c5983e] font-serif italic mb-2">(Team)</p>
                    <h2 class="font-fragment text-3xl sm:text-4xl lg:text-[42px] uppercase tracking-[0.04em] text-gray-900 leading-tight">
                        EXPERTS YOU CAN TRUST
                    </h2>
                </div>
                <p class="text-xs sm:text-sm text-gray-500 font-light max-w-sm leading-relaxed">
                    From first conversations to final closings, our team is here to listen, advise, and deliver real results — helping clients thrive in Ontario's most dynamic communities.
                </p>
            </div>

            <!-- 6 Team Cards (2 rows of 3) matching exact Figma layout and assets -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <!-- Card 1: Senior Partner (card.png) -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-1.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 2: Director (card-2.png) -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card-2.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-2.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 3: Featured Overlay Card (team-3-card.jpg per Figma) -->
                <div class="group rounded-2xl overflow-hidden bg-[#243b2b] shadow-md hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/team-3-card.jpg') }}"
                         alt="Name Surname — Job Title"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 4: Client Relations (card-4.png) -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card-4.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-4.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 5: Investment Strategy (card-3.png) -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card-3.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-5.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 6: Design Consultant (card-1.png) -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card-1.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-6.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 8: NEWSLETTER (VILLA AT DUSK) ═══════════ -->
    <section class="py-20 lg:py-28 px-6 lg:px-14 bg-[#081b10] text-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left: Timber Villa with Infinity Pool at Dusk -->
            <div class="rounded-2xl overflow-hidden aspect-[4/3] lg:aspect-[1.1/1] shadow-2xl bg-black/40">
                <img src="{{ asset('assets/images/about/Group 1686565522.png') }}"
                     onerror="this.src='{{ asset('assets/images/newsletter-cabin.jpg') }}'"
                     alt="Ontario Luxury Real Estate"
                     class="w-full h-full object-cover" />
            </div>

            <!-- Right: Subscription Form -->
            <div class="space-y-6">
                <h2 class="font-fragment text-2xl sm:text-3xl lg:text-[38px] uppercase leading-[1.12] tracking-[0.03em] text-white">
                    BE THE FIRST TO KNOW ABOUT ONTARIO'S MOST EXCLUSIVE REAL ESTATE OPPORTUNITIES.
                </h2>

                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-6 pt-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <input type="text"
                                   name="first_name"
                                   placeholder="FIRST NAME"
                                   class="w-full bg-transparent border-b border-white/25 focus:border-[#c5983e] py-3 text-xs uppercase tracking-wider text-white placeholder-white/40 outline-none transition-colors" />
                        </div>
                        <div>
                            <input type="text"
                                   name="last_name"
                                   placeholder="LAST NAME"
                                   class="w-full bg-transparent border-b border-white/25 focus:border-[#c5983e] py-3 text-xs uppercase tracking-wider text-white placeholder-white/40 outline-none transition-colors" />
                        </div>
                    </div>

                    <div>
                        <input type="email"
                               name="email"
                               required
                               placeholder="ENTER EMAIL ADDRESS"
                               class="w-full bg-transparent border-b border-white/25 focus:border-[#c5983e] py-3 text-xs uppercase tracking-wider text-white placeholder-white/40 outline-none transition-colors" />
                    </div>

                    <label class="flex items-start gap-3 cursor-pointer pt-2">
                        <input type="checkbox"
                               required
                               class="mt-1 rounded border-white/30 text-[#c5983e] focus:ring-0 bg-transparent" />
                        <span class="text-xs text-white/60 font-light leading-relaxed">
                            I consent to receiving updates from Ethereal Estates regarding new project launches, market insights, and real estate opportunities across Ontario.
                        </span>
                    </label>

                    <div class="pt-4">
                        <button type="submit"
                                class="bg-[#c5983e] hover:bg-[#b08432] text-white text-[11px] uppercase tracking-[0.2em] font-semibold px-9 py-3.5 transition-colors shadow-lg cursor-pointer">
                            SUBSCRIBE NOW ↗
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-layouts.app>
