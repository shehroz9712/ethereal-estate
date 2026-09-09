<x-layouts.app activePage="about" title="About Us — Ethereal Estates">

    <!-- ═══════════ HERO BANNER ═══════════ -->
    <div class="px-4 sm:px-8 lg:px-14 pt-4">
        <div class="relative w-full h-[380px] sm:h-[440px] lg:h-[480px] rounded-2xl overflow-hidden shadow-2xl bg-[#09150e] flex items-center justify-center text-center p-6">
            <img src="{{ asset('assets/images/about/banner.png') }}"
                 onerror="this.src='{{ asset('assets/images/about-hero.jpg') }}'"
                 alt="About Ethereal Estates"
                 class="absolute inset-0 w-full h-full object-cover opacity-85" />
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/65"></div>

            <div class="relative z-10 max-w-2xl mx-auto flex flex-col items-center">
                <span class="block w-10 h-[1.5px] bg-[#c5983e] mb-4"></span>
                <h1 class="font-fragment text-white text-3xl sm:text-4xl lg:text-[46px] uppercase tracking-[0.06em] leading-tight mb-3">
                    ABOUT ETHEREAL ESTATES
                </h1>
                <p class="text-white/85 text-xs sm:text-sm md:text-base font-light tracking-wide leading-relaxed max-w-xl">
                    We see beyond the property to the decision that shapes what comes next.
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════ COMPANY STORY: BEYOND THE EXPECTED. ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[280px_1fr_1fr] gap-8 lg:gap-12 items-start">
            <!-- Left: Heading -->
            <div>
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold block mb-3">
                    Our Philosophy
                </span>
                <h2 class="font-fragment text-3xl sm:text-4xl uppercase leading-[1.08] tracking-[0.03em] text-[#111]">
                    BEYOND THE<br/>EXPECTED.
                </h2>
            </div>

            <!-- Center: Interior Architecture Photo -->
            <div class="rounded-xl overflow-hidden w-full aspect-[3/4] shadow-md bg-gray-100">
                <img src="{{ asset('assets/images/about/Rectangle 617.png') }}"
                     onerror="this.src='{{ asset('assets/images/about-interior.jpg') }}'"
                     alt="Ethereal Estates Interior"
                     class="w-full h-full object-cover" />
            </div>

            <!-- Right: Text & Action -->
            <div class="flex flex-col justify-between h-full space-y-6">
                <div class="space-y-5 text-sm font-light text-gray-600 leading-relaxed">
                    <p>
                        Founded in 2024, Ethereal Estates offers a more discerning approach to real estate, where every property recommended must genuinely earn its place.
                    </p>
                    <p>
                        Backed by more than $200 million in completed transactions and a reputation built at the highest level, our team has developed strong relationships across the development community, allowing us to carefully identify distinguished homes and pre-construction opportunities with the potential to remain valuable well beyond the purchase.
                    </p>
                </div>
                <div class="pt-4">
                    <a href="{{ route('pre-construction') }}"
                       class="inline-flex items-center gap-2 bg-[#c5983e] hover:bg-[#b08432] text-white text-[11px] uppercase tracking-[0.18em] font-semibold px-7 py-3.5 transition-colors shadow-sm">
                        Explore Pre-Construction ↗
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ STATS BAND ($200M+ per specification) ═══════════ -->
    <section class="relative px-6 lg:px-14 py-16 lg:py-24 bg-white overflow-hidden border-t border-gray-100">
        <!-- Background Architectural Blueprint House (Group.png) -->
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
                    <p class="font-fragment text-5xl sm:text-6xl lg:text-[4.5rem] leading-none text-[#1a2e1e] tracking-tight">$200M+</p>
                    <p class="text-[11px] tracking-[0.16em] text-[#c5983e] font-semibold mt-3 uppercase">TRANSACTION VALUE</p>
                    <p class="text-[12px] font-light text-gray-500 mt-1">in residential and pre-construction real estate</p>
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

    <!-- ═══════════ FOUNDER: BUILT ON A CLEAR VISION ═══════════ -->
    <section class="bg-[#0b2112] text-white overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-stretch min-h-[500px]">
            <div class="px-8 sm:px-14 lg:px-20 py-16 lg:py-24 flex flex-col justify-center">
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold block mb-3">Leadership</span>
                <h2 class="font-fragment text-3xl sm:text-4xl lg:text-[44px] uppercase leading-[1.08] tracking-[0.02em] text-white mb-6">
                    BUILT ON A<br/>CLEAR VISION
                </h2>
                <div class="space-y-4 text-xs sm:text-sm font-light text-white/80 leading-relaxed max-w-md">
                    <p>
                        Ethereal Estates began with a clear ambition to create a real estate company where access is matched by judgment and every recommendation is measured by the value it can create for the client.
                    </p>
                    <p>
                        At its centre is founder Nakul Sood, whose command of resale and pre-construction has brought him consecutive recognition among Century 21 Canada’s Top 30 Under 30. The performance behind his Double Centurion distinction is reflected in the standard he established for Ethereal, with considered advice, decisive representation and the confidence to pursue only what is truly worth a client’s time.
                    </p>
                </div>
            </div>
            <div class="relative min-h-[380px] lg:min-h-full">
                <img src="{{ asset('assets/images/about/Group 1686565519.png') }}"
                     onerror="this.src='{{ asset('assets/images/founder-nakul.jpg') }}'"
                     alt="Nakul Sood — Founder"
                     class="absolute inset-0 w-full h-full object-cover object-center" />
            </div>
        </div>
    </section>

    <!-- ═══════════ SERVICE STANDARD: THE STANDARD WE STAND BY ═══════════ -->
    <section class="bg-[#061209] text-white overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[48%_52%] items-stretch min-h-[520px]">
            <div class="relative min-h-[380px] lg:min-h-full">
                <img src="{{ asset('assets/images/about/Group 1686565520.png') }}"
                     onerror="this.src='{{ asset('assets/images/vision-interior.jpg') }}'"
                     alt="The Standard We Stand By"
                     class="absolute inset-0 w-full h-full object-cover" />
            </div>
            <div class="relative flex flex-col justify-between px-8 sm:px-14 lg:px-16 py-14 lg:py-16">
                <div>
                    <span class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold block mb-3">Service Standard</span>
                    <h2 class="font-fragment text-3xl sm:text-4xl lg:text-[42px] uppercase leading-[1.08] tracking-[0.02em] text-white mb-6">
                        THE STANDARD<br/>WE STAND BY
                    </h2>
                </div>

                <div class="space-y-4 text-xs sm:text-sm font-light text-white/80 leading-relaxed max-w-md my-auto">
                    <p>
                        Our team takes ownership of every stage, allowing clients to move through important decisions without carrying the weight of the process themselves. We learn what matters, narrow the field with purpose and address concerns before they reach the client.
                    </p>
                    <p>
                        From the first conversation through closing, every detail is followed through and every recommendation is made with a clear understanding of what is at stake.
                    </p>
                </div>

                <div class="pt-6">
                    <a href="{{ route('genius') }}"
                       class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.18em] font-semibold text-[#c5983e] hover:text-white transition-colors">
                        Learn About Genius Experience ↗
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ VIDEO (HOW WE MOVE) & TEAM (EXPERTS YOU CAN TRUST) SIDE-BY-SIDE ═══════════ -->
    <section class="py-20 lg:py-28 px-6 lg:px-14 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto">
            
            <!-- Side-by-side Video and Narrative Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start mb-16">
                <!-- Video Left: HOW WE MOVE -->
                <div class="lg:col-span-6 space-y-4">
                    <span class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold block">Client Focus</span>
                    <h2 class="font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em] text-gray-900">
                        HOW WE MOVE
                    </h2>
                    <p class="text-xs uppercase tracking-[0.2em] font-semibold text-gray-400">
                        Aligned around every client.
                    </p>
                    
                    <div class="relative rounded-2xl overflow-hidden aspect-[16/10] bg-gray-900 shadow-xl group cursor-pointer mt-4">
                        <img src="{{ asset('assets/images/about/Group 1686565521.png') }}"
                             alt="How We Move Video Preview"
                             class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700" />
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="w-14 h-14 rounded-full bg-[#c5983e] text-white flex items-center justify-center shadow-2xl pl-1 hover:scale-110 transition-transform">
                                ▶
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Narrative Right: EXPERTS YOU CAN TRUST (positioned neatly beside video) -->
                <div class="lg:col-span-6 space-y-5 pt-2 lg:pt-8">
                    <span class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold block">Our Advisory</span>
                    <h2 class="font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em] text-gray-900 leading-tight">
                        EXPERTS YOU CAN TRUST
                    </h2>
                    <div class="gold-line"></div>
                    <p class="text-sm font-light text-gray-600 leading-relaxed">
                        The strongest results begin before an offer is written. Our team studies every opportunity and enters each negotiation prepared. We look beyond the immediate transaction to understand how each decision will shape what comes next and ensure the client’s future remains our priority at every stage.
                    </p>
                    <p class="text-sm font-light text-gray-600 leading-relaxed">
                        From first conversations to final closings, our team is here to listen, advise, and deliver real results — helping clients thrive in Ontario's most dynamic communities.
                    </p>
                </div>
            </div>

            <!-- 6 Team Cards (2 rows of 3) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 pt-4">
                <!-- Card 1 -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-1.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 2 -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card-2.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-2.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 3 -->
                <div class="group rounded-2xl overflow-hidden bg-[#243b2b] shadow-md hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/team-3-card.jpg') }}"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 4 -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card-4.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-4.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 5 -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card-3.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-5.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>

                <!-- Card 6 -->
                <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 aspect-[1/1.08] relative">
                    <img src="{{ asset('assets/images/about/card-1.png') }}"
                         onerror="this.src='{{ asset('assets/images/team-6.jpg') }}'"
                         alt="Team Advisor"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════ NEWSLETTER: CLOSER TO WHAT'S NEXT. (directly after Experts You Can Trust) ═══════════ -->
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
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold block">Exclusive Access</span>
                <h2 class="font-fragment text-3xl sm:text-4xl lg:text-[42px] uppercase leading-[1.08] tracking-[0.03em] text-white">
                    CLOSER TO WHAT’S NEXT.
                </h2>
                <p class="text-xs sm:text-sm text-white/70 font-light leading-relaxed">
                    Be the first to know about Ontario's most exclusive real estate releases, private developer allocations, and market insights.
                </p>

                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-6 pt-2">
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
