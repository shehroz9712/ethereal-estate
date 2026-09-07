<x-layouts.app activePage="about" title="About Us — Ethereal Estates">

    <!-- ═══════════ HERO BANNER ═══════════ -->
    <div class="px-4 sm:px-8 lg:px-14 pt-4">
        <div class="relative w-full h-[360px] sm:h-[420px] rounded-2xl overflow-hidden shadow-2xl bg-gray-900 flex items-center justify-center text-center p-6">
            <img src="{{ asset('assets/images/about-hero.jpg') }}" alt="About Ethereal Estates" class="absolute inset-0 w-full h-full object-cover opacity-60" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/30"></div>

            <div class="relative z-10 max-w-2xl mx-auto">
                <span class="block w-12 h-0.5 bg-[#d5a94e] mx-auto mb-4"></span>
                <h1 class="font-fragment text-white text-3xl sm:text-5xl uppercase tracking-[0.06em] leading-tight mb-3">
                    About Ethereal Estates
                </h1>
                <p class="text-white/85 text-xs sm:text-sm md:text-base font-light tracking-wide leading-relaxed">
                    We see beyond the property to the decision that shapes what comes next.
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════ BEYOND THE EXPECTED (STORY) ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[260px_1fr_1fr] gap-10 lg:gap-14 items-start">
            <div>
                <span class="text-[11px] tracking-[0.24em] uppercase text-[#d5a94e] font-semibold block mb-4">Our Philosophy</span>
                <h2 class="font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase leading-[1.1] tracking-[0.03em] text-gray-900">
                    Beyond The Expected.
                </h2>
            </div>

            <div class="rounded-xl overflow-hidden aspect-[3/4] bg-gray-100 shadow-md">
                <img src="{{ asset('assets/images/about-interior.jpg') }}" alt="Interior Architecture" class="w-full h-full object-cover" />
            </div>

            <div class="space-y-5 text-sm font-light text-gray-600 leading-relaxed">
                <p>
                    Founded in 2024, Ethereal Estates offers a more discerning approach to real estate, where every property recommended must genuinely earn its place.
                </p>
                <p>
                    Backed by more than $200 million in completed transactions and a reputation built at the highest level, our team has developed strong relationships across the development community, allowing us to carefully identify distinguished homes and pre-construction opportunities with the potential to remain valuable well beyond the purchase.
                </p>
                <p>
                    Whether you're purchasing your primary residence, expanding your investment portfolio, or seeking the right opportunity in a competitive market, Ethereal Estates is committed to creating lasting value through every transaction.
                </p>
                <div class="pt-4">
                    <a href="{{ route('pre-construction') }}" class="btn-gold">
                        Explore Pre-Construction ↗
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ STATS BAND ($200M+ per docx) ═══════════ -->
    <section class="py-16 lg:py-20 px-6 lg:px-14 bg-[#fdfaf4] border-y border-gray-200/80">
        <div class="max-w-7xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-8 text-center sm:text-left">
            <div class="border-r border-gray-200/80 pr-6">
                <p class="font-fragment text-4xl sm:text-5xl lg:text-6xl text-[#1a2e1e] leading-none mb-2">$200M+</p>
                <p class="text-[11px] uppercase tracking-[0.16em] text-[#d5a94e] font-semibold">Transaction Value</p>
                <p class="text-xs text-gray-500 font-light mt-1">in residential and pre-construction real estate</p>
            </div>
            <div class="border-r border-gray-200/80 pr-6">
                <p class="font-fragment text-4xl sm:text-5xl lg:text-6xl text-[#1a2e1e] leading-none mb-2">133+</p>
                <p class="text-[11px] uppercase tracking-[0.16em] text-[#d5a94e] font-semibold">Transactions Closed</p>
                <p class="text-xs text-gray-500 font-light mt-1">connecting clients with exceptional properties</p>
            </div>
            <div class="border-r border-gray-200/80 pr-6">
                <p class="font-fragment text-4xl sm:text-5xl lg:text-6xl text-[#1a2e1e] leading-none mb-2">Top 30</p>
                <p class="text-[11px] uppercase tracking-[0.16em] text-[#d5a94e] font-semibold">Under 30 Producer</p>
                <p class="text-xs text-gray-500 font-light mt-1">Century 21 Canada consecutive honoree</p>
            </div>
            <div>
                <p class="font-fragment text-4xl sm:text-5xl lg:text-6xl text-[#1a2e1e] leading-none mb-2">100%</p>
                <p class="text-[11px] uppercase tracking-[0.16em] text-[#d5a94e] font-semibold">Dedicated Ownership</p>
                <p class="text-xs text-gray-500 font-light mt-1">unwavering client advocacy at every stage</p>
            </div>
        </div>
    </section>

    <!-- ═══════════ FOUNDER: BUILT ON A CLEAR VISION ═══════════ -->
    <section class="bg-[#1a2e1e] text-white overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-stretch min-h-[500px]">
            <div class="p-8 sm:p-14 lg:p-20 flex flex-col justify-center">
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#d5a94e] font-semibold block mb-3">Leadership</span>
                <h2 class="font-fragment text-3xl sm:text-4xl lg:text-5xl uppercase tracking-[0.03em] leading-tight mb-6">
                    Built On A Clear Vision
                </h2>
                <div class="gold-line"></div>
                <div class="space-y-4 text-xs sm:text-sm text-white/80 font-light leading-relaxed">
                    <p>
                        Ethereal Estates began with a clear ambition to create a real estate company where access is matched by judgment and every recommendation is measured by the value it can create for the client.
                    </p>
                    <p>
                        At its centre is founder Nakul Sood, whose command of resale and pre-construction has brought him consecutive recognition among Century 21 Canada’s Top 30 Under 30. The performance behind his Double Centurion distinction is reflected in the standard he established for Ethereal, with considered advice, decisive representation and the confidence to pursue only what is truly worth a client’s time.
                    </p>
                </div>
            </div>
            <div class="relative min-h-[400px] lg:min-h-full">
                <img src="{{ asset('assets/images/founder-nakul.jpg') }}"
                     alt="Nakul Sood - Founder"
                     class="absolute inset-0 w-full h-full object-cover object-top" />
            </div>
        </div>
    </section>

    <!-- ═══════════ VIDEO (HOW WE MOVE) & TEAM (EXPERTS YOU CAN TRUST) ═══════════ -->
    <section class="py-20 lg:py-28 px-6 lg:px-14 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start mb-20">
                <!-- Video / Story Left -->
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-[11px] uppercase tracking-[0.24em] text-[#d5a94e] font-semibold block">Client Focus</span>
                    <h2 class="font-fragment text-2xl sm:text-3xl uppercase tracking-[0.04em] text-gray-900">How We Move</h2>
                    <p class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Aligned around every client.</p>
                    <div class="relative rounded-xl overflow-hidden aspect-[16/10] bg-gray-900 shadow-xl group">
                        <img src="{{ asset('assets/images/vision-interior.jpg') }}" alt="How We Move" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-700" />
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="w-14 h-14 rounded-full bg-[#d5a94e] text-white flex items-center justify-center shadow-2xl pl-1">
                                ▶
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Narrative Right -->
                <div class="lg:col-span-6 space-y-5 pt-4 lg:pt-14 text-sm font-light text-gray-600 leading-relaxed">
                    <h3 class="font-fragment text-xl sm:text-2xl uppercase tracking-[0.04em] text-gray-900 mb-2">The Standard We Stand By</h3>
                    <p>
                        Our team takes ownership of every stage, allowing clients to move through important decisions without carrying the weight of the process themselves. We learn what matters, narrow the field with purpose and address concerns before they reach the client.
                    </p>
                    <p>
                        The strongest results begin before an offer is written. Our team studies every opportunity and enters each negotiation prepared. We look beyond the immediate transaction to understand how each decision will shape what comes next and ensure the client’s future remains our priority at every stage.
                    </p>
                </div>
            </div>

            <!-- Team Grid: Experts You Can Trust -->
            <div class="pt-12 border-t border-gray-100">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
                    <div>
                        <span class="text-[11px] uppercase tracking-[0.22em] text-[#d5a94e] font-semibold block mb-1">Our People</span>
                        <h2 class="font-fragment text-3xl uppercase tracking-[0.04em] text-gray-900">Experts You Can Trust</h2>
                    </div>
                    <p class="text-xs text-gray-500 font-light max-w-sm">From first consultations through closing, our advisors are here to listen, analyze, and negotiate with precision.</p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
                    @php
                        $teamMembers = [
                            ['img' => 'team-3.jpg', 'name' => 'Nakul Sood', 'role' => 'Founder & Principal Broker'],
                            ['img' => 'team-1.jpg', 'name' => 'James Hartwell', 'role' => 'Senior Partner'],
                            ['img' => 'team-2.jpg', 'name' => 'Sophia Lane', 'role' => 'Director, Pre-Construction'],
                            ['img' => 'team-4.jpg', 'name' => 'Priya Nair', 'role' => 'Client Relations'],
                            ['img' => 'team-5.jpg', 'name' => 'David Sterling', 'role' => 'Investment Strategy'],
                            ['img' => 'team-6.jpg', 'name' => 'Elena Rostova', 'role' => 'Design Consultant'],
                        ];
                    @endphp
                    @foreach($teamMembers as $member)
                        <div class="group flex flex-col">
                            <div class="aspect-[3/4] overflow-hidden rounded-lg bg-gray-100 mb-3 shadow-sm">
                                <img src="{{ asset('assets/images/' . $member['img']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            </div>
                            <h4 class="font-fragment text-sm uppercase tracking-wide text-gray-900 leading-tight">{{ $member['name'] }}</h4>
                            <p class="text-[10px] uppercase tracking-wider text-[#d5a94e] font-semibold mt-1">{{ $member['role'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════ NEWSLETTER: CLOSER TO WHAT'S NEXT. ═══════════ -->
    <section class="py-20 px-6 lg:px-14 bg-[#0f1f12] text-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="rounded-2xl overflow-hidden aspect-[4/3] bg-gray-800 shadow-2xl">
                <img src="{{ asset('assets/images/newsletter-cabin.jpg') }}" alt="Closer To What's Next" class="w-full h-full object-cover" />
            </div>

            <div class="space-y-6">
                <span class="text-[11px] uppercase tracking-[0.24em] text-[#d5a94e] font-semibold block">Exclusive Access</span>
                <h2 class="font-fragment text-3xl sm:text-4xl uppercase tracking-[0.04em] leading-tight text-white">
                    Closer To What's Next.
                </h2>
                <p class="text-xs sm:text-sm text-white/70 font-light leading-relaxed">
                    Be the first to know about Ontario's most exclusive real estate releases, private developer allocations, and market insights.
                </p>

                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" name="first_name" placeholder="First Name" class="w-full bg-white/10 border border-white/20 px-4 py-3 text-xs text-white placeholder-white/40 rounded focus:outline-none focus:border-[#d5a94e]" />
                        <input type="text" name="last_name" placeholder="Last Name" class="w-full bg-white/10 border border-white/20 px-4 py-3 text-xs text-white placeholder-white/40 rounded focus:outline-none focus:border-[#d5a94e]" />
                    </div>
                    <input type="email" name="email" required placeholder="name@domain.com" class="w-full bg-white/10 border border-white/20 px-4 py-3 text-xs text-white placeholder-white/40 rounded focus:outline-none focus:border-[#d5a94e]" />
                    <button type="submit" class="btn-gold w-full sm:w-auto justify-center cursor-pointer">
                        Subscribe Now ↗
                    </button>
                </form>
            </div>
        </div>
    </section>

</x-layouts.app>
