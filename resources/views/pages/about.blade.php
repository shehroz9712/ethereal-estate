<x-layouts.app activePage="about" title="Who We Are — Ethereal Estates">

    <!-- ═══════════ HERO BANNER (Bigger Logo + Small Label Below) ═══════════ -->
    <div class="px-4 sm:px-8 lg:px-14 pt-4">
        <div class="relative w-full h-[400px] sm:h-[480px] lg:h-[520px] rounded-2xl overflow-hidden shadow-2xl bg-[#09150e] flex items-center justify-center text-center p-6">
            <img src="{{ asset('assets/images/about/banner.png') }}"
                 onerror="this.src='{{ asset('assets/images/about-hero.jpg') }}'"
                 alt="Who We Are — Ethereal Estates"
                 class="absolute inset-0 w-full h-full object-cover opacity-85" />
            <div class="absolute inset-0 bg-gradient-to-b from-black/55 via-black/45 to-black/75"></div>

            <div class="relative z-10 max-w-3xl mx-auto flex flex-col items-center">
                
                <!-- Bigger Logo (per specification) -->
                <div class="mb-4">
                    <img src="{{ asset('assets/images/logo.png') }}"
                         alt="Ethereal Estates"
                         class="h-12 sm:h-16 lg:h-20 w-auto object-contain mx-auto drop-shadow-2xl" />
                </div>

                <!-- Small 'About Us / Who We Are' below the bigger logo (per specification) -->
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-8 h-[1px] bg-[#c5983e]"></span>
                    <span class="text-xs sm:text-[13px] uppercase tracking-[0.28em] text-[#c5983e] font-semibold">
                        Who We Are • About Us
                    </span>
                    <span class="w-8 h-[1px] bg-[#c5983e]"></span>
                </div>

                <h1 class="font-fragment text-white text-2xl sm:text-4xl lg:text-[44px] uppercase tracking-[0.05em] leading-tight mb-4">
                    Platinum Developer Access Across Ontario
                </h1>

                <!-- Keyword Rich Description (per specification) -->
                <p class="text-white/90 text-xs sm:text-sm md:text-base font-light tracking-wide leading-relaxed max-w-2xl mx-auto">
                    Serving our clients with platinum access with all the major developers across Ontario — trusted real estate partners &amp; high customer satisfaction, one stop solution for buying, mortgage, renting, real estate legal services related to your property.
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════ SECTION 1: STORY (NO 'MORE ABOUT US' BUTTON) ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[280px_1fr_1fr] gap-8 lg:gap-12 items-start">
            <!-- Left: Title Column -->
            <div class="lg:pt-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#fdfaf4] border border-[#c5983e]/40 text-[#c5983e] text-[11px] font-semibold uppercase tracking-wider mb-6">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#c5983e]"></span>
                    Who We Are
                </span>
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

            <!-- Right: Text (More About Us Button Removed as requested) -->
            <div class="lg:pt-2 flex flex-col justify-between h-full space-y-6">
                <div class="space-y-6 text-sm font-light text-gray-600 leading-relaxed">
                    <p class="text-gray-900 font-medium leading-relaxed">
                        Serving our clients with platinum access with all the major developers across Ontario — trusted real estate partners &amp; high customer satisfaction, one stop solution for buying, mortgage, renting, real estate legal services related to your property.
                    </p>
                    <p>
                        Backed by years of top-tier performance and over $350 million in new development sales, our advisory bridges the gap between major Canadian builders and private clients. We secure pre-public allocations, tier-one incentives, and bespoke deposit structures that cannot be found on the open resale market.
                    </p>
                    <p>
                        From contract review and mortgage pre-approval through construction evolution, interim occupancy, and leasing management, we steward every client's property journey with unmatched precision and dedicated representation.
                    </p>
                </div>
                <!-- 'More About Us' button removed per specification -->
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 2: STATS BAND (Rare Real Estate Style Reference) ═══════════ -->
    <section class="relative px-6 lg:px-14 py-20 lg:py-28 bg-[#faf9f6] overflow-hidden border-y border-gray-200/80">
        <!-- Architectural blueprint wireframe background elements -->
        <div class="absolute right-[-40px] md:right-10 lg:right-24 bottom-[-20px] md:bottom-2 w-[420px] sm:w-[500px] lg:w-[600px] pointer-events-none select-none opacity-[0.20] z-0">
            <img src="{{ asset('assets/images/about/Group.png') }}" alt="Architectural Blueprint" class="w-full h-auto filter contrast-150" />
        </div>
        <div class="absolute left-[-100px] lg:left-[-60px] top-6 w-[360px] lg:w-[440px] pointer-events-none select-none opacity-[0.10] z-0">
            <img src="{{ asset('assets/images/about/Group.png') }}" alt="Architectural Blueprint Left" class="w-full h-auto filter contrast-125" />
        </div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <!-- Section Header in Rare Real Estate minimalist aesthetic -->
            <div class="max-w-3xl mb-14">
                <span class="text-xs uppercase tracking-[0.24em] font-semibold text-[#c5983e] block mb-2">Track Record &amp; Proven Performance</span>
                <h2 class="font-fragment text-3xl sm:text-4xl lg:text-5xl uppercase tracking-[0.04em] text-gray-900 leading-tight">
                    Pre-Construction Sales &amp; Advisory Performance
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 font-light mt-2 max-w-2xl leading-relaxed">
                    Benchmarking industry-leading milestones across Ontario's most sought-after low-rise and high-rise developments.
                </p>
            </div>

            <!-- 3 Core Stats Cards (Exact User Figures per specification) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Stat 1: $350M+ in new development sales -->
                <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm hover:shadow-lg transition-all duration-300">
                    <p class="font-fragment text-5xl sm:text-6xl lg:text-[4.75rem] leading-none text-[#0b2112] tracking-tight mb-2">
                        $350M+
                    </p>
                    <div class="w-10 h-[2px] bg-[#c5983e] my-4"></div>
                    <p class="text-xs uppercase tracking-[0.2em] text-[#c5983e] font-bold">
                        In New Development Sales
                    </p>
                    <p class="text-xs text-gray-500 font-light mt-1.5 leading-relaxed">
                        Cumulative pre-construction and master-planned community transaction volume across Ontario.
                    </p>
                </div>

                <!-- Stat 2: 500+ families served -->
                <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm hover:shadow-lg transition-all duration-300">
                    <p class="font-fragment text-5xl sm:text-6xl lg:text-[4.75rem] leading-none text-[#0b2112] tracking-tight mb-2">
                        500+
                    </p>
                    <div class="w-10 h-[2px] bg-[#c5983e] my-4"></div>
                    <p class="text-xs uppercase tracking-[0.2em] text-[#c5983e] font-bold">
                        Families Served
                    </p>
                    <p class="text-xs text-gray-500 font-light mt-1.5 leading-relaxed">
                        Guiding purchasers and investors through every stage with high customer satisfaction.
                    </p>
                </div>

                <!-- Stat 3: 15+ years of executive experience -->
                <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm hover:shadow-lg transition-all duration-300">
                    <p class="font-fragment text-5xl sm:text-6xl lg:text-[4.75rem] leading-none text-[#0b2112] tracking-tight mb-2">
                        15+
                    </p>
                    <div class="w-10 h-[2px] bg-[#c5983e] my-4"></div>
                    <p class="text-xs uppercase tracking-[0.2em] text-[#c5983e] font-bold">
                        Years Executive Experience
                    </p>
                    <p class="text-xs text-gray-500 font-light mt-1.5 leading-relaxed">
                        Decades of combined leadership in developer advisory, sales management, and mortgage solutions.
                    </p>
                </div>
            </div>

            <!-- Rare Real Estate Key Highlight Badges -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-2">
                <div class="p-4 rounded-xl bg-white border border-gray-200/80 text-center">
                    <p class="text-sm font-bold text-gray-900 font-fragment uppercase">Platinum Access</p>
                    <p class="text-[11px] text-gray-500 font-light">Major Ontario Developers</p>
                </div>
                <div class="p-4 rounded-xl bg-white border border-gray-200/80 text-center">
                    <p class="text-sm font-bold text-gray-900 font-fragment uppercase">One-Stop Solution</p>
                    <p class="text-[11px] text-gray-500 font-light">Buying, Mortgage, Legal</p>
                </div>
                <div class="p-4 rounded-xl bg-white border border-gray-200/80 text-center">
                    <p class="text-sm font-bold text-gray-900 font-fragment uppercase">Century 21 Distinction</p>
                    <p class="text-[11px] text-gray-500 font-light">Double Centurion Advisory</p>
                </div>
                <div class="p-4 rounded-xl bg-white border border-gray-200/80 text-center">
                    <p class="text-sm font-bold text-gray-900 font-fragment uppercase">Follow Up Boss</p>
                    <p class="text-[11px] text-gray-500 font-light">Integrated Priority Client Desk</p>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══════════ SECTION 3: RECOGNIZED AMONG ONTARIO'S BEST ═══════════ -->
    <section class="bg-[#0b2112] text-white overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-stretch min-h-[500px]">
            <div class="px-8 sm:px-14 lg:px-20 py-16 lg:py-24 flex flex-col justify-center">
                <span class="text-xs uppercase tracking-[0.24em] font-semibold text-[#c5983e] block mb-3">Distinction &amp; Leadership</span>
                <h2 class="font-fragment text-3xl sm:text-4xl lg:text-[44px] uppercase leading-[1.08] tracking-[0.02em] text-white mb-6">
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
                <!-- Top Right: Our Beliefs -->
                <div class="flex justify-end mb-6">
                    <p class="text-[12px] tracking-[0.28em] uppercase text-[#c5983e] font-serif italic">Our Core Standard</p>
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

    <!-- ═══════════ SECTION 5: TEAM (HOVER WITH EMAIL, CALL, LINKEDIN, INSTAGRAM) ═══════════ -->
    <section class="px-6 lg:px-14 py-20 lg:py-28 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#fdfaf4] border border-[#c5983e]/40 text-[#c5983e] text-[11px] font-semibold uppercase tracking-wider mb-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#c5983e]"></span>
                        Our Leadership &amp; Advisory Team
                    </span>
                    <h2 class="font-fragment text-3xl sm:text-4xl lg:text-[42px] uppercase tracking-[0.04em] text-gray-900 leading-tight">
                        EXPERTS YOU CAN TRUST
                    </h2>
                </div>
                <p class="text-xs sm:text-sm text-gray-500 font-light max-w-sm leading-relaxed">
                    Hover over any team member to email, call, connect on LinkedIn, or follow on Instagram.
                </p>
            </div>

            @php
                $teamMembers = [
                    [
                        'name' => 'Nakul Sood',
                        'role' => 'Founder & Managing Director',
                        'img'  => asset('assets/images/about/card.png'),
                        'fallback' => asset('assets/images/team-1.jpg'),
                        'email' => 'nakul@etherealestates.ca',
                        'phone' => '+14373767611',
                        'linkedin' => 'https://linkedin.com/in/nakulsood',
                        'instagram' => 'https://instagram.com/nakulsood'
                    ],
                    [
                        'name' => 'Alex Vance',
                        'role' => 'Director of Pre-Construction Sales',
                        'img'  => asset('assets/images/about/card-2.png'),
                        'fallback' => asset('assets/images/team-2.jpg'),
                        'email' => 'alex@etherealestates.ca',
                        'phone' => '+14373767611',
                        'linkedin' => 'https://linkedin.com',
                        'instagram' => 'https://instagram.com'
                    ],
                    [
                        'name' => 'Aeden Thorne',
                        'role' => 'VP, Master-Planned Communities',
                        'img'  => asset('assets/images/team-3-card.jpg'),
                        'fallback' => asset('assets/images/team-3.jpg'),
                        'email' => 'aeden@etherealestates.ca',
                        'phone' => '+14373767611',
                        'linkedin' => 'https://linkedin.com',
                        'instagram' => 'https://instagram.com'
                    ],
                    [
                        'name' => 'Sophia Reyes',
                        'role' => 'Senior Vice President, Advisory',
                        'img'  => asset('assets/images/about/card-4.png'),
                        'fallback' => asset('assets/images/team-4.jpg'),
                        'email' => 'sophia@etherealestates.ca',
                        'phone' => '+14373767611',
                        'linkedin' => 'https://linkedin.com',
                        'instagram' => 'https://instagram.com'
                    ],
                    [
                        'name' => 'Marcus Sterling',
                        'role' => 'Head of Investor Allocations',
                        'img'  => asset('assets/images/about/card-3.png'),
                        'fallback' => asset('assets/images/team-5.jpg'),
                        'email' => 'marcus@etherealestates.ca',
                        'phone' => '+14373767611',
                        'linkedin' => 'https://linkedin.com',
                        'instagram' => 'https://instagram.com'
                    ],
                    [
                        'name' => 'Elena Rossi',
                        'role' => 'Client Experience Director',
                        'img'  => asset('assets/images/about/card-1.png'),
                        'fallback' => asset('assets/images/team-6.jpg'),
                        'email' => 'elena@etherealestates.ca',
                        'phone' => '+14373767611',
                        'linkedin' => 'https://linkedin.com',
                        'instagram' => 'https://instagram.com'
                    ],
                ];
            @endphp

            <!-- 6 Team Cards with Hover Actions: Email, Call, LinkedIn, Instagram -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach ($teamMembers as $member)
                    <div class="group rounded-2xl overflow-hidden bg-gray-50 border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 aspect-[1/1.12] relative cursor-pointer">
                        <!-- Photo -->
                        <img src="{{ $member['img'] }}"
                             onerror="this.src='{{ $member['fallback'] }}'"
                             alt="{{ $member['name'] }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" />

                        <!-- Dark Glass Hover Overlay with Contact Actions -->
                        <div class="absolute inset-0 bg-gradient-to-t from-[#06130d]/95 via-[#06130d]/65 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-white">
                            <span class="text-[10px] uppercase tracking-[0.24em] text-[#c5983e] font-semibold block mb-1">
                                {{ $member['role'] }}
                            </span>
                            <h3 class="font-fragment text-xl sm:text-2xl uppercase tracking-wider text-white mb-4">
                                {{ $member['name'] }}
                            </h3>

                            <!-- 4 Contact Pills on Hover (Email, Call, LinkedIn, Instagram) -->
                            <div class="flex flex-wrap items-center gap-2 pt-2 border-t border-white/15">
                                <!-- Email -->
                                <a href="mailto:{{ $member['email'] }}"
                                   onclick="event.stopPropagation()"
                                   class="px-3 py-1.5 rounded-full bg-white/15 hover:bg-[#c5983e] text-white text-[10.5px] uppercase tracking-wider font-semibold transition-colors flex items-center gap-1.5 shadow-sm"
                                   title="Email {{ $member['name'] }}">
                                    <span>✉</span>
                                    <span>Email</span>
                                </a>

                                <!-- Call -->
                                <a href="tel:{{ $member['phone'] }}"
                                   onclick="event.stopPropagation()"
                                   class="px-3 py-1.5 rounded-full bg-white/15 hover:bg-[#c5983e] text-white text-[10.5px] uppercase tracking-wider font-semibold transition-colors flex items-center gap-1.5 shadow-sm"
                                   title="Call {{ $member['name'] }}">
                                    <span>📞</span>
                                    <span>Call</span>
                                </a>

                                <!-- LinkedIn -->
                                <a href="{{ $member['linkedin'] }}"
                                   target="_blank"
                                   rel="noopener"
                                   onclick="event.stopPropagation()"
                                   class="px-3 py-1.5 rounded-full bg-white/15 hover:bg-[#c5983e] text-white text-[10.5px] uppercase tracking-wider font-semibold transition-colors flex items-center gap-1.5 shadow-sm"
                                   title="Connect on LinkedIn">
                                    <span>in</span>
                                    <span>LinkedIn</span>
                                </a>

                                <!-- Instagram -->
                                <a href="{{ $member['instagram'] }}"
                                   target="_blank"
                                   rel="noopener"
                                   onclick="event.stopPropagation()"
                                   class="px-3 py-1.5 rounded-full bg-white/15 hover:bg-[#c5983e] text-white text-[10.5px] uppercase tracking-wider font-semibold transition-colors flex items-center gap-1.5 shadow-sm"
                                   title="Follow on Instagram">
                                    <span>📸</span>
                                    <span>Instagram</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ═══════════ SECTION 6: PLATINUM CLIENT REGISTRY (SUBSCRIBE NOW CHANGED) ═══════════ -->
    <section class="py-20 lg:py-28 px-6 lg:px-14 bg-[#081b10] text-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left: Timber Villa with Infinity Pool at Dusk -->
            <div class="rounded-2xl overflow-hidden aspect-[4/3] lg:aspect-[1.1/1] shadow-2xl bg-black/40">
                <img src="{{ asset('assets/images/about/Group 1686565522.png') }}"
                     onerror="this.src='{{ asset('assets/images/newsletter-cabin.jpg') }}'"
                     alt="Ontario Luxury Real Estate"
                     class="w-full h-full object-cover" />
            </div>

            <!-- Right: Exclusive Access Form (Subscribe Now renamed per specification) -->
            <div class="space-y-6">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 border border-[#c5983e]/50 text-[#c5983e] text-[10px] uppercase tracking-[0.24em] font-semibold">
                    Platinum Client Registry
                </span>
                <h2 class="font-fragment text-2xl sm:text-3xl lg:text-[40px] uppercase leading-[1.12] tracking-[0.03em] text-white">
                    EXCLUSIVE DEVELOPER ALLOCATIONS &amp; PRIVATE RELEASES
                </h2>
                <p class="text-xs sm:text-sm text-white/70 font-light leading-relaxed">
                    Join our private client registry to receive first-look access to Ontario's major developer releases, pre-public floor plans, and VIP incentives before public offering.
                </p>

                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-6 pt-2">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <input type="text"
                                   name="first_name"
                                   placeholder="FIRST NAME *"
                                   required
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
                               placeholder="ENTER EMAIL ADDRESS *"
                               class="w-full bg-transparent border-b border-white/25 focus:border-[#c5983e] py-3 text-xs uppercase tracking-wider text-white placeholder-white/40 outline-none transition-colors" />
                    </div>

                    <label class="flex items-start gap-3 cursor-pointer pt-2">
                        <input type="checkbox"
                               required
                               class="mt-1 rounded border-white/30 text-[#c5983e] focus:ring-0 bg-transparent" />
                        <span class="text-xs text-white/60 font-light leading-relaxed">
                            I consent to receiving exclusive pre-construction developer releases, private pricing sheets, and market updates from Ethereal Estates.
                        </span>
                    </label>

                    <!-- Subscribe Now Changed To High-Value CTA per specification -->
                    <div class="pt-4">
                        <button type="submit"
                                class="bg-[#c5983e] hover:bg-[#b08432] text-white text-xs uppercase tracking-[0.2em] font-semibold px-10 py-4 transition-colors shadow-xl cursor-pointer flex items-center gap-2">
                            <span>GET EXCLUSIVE PLATINUM ACCESS</span>
                            <span>↗</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-layouts.app>
