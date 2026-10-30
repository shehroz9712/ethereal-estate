<x-layouts.app activePage="join" title="Join Ethereal — Career in Real Estate">

    <!-- ═══════════ HERO BANNER (Real Team Imagery) ═══════════ -->
    <div class="px-4 sm:px-8 lg:px-14 pt-4">
        <div class="relative w-full h-[360px] sm:h-[420px] rounded-2xl overflow-hidden shadow-2xl bg-[#09150e] flex items-center justify-center text-center p-6">
            <img src="{{ asset('assets/images/about/Group 1686565521.png') }}"
                 onerror="this.src='{{ asset('assets/images/about-video-thumb.jpg') }}'"
                 alt="Join Ethereal Estates Team"
                 class="absolute inset-0 w-full h-full object-cover opacity-75" />
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/75"></div>

            <div class="relative z-10 max-w-2xl mx-auto flex flex-col items-center">
                <span class="block w-10 h-[1.5px] bg-[#c5983e] mb-4"></span>
                <h1 class="font-fragment text-white text-3xl sm:text-5xl lg:text-[46px] uppercase tracking-[0.06em] leading-tight mb-3">
                    JOIN ETHEREAL
                </h1>
                <p class="text-white/85 text-xs sm:text-sm md:text-base font-light tracking-wide leading-relaxed max-w-xl">
                    A career in real estate should not be built alone.
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════ MAIN NARRATIVE & APPLICATION FORM (per specification) ═══════════ -->
    <section class="px-6 lg:px-14 py-16 lg:py-24 bg-white">
        <div class="max-w-4xl mx-auto space-y-12">
            
            <!-- Page Copy per specification -->
            <div class="text-center max-w-2xl mx-auto space-y-5">
                <h2 class="font-fragment text-2xl sm:text-3xl lg:text-4xl uppercase tracking-[0.04em] text-[#111111]">
                    JOIN ETHEREAL
                </h2>
                <div class="gold-line mx-auto"></div>
                <div class="space-y-4 text-sm font-light text-gray-600 leading-relaxed text-left sm:text-center">
                    <p>
                        A career in real estate should not be built alone. At Ethereal, agents work alongside people who share their knowledge, offer support when it matters and bring more than one perspective to every opportunity.
                    </p>
                    <p>
                        From client conversations and property analysis to negotiations and closings, our agents receive practical guidance that strengthens how they work. We invest in Realtors who take their growth seriously and want to build a career supported by the experience of a committed team.
                    </p>
                </div>
            </div>

            <!-- Application Form Directly Below Copy per specification -->
            <div class="bg-[#fdfaf4] border border-gray-200 rounded-2xl p-6 sm:p-12 shadow-sm">
                <h3 class="font-fragment text-xl sm:text-2xl uppercase tracking-[0.04em] text-[#111111] mb-6 text-center">
                    Join Ethereal Application Form
                </h3>

                <form action="{{ route('inquiries.join') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">First Name *</label>
                            <input type="text" name="first_name" required placeholder="First Name" class="w-full px-3.5 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e]" />
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Last Name</label>
                            <input type="text" name="last_name" placeholder="Last Name" class="w-full px-3.5 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e]" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Email Address *</label>
                            <input type="email" name="email" required placeholder="name@domain.com" class="w-full px-3.5 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e]" />
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Phone Number *</label>
                            <input type="tel" name="phone" required placeholder="+1 (---) --- ----" class="w-full px-3.5 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e]" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">RECO / License #</label>
                            <input type="text" name="license_number" placeholder="License Number" class="w-full px-3.5 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e]" />
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Current Brokerage</label>
                            <input type="text" name="current_brokerage" placeholder="Brokerage Name" class="w-full px-3.5 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e]" />
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Years Experience</label>
                            <select name="years_experience" class="w-full px-3 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-700">
                                <option value="Newly Licensed">Newly Licensed</option>
                                <option value="1-3 Years">1-3 Years</option>
                                <option value="4-7 Years">4-7 Years</option>
                                <option value="8+ Years">8+ Years</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] uppercase tracking-[0.16em] font-semibold text-gray-500 mb-1">Experience &amp; Career Aspirations</label>
                        <textarea name="experience_summary" rows="4" placeholder="Tell us about your background, target markets in Ontario, and why you are interested in joining Ethereal Estates..." class="w-full px-3.5 py-2.5 bg-white border border-gray-200 rounded text-xs text-gray-800 focus:outline-none focus:border-[#d5a94e] resize-none"></textarea>
                    </div>

                    <div class="text-center pt-2">
                        <button type="submit" class="btn-gold px-12 py-3.5 cursor-pointer">
                            Submit Application ↗
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

</x-layouts.app>
